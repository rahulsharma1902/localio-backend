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

        return redirect()
            ->back()
            ->with('success', 'Your profile has been updated');
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
            return redirect()
                ->back()
                ->with('success', 'Password updated successfully.');
        }
        return redirect()
            ->back()
            ->with(['error' => 'The old password is incorrect.']);
    }

    public function whoWeAreContent()
    {
        $whoWeAre = WhoWeAre::first(); // Get the record to edit

        $pageTileTranslationPopular = PageTile::where('source', 'popularItem')
            ->with('translations') // Eager load translations
            ->get();
        // dd($pageTileTranslationPopular);
        $specilistTileTranslation = PageTile::where('source', 'specialists')
            ->with('translations') // Eager load translations
            ->get();

        return view('Admin.site-content.who_we_are', compact('whoWeAre', 'pageTileTranslationPopular', 'specilistTileTranslation'));
    }

    public function updateWhoWeAre(Request $request)
    {
        // Get the first instance of WhoWeAre, PageTile, and PageTileTranslation
        $whoWeAre = WhoWeAre::first() ?? new WhoWeAre();
    
        // Handle popular items
        $popularItems = $request->input('popular_items', []);
        if (isset($popularItems['title']) && is_array($popularItems['title'])) {
            foreach ($popularItems['title'] as $index => $title) {
                $description = $popularItems['description'][$index] ?? null;
                $image = $popularItems['image'][$index] ?? null;
                
                $filename = null;
                if ($image) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
                        $extension = $type[1];
                        $image = substr($image, strpos($image, ',') + 1);
                        $image = base64_decode($image);
                        $filename = now()->format('YmdHis') . '_popular_item_' . $index . '.' . $extension;
                        file_put_contents(public_path('front/img/') . $filename, $image);
                    }
                }
    
                // Create a new PageTile if needed
                $pageTile = PageTile::find($request->input('page_tile_id'));
                if (!$pageTile) {
                    $pageTile = new PageTile();
                }
    
                // Update PageTile properties
                $pageTile->lang_id = $request->input('lang_id', 1);
                $pageTile->image = $image ? 'front/img/' . $filename : null;
                $pageTile->type = 'popularItem';
                $pageTile->source = 'popularItem';
                $pageTile->save();
    
                // Create or update PageTileTranslation
                $pageTileTranslation = PageTileTranslation::where('page_tile_id', $pageTile->id)->first();
                if (!$pageTileTranslation) {
                    $pageTileTranslation = new PageTileTranslation();
                }
    
                $pageTileTranslation->page_tile_id = $pageTile->id;
                $pageTileTranslation->title = $title;
                $pageTileTranslation->description = $description;
                $pageTileTranslation->image = $image ? 'front/img/' . $filename : $pageTileTranslation->image;
                $pageTileTranslation->status = $request->input('status', 1);
                $pageTileTranslation->save();
            }
        }
    
        // Handle specialists items
        $specialistsItems = $request->input('specialists_items', []);
        if (isset($specialistsItems['title']) && is_array($specialistsItems['title'])) {
            foreach ($specialistsItems['title'] as $index => $title) {
                $description = $specialistsItems['description'][$index] ?? null;
                $img = $specialistsItems['img'][$index] ?? null;
                $smallImg = $specialistsItems['small_img'][$index] ?? null;
    
                $filenameBig = null;
                if ($img) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $img, $type)) {
                        $extension = $type[1];
                        $img = substr($img, strpos($img, ',') + 1);
                        $img = base64_decode($img);
                        $filenameBig = now()->format('YmdHis') . '_img_' . $index . '.' . $extension;
                        file_put_contents(public_path('front/img/') . $filenameBig, $img);
                    }
                }
    
                $filenameSmall = null;
                if ($smallImg) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $smallImg, $type)) {
                        $extension = $type[1];
                        $smallImg = substr($smallImg, strpos($smallImg, ',') + 1);
                        $smallImg = base64_decode($smallImg);
                        $filenameSmall = now()->format('YmdHis') . '_small_img_' . $index . '.' . $extension;
                        file_put_contents(public_path('front/img/') . $filenameSmall, $smallImg);
                    }
                }
    
                // Create a new PageTile for specialists
                $pageTile = new PageTile();
                $pageTile->lang_id = $request->input('lang_id', 1);
                $pageTile->img = $img ? 'front/img/' . $filenameBig : null;
                $pageTile->small_img = $smallImg ? 'front/img/' . $filenameSmall : null;
                $pageTile->type = 'specialists';
                $pageTile->source = 'specialists';
                $pageTile->save();
    
                // Create a new PageTileTranslation for specialists
                $pageTileTranslation = new PageTileTranslation();
                $pageTileTranslation->page_tile_id = $pageTile->id;
                $pageTileTranslation->title = $title;
                $pageTileTranslation->description = $description;
                $pageTileTranslation->img = $img ? 'front/img/' . $filenameBig : null;
                $pageTileTranslation->small_img = $smallImg ? 'front/img/' . $filenameSmall : null;
                $pageTileTranslation->status = $request->input('status', 1);
                $pageTileTranslation->save();
            }
        }
    
        // Update the `whoWeAre` record
        $whoWeAre->update($request->except(['bg_top_img', 'top_left_section_img', 'top_right_section_img', 'top_card_image']));
    
        // Handle file uploads if necessary
        $this->handleFileUpload($request, $whoWeAre);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Updated successfully!');
    }

    protected function handleFileUpload(Request $request, WhoWeAre $whoWeAre)
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

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = now()->format('YmdHis') . '_' . uniqid() . '_img.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/img/'), $filenameBig);
            $pageTile->img = 'front/img/' . $filenameBig; // Save the first image to the 'img' field
        }

        if ($request->hasFile('small_img')) {
            $file = $request->file('small_img');
            $filename = now()->format('YmdHis') . '_' . uniqid() . '_small_img.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/img/'), $filenameSmall);
            $pageTile->small_img = 'front/img/' . $filenameSmall; // Save the second image to the 'small_img' field
        }
    }
    public function deletePageTileTranslation($id)
    {
        $pageTileTranslation = PageTileTranslation::where('page_tile_id', $id)->first();
        //dd($pageTileTranslation);
        if (!$pageTileTranslation) {
            return redirect()
                ->back()
                ->with('error', 'PageTileTranslation not found.');
        }

        $pageTile = PageTile::find($pageTileTranslation->page_tile_id);
        // dd($pageTile);

        if (!$pageTile) {
            return redirect()
                ->back()
                ->with('error', 'Associated PageTile not found.');
        }

        if ($pageTileTranslation->image && file_exists(public_path($pageTileTranslation->image))) {
            unlink(public_path($pageTileTranslation->image));
        }

        if ($pageTileTranslation->img && file_exists(public_path($pageTileTranslation->img))) {
            unlink(public_path($pageTileTranslation->img));
        }

        if ($pageTileTranslation->small_img && file_exists(public_path($pageTileTranslation->small_img))) {
            unlink(public_path($pageTileTranslation->small_img));
        }

        // Delete the PageTileTranslation record

        $pageTileTranslation->delete();
        $pageTile->delete();
        return redirect()
            ->back()
            ->with('success', 'Item and its associated page tile deleted successfully!');
    }
}
