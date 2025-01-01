<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
class ReviewController extends Controller
{
    public function reviews()
    {
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

    // public function reviewStatusUpdate(Request $request)
    // {
    //     $id = $request->id;
    //     $review = Review::find($id);

    //     if (!$review) {
        
    //         return response()->json(['error' => 'Review not found'], 404);
    //     }

    //     $review->update([
    //         'status' => $review->status == 1 ? 0 : 1
    //     ]);

    //     return response()->json(['success' => 'Review status updated successfully']);
    // }

}