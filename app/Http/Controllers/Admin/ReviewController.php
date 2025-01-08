<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
class ReviewController extends Controller
{
    public function reviews()

        $reviews = Review::with('user','product')->orderBy('created_at', 'desc')->get();

        return view('Admin.reviews.index',compact('reviews'));
    }
    public function reviewAdd()
    {

        $products = Product::all('name','id');

        return view('Admin.reviews/add_review',compact('products'));
    }
    public function reviewAddProc(Request $request)
    {
        $locale = getCurrentLocale();
        $request->validate([
            'rating' =>'required',
            'description'   =>  'required',
            'product_id'    =>  'required',
        ]);
        $review = new Review;
        $review->rating = $request->rating;
        $review->product_id = $request->product_id;
        $review->description = $request->description;
        $review->user_id        = auth()->user()->id;
        $review->lang_code      = $locale;
        $review->status         = 1;
        $review->save();
        return redirect()->back()->with('success','Review add successfully');
    }

    public function reviewStatusUpdate(Request $request)
    {
        $id = $request->id;
        $review = Review::find($id);
        if (!$review) {
            return redirect()->back()->with(['error' => 'Review not found']);
        }
        $review->update([
            'status' => $review->status == 1 ? 0 : 1
        ]);
        return redirect()->back()->with(['success' => 'Review status updated successfully']);
    }


    public function reviewEdit($id)
    {
        $review = Review::findOrFail($id);
    
        
        $products = Product::all('name', 'id');
    
        return view('Admin.reviews.update_review', compact('review', 'products'));
    }
    public function reviewUpdate(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'description' => 'required|string|max:255',
        'product_id' => 'required|exists:products,id', // Make sure the product ID is valid
    ]);

    // Find the review by ID
    $review = Review::findOrFail($id);

    // Update the review's data
    $review->rating = $request->rating;
    $review->description = $request->description;
    $review->product_id = $request->product_id;

    // Save the changes to the database
    $review->save();

    // Redirect back with a success message
    return redirect()->back()->with(['success' => 'Review status updated successfully']);
}

public function reviewDelete($id)
    {
        // Find the review by ID
        $review = Review::find($id);

        // Check if the review exists
        if (!$review) {
            return redirect()->back()->with(['error' => 'Review not found']);
        }

        // Delete the review
        $review->delete();

        // Redirect with success message
        return redirect()->back()->with(['success' => 'Review deleted successfully']);

}
}