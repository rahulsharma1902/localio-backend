<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Language;
use App\Models\ReviewTranslation;
class ReviewController extends Controller
{
    public function reviews(){

        $reviews = Review::with('user','product')->orderBy('created_at', 'desc')->get();
        $reviews = Review::with('translations')->get();
        // $reviewTranslation = ReviewTranslation::all();
        return view('Admin.reviews.index',compact('reviews'));
    }
    public function reviewAdd()
    {
        $products = Product::all('name','id');

        return view('Admin.reviews/add_review',compact('products'));
    }
    public function reviewAddProc(Request $request)
    {
        $locale = getCurrentLocale(); // Ensure this function returns a valid locale code

        // Validate the request data
        $request->validate([
            'rating'       => 'required|integer|min:1|max:5',
            'description'  => 'required|string|max:255',
            'product_id'   => 'required|exists:products,id',
            'status' => 'nullable|in:active,inactive', // ✅ Add status validation

        ]);
        $language = Language::where('lang_code', app()->getLocale())->first();
        //dd($language);

        if (!$language) {
            return redirect()->back()->with('error', 'Language not found!');
        }
        $langId = $language->id;
        
        //dd($langId);
        // Create a new Review
        $review = new Review();
        $review->rating = $request->rating;
        $review->product_id = $request->product_id;
        $review->user_id = auth()->user()->id;
        $review->lang_id = $langId;
        $review->status = $request->input('status', 'active'); // Default to 'inactive' if not provided

        $review->save();

        // Create a corresponding ReviewTranslation entry
        $reviewTranslation = new ReviewTranslation();
        $reviewTranslation->reviews_id = $review->id;

        $reviewTranslation->description = $request->description;
        $reviewTranslation->language_id = $langId;
        $reviewTranslation->save();

        // return redirect()->back()->with('success', 'Review added successfully');
        return redirect()->route('reviews')->with('success', 'Review added successfully');
    }


    public function reviewStatusUpdate(Request $request)
    {
        $id = $request->id;
        $review = Review::find($id);

        if (!$review) {
            return redirect()->back()->with(['error' => 'Review not found']);
        }

        // Check the current status and toggle between 'active' and 'inactive'
        $newStatus = $review->status == 'active' ? 'inactive' : 'active';

        // Update the status
        $review->update([
            'status' => $newStatus
        ]);

        return redirect()->back()->with(['success' => 'Review status updated successfully']);
    }



    public function reviewEdit($id)
    {
        $review = Review::with('product')->findOrFail($id);
        $language = Language::where('lang_code',getCurrentLocale())->first();
        $langId = $language->id;

        $reviewTranslation = ReviewTranslation::where('reviews_id', $review->id)
        ->where('language_id', $langId)
        ->first();
        $products = Product::all();
        $defaultTranslation = ReviewTranslation::where('reviews_id', $review->id)
        ->where('language_id', 1) // lang_id = 1 for default language (en-us)
        ->first();
        return view('Admin.reviews.update_review', compact('review', 'reviewTranslation','products','defaultTranslation'));
    }
    public function reviewUpdate(Request $request, $id)
    {
        // Ensure this function returns a valid locale code
        $locale = getCurrentLocale(); // Ensure this function returns a valid locale code
//dd($locale);
        // Validate the form data
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'description'  => 'required|string|max:255',
            'status' => 'required|in:active,inactive',

        ]);

        // Get the language record from the database based on the current locale
        $language = Language::where('lang_code', $locale)->first();
       //dd($language);
        // If the language doesn't exist, return an error
        if (!$language) {
            return redirect()->back()->with('error', 'Language not found!');
        }

        // Get the language ID
        $langId = $language->id;
        //dd($langId);

        // Find the review by ID
        $review = Review::findOrFail($id);

        // Update review data
        $review->rating = $request->rating;
        $review->status = $request->status;
        $review->save();

        // Update or create ReviewTranslation
        $reviewTranslation = ReviewTranslation::where('reviews_id', $review->id)
            ->where('language_id', $langId)
            ->first();

        $reviewTranslation=ReviewTranslation::updateOrCreate(
            ['reviews_id' => $review->id, 'language_id' => $langId],
            [
                'description' => $request->description,
            ]
        );

        return redirect()->back()->with('success', 'Review updated successfully!');
    }


public function reviewDelete($id)
    {
        // Find the review by ID
        $review = Review::find($id);

        // Check if the review exists
        if (!$review) {
            return redirect()->back()->with(['error' => 'Review not found']);
        }
        ReviewTranslation::where('reviews_id', $review->id)->delete();

        // Delete the review
        $review->delete();

        // Redirect with success message
        return redirect()->back()->with(['success' => 'Review deleted successfully']);

}
}
