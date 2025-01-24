<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WhoWeAre;
use App\Models\PageTile;
use App\Models\PageTileTranslation;
use Illuminate\Support\Facades\Hash;

// use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminDashController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard.index');
    }

    public function profile()
    {
        return view('Admin.profile.index');
    }

    //update profile
    public function ProfileUpdateProcc(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ]);

        $user = User::find(Auth::user()->id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Your profile has been updated');
    }

    public function updatePasswordProcc(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required|confirmed|min:6',
                'new_password_confirmation' => 'required',
            ],
            [
                'old_password.required' => 'The password field is required.',
                'new_password.required' => 'The password field is required.',
                'new_password.confirmed' => 'The password confirmation does not match.',
                'new_password.min' => 'The password must be at least :min characters.',
                'new_password_confirmation.required' => 'The password confirmation field is required.',
            ]
        );

        $user = User::find(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->with('success', 'Password updated successfully.');
        }
        return redirect()->back()->with(['error' => 'The old password is incorrect.']);
    }

  
   public function whoWeAreContent()
{
    $whoWeAre = WhoWeAre::first(); // Get the record to edit
    // $pageTile = PageTile::first();
    $pageTileTranslation = PageTileTranslation::all();
    return view('Admin.site-content.who_we_are', compact('whoWeAre','pageTileTranslation'));
}

public function updateWhoWeAre(Request $request)
{
    // dd($request->all());
    // Get the first instance of WhoWeAre, PageTile, and PageTileTranslation
    $whoWeAre = WhoWeAre::first();
    $pageTile = PageTile::first();
    $pageTileTranslation = PageTileTranslation::first();

    // Get popular items from the request
    $popularItems = $request->input('popular_items', []);

    // Check if 'popular_items' has a 'title' key before iterating
    if (isset($popularItems['title']) && is_array($popularItems['title'])) {
        foreach ($popularItems['title'] as $index => $title) {
            $description = $popularItems['description'][$index] ?? null;
            $image = $popularItems['image'][$index] ?? null;

            // Save image if provided
            $filename = null;
            if ($image) {
                // Decode and save the image if it's in base64 format
                if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
                    $image = substr($image, strpos($image, ',') + 1);
                    $image = base64_decode($image);
                    $filename = now()->format('YmdHis') . '_popular_item_' . $index . '.webp';
                    file_put_contents(public_path('front/img/') . $filename, $image);
                }
            }
        
        $pageTile = new PageTile();
$pageTile->lang_id = $request->input('lang_id', 1);
$pageTile->image = $image ? 'front/img/' . $filename : null;
$pageTile->type = 'page';
$pageTile->source = 'page';
$pageTile->save();

// Create a new PageTileTranslation for the new PageTile
$popularItem = new PageTileTranslation();
$popularItem->page_tile_id = $pageTile->id;
$popularItem->title = $title;
$popularItem->description = $description;
$popularItem->image = $image ? 'front/img/' . $filename : null;
$popularItem->status = $request->input('status', 1);
$popularItem->save();

    }
}

    // Update the rest of the `whoWeAre`, `pageTile`, and `pageTileTranslation` tables
    $whoWeAre->update($request->except(['bg_top_img', 'top_left_section_img', 'top_right_section_img', 'top_card_image']));
    $pageTile->update($request->except(['image']));
  

    // Handle file uploads if necessary
    $this->handleFileUpload($request, $whoWeAre, $pageTile, $pageTileTranslation);

    // Save all models
    $whoWeAre->save();
    $pageTile->save();
   


    // Redirect back with success message
    return redirect()->back()->with('success', 'Updated successfully!');
}

protected function handleFileUpload($request, $whoWeAre, $pageTile, $pageTileTranslation)
{
    // Handle bg_top_img upload
    if ($request->hasFile('bg_top_img')) {
        $file = $request->file('bg_top_img');
        $filename = now()->format('YmdHis') . '_bg_top_img.' . $file->getClientOriginalExtension();
        $file->move(public_path('front/img/'), $filename);
        $whoWeAre->bg_top_img = 'front/img/' . $filename;
    }

    // Handle top_left_section_img upload
    if ($request->hasFile('top_left_section_img')) {
        $file = $request->file('top_left_section_img');
        $filename = now()->format('YmdHis') . '_top_left_section_img.' . $file->getClientOriginalExtension();
        $file->move(public_path('front/img/'), $filename);
        $whoWeAre->top_left_section_img = 'front/img/' . $filename;
    }

    // Handle top_right_section_img upload
    if ($request->hasFile('top_right_section_img')) {
        $file = $request->file('top_right_section_img');
        $filename = now()->format('YmdHis') . '_top_right_section_img.' . $file->getClientOriginalExtension();
        $file->move(public_path('front/img/'), $filename);
        $whoWeAre->top_right_section_img = 'front/img/' . $filename;
    }

    // Handle top_card_image upload
    if ($request->hasFile('top_card_image')) {
        $file = $request->file('top_card_image');
        $filename = now()->format('YmdHis') . '_top_card_image.' . $file->getClientOriginalExtension();
        $file->move(public_path('front/img/'), $filename);
        $whoWeAre->top_card_image = 'front/img/' . $filename;
    }

    // Handle page tile image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = now()->format('YmdHis') . '_image.' . $file->getClientOriginalExtension();
        $file->move(public_path('front/img/'), $filename);
        $pageTile->image = 'front/img/' . $filename;
    }
}
public function deletePageTileTranslation($id)
{
    $pageTileTranslation = PageTileTranslation::findOrFail($id);
    $pageTile = PageTile::findOrFail($pageTileTranslation->page_tile_id);

    // Delete images
    if ($pageTileTranslation->image && file_exists(public_path($pageTileTranslation->image))) {
        unlink(public_path($pageTileTranslation->image));
    }

    if ($pageTile->image && file_exists(public_path($pageTile->image))) {
        unlink(public_path($pageTile->image));
    }

    // Delete records
    $pageTileTranslation->delete();

    // Delete associated PageTile if no other translations exist
    if ($pageTile->translations()->count() === 0) {
        $pageTile->delete();
    }

    return redirect()->back()->with('success', 'Item and its associated page tile deleted successfully!');
}


}