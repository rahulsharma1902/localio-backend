<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WhoWeAre;
use App\Models\ExpertGuides;
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

    public function MPSsectionUpdate(Request $request)
    {
        try {
            $pageTileTranslation = PageTileTranslation::find($request->id);

            if (!$pageTileTranslation) {
                return response()->json(['error' => false, 'msg' => 'Item not found.'], 404);
            }

            $pageTileTranslation->title = $request->title;
            $pageTileTranslation->description = $request->des;
            $pageTileTranslation->status = $request->input('status', 1);

            // Handle Image Upload (Only if a new image is provided)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_popular_item.' . $image->getClientOriginalExtension();
                $image->move(public_path('front/img/'), $filename);
                $pageTileTranslation->image = 'front/img/' . $filename;
            }

            $pageTileTranslation->save();

            return response()->json(['success' => true, 'msg' => 'Popular item updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'msg' => 'Error updating item: ' . $e->getMessage()], 500);
        }
    }
    public function SpecialistUpdate(Request $request)
    {
        //    return response()->json($request->all());
        try {
            $pageTileTranslation = PageTileTranslation::find($request->id);

            if (!$pageTileTranslation) {
                return response()->json(['success' => false, 'msg' => 'Item not found.'], 404);
            }

            $pageTileTranslation->title = $request->title;
            $pageTileTranslation->description = $request->desc;
            // $pageTileTranslation->type = $request->input('specialists');
            // $pageTileTranslation->source = $request->input('specialists');
            $pageTileTranslation->status = $request->input('status', 1);

            // Handle Image Upload (Only if a new image is provided)
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $filename = time() . '_img_.' . $image->getClientOriginalExtension();
                $image->move(public_path('front/img/'), $filename);
                $pageTileTranslation->img = 'front/img/' . $filename;
            }

            if ($request->hasFile('small_img')) {
                $image = $request->file('small_img');
                $filename = time() . '_small_img_.' . $image->getClientOriginalExtension();
                $image->move(public_path('front/img/'), $filename);
                $pageTileTranslation->small_img = 'front/img/' . $filename;
            }

            $pageTileTranslation->save();

            return response()->json([
                'success' => true,
                'msg' => 'Specialist item updated successfully!',
                'image_path' => asset($pageTileTranslation->img), // Return new image URL
                'small_image_path' => asset($pageTileTranslation->small_img),
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Error updating item: ' . $e->getMessage()], 500);
        }
    }

    public function updateWhoWeAre(Request $request)
    {
        // dd($request->all());
        // Get the first instance of WhoWeAre, PageTile, and PageTileTranslation
        $whoWeAre = WhoWeAre::first() ?? new WhoWeAre();
        $pageTile = PageTile::first() ?? new PageTile();
        $pageTileTranslation = PageTileTranslation::first() ?? new PageTileTranslation();

        // Handle text updates for `whoWeAre`
        $whoWeAre->fill($request->except(['bg_top_img', 'top_left_section_img', 'top_right_section_img', 'top_card_image']));

        // ✅ Handle bg_top_img upload
        if ($request->hasFile('bg_top_img')) {
            $file = $request->file('bg_top_img');
            $filename = now()->format('YmdHis') . '_bg_top_img.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/img/'), $filename);
            $whoWeAre->bg_top_img = 'front/img/' . $filename;
        }

        // ✅ Handle top_left_section_img upload
        if ($request->hasFile('top_left_section_img')) {
            $file = $request->file('top_left_section_img');
            $filename = now()->format('YmdHis') . '_top_left_section_img.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/img/'), $filename);
            $whoWeAre->top_left_section_img = 'front/img/' . $filename;
        }

        // ✅ Handle top_right_section_img upload
        if ($request->hasFile('top_right_section_img')) {
            $file = $request->file('top_right_section_img');
            $filename = now()->format('YmdHis') . '_top_right_section_img.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/img/'), $filename);
            $whoWeAre->top_right_section_img = 'front/img/' . $filename;
        }

        // ✅ Handle top_card_image upload
        if ($request->hasFile('top_card_image')) {
            $file = $request->file('top_card_image');
            $filename = now()->format('YmdHis') . '_top_card_image.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/img/'), $filename);
            $whoWeAre->top_card_image = 'front/img/' . $filename;
        }

        // ✅ Save the updated `whoWeAre` record

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

                $pageTile = new PageTile();
                $pageTile->lang_id = $request->input('lang_id', 1);
                $pageTile->image = $image ? 'front/img/' . $filename : null;
                $pageTile->type = 'popularItem';
                $pageTile->source = 'popularItem';
                $pageTile->save();

                // Create or update PageTileTranslation

                $pageTileTranslation = new PageTileTranslation();
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
        $pageTile->update($request->except(['image', 'img', 'small_img']));

        // Handle file uploads if necessary
        $this->handleFileUpload($request, $pageTile);
        $whoWeAre->save();
        // Redirect back with success message
        return redirect()
            ->back()
            ->with('success', 'Updated successfully!');
    }

    protected function handleFileUpload(Request $request, $pageTile)
    {
        // Handle bg_top_img upload

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
    public function ExperGuide()
    {
        $expertGuide = ExpertGuides::first();
        $pageTileTranslationEducation = PageTile::where('source', 'educationItem')
            ->with('translations') // Eager load translations
            ->get();
            $pageTileTranslationRightTools = PageTile::where('source', 'righttools')
            ->with('translations') // Eager load translations
            ->get();
        return view('Admin.site-content.experts_guides', compact('expertGuide', 'pageTileTranslationEducation','pageTileTranslationRightTools'));
    }
    public function ESsectionUpdate(Request $request)
    {
        //return response()->json($request->all());
        try {
            $pageTileTranslation = PageTileTranslation::find($request->id);

            // return response()->json($pageTileTranslation);

            if (!$pageTileTranslation) {
                return response()->json(['error' => false, 'msg' => 'Item not found.']);
            }

            $pageTileTranslation->title = $request->title;
            $pageTileTranslation->description = $request->des;
            $pageTileTranslation->status = $request->input('status', 1);
            // Handle image upload

            // Handle Image Upload (Only if a new image is provided)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_education_item_.' . $image->getClientOriginalExtension();
                $image->move(public_path('front/img/'), $filename);
                $pageTileTranslation->image = 'front/img/' . $filename;
            }

            $pageTileTranslation->save();

            return response()->json(['success' => true, 'msg' => 'Popular item updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'msg' => 'Error updating item: ' . $e->getMessage()], 500);
        }
    }
    public function RTsectionUpdate(Request $request)
    {
        //return response()->json($request->all());
        try {
            $pageTileTranslation = PageTileTranslation::find($request->id);

            // return response()->json($pageTileTranslation);

            if (!$pageTileTranslation) {
                return response()->json(['error' => false, 'msg' => 'Item not found.']);
            }

            $pageTileTranslation->title = $request->title;
            $pageTileTranslation->description = $request->desc;
            $pageTileTranslation->status = $request->input('status', 1);
            // Handle image upload

            // Handle Image Upload (Only if a new image is provided)
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_right_tools_.' . $image->getClientOriginalExtension();
                $image->move(public_path('front/img/'), $filename);
                $pageTileTranslation->image = 'front/img/' . $filename;
            }

            $pageTileTranslation->save();

            return response()->json(['success' => true, 'msg' => 'Popular item updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'msg' => 'Error updating item: ' . $e->getMessage()], 500);
        }
    }

    public function ExperGuideUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'education_title' => 'required|string|max:255',
            'education_description' => 'required|string',
            'smart_search' => 'required|string|max:255',
            'smart_search_description' => 'required|string',
            'how_to_check_email' => 'required|string',
            'overview' => 'required|string|max:255',
            'email_description' => 'required|string',
            'webmail' => 'required|string|max:255',
            'webmail_description' => 'nullable|string',
            'email_application' => 'required|string|max:255',
            'email_app_description' => 'nullable|string',
            'imap' => 'required|string|max:255',
            'imap_pop' => 'nullable|string',
            'right_tool_heading' => 'nullable|string',
            'get_start_button' => 'nullable|string',
            'assistant' => 'nullable|string',
        ]);

        $expertGuide = ExpertGuides::first();
        $pageTile = PageTile::first() ?? new PageTile();
        $pageTileTranslation = PageTileTranslation::first() ?? new PageTileTranslation();

        if (!$expertGuide) {
            return redirect()
                ->back()
                ->with('error', 'Expert Guide not found.');
        }

        $expertGuide->update([
            'title' => $request->title,
            'description' => $request->description,
            'education_title' => $request->education_title,
            'education_description' => $request->education_description,
            'smart_search' => $request->smart_search,
            'smart_search_description' => $request->smart_search_description,
            'how_to_check_email' => $request->how_to_check_email,
            'overview' => $request->overview,
            'email_description' => $request->email_description,
            'webmail' => $request->webmail,
            'webmail_description' => $request->webmail_description,
            'email_application' => $request->email_application,
            'email_app_description' => $request->email_app_description,
            'imap' => $request->imap,
            'imap_pop' => $request->imap_pop,
            'right_tool_heading' => $request->right_tool_heading,
            'get_start_button' => $request->get_start_button,
            'assistant' => $request->assistant,
        ]);

        $popularItems = $request->input('education_items', []);
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
                        $filename = now()->format('YmdHis') . '_education_item_' . $index . '.' . $extension;
                        file_put_contents(public_path('front/img/') . $filename, $image);
                    }
                }

                // Create a new PageTile if needed

                $pageTile = new PageTile();
                $pageTile->lang_id = $request->input('lang_id', 1);
                $pageTile->image = $image ? 'front/img/' . $filename : null;
                $pageTile->type = 'educationItem';
                $pageTile->source = 'educationItem';
                $pageTile->save();

                // Create or update PageTileTranslation

                $pageTileTranslation = new PageTileTranslation();
                $pageTileTranslation->page_tile_id = $pageTile->id;
                $pageTileTranslation->title = $title;
                $pageTileTranslation->description = $description;
                $pageTileTranslation->image = $image ? 'front/img/' . $filename : $pageTileTranslation->image;
                $pageTileTranslation->status = $request->input('status', 1);
                $pageTileTranslation->save();
            }
        }

        $popularItems = $request->input('right_tools', []);
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
                        $filename = now()->format('YmdHis') . '_right_tools_' . $index . '.' . $extension;
                        file_put_contents(public_path('front/img/') . $filename, $image);
                    }
                }

                // Create a new PageTile if needed

                $pageTile = new PageTile();
                $pageTile->lang_id = $request->input('lang_id', 1);
                $pageTile->image = $image ? 'front/img/' . $filename : null;
                $pageTile->type = 'righttools';
                $pageTile->source = 'righttools';
                $pageTile->save();

                // Create or update PageTileTranslation

                $pageTileTranslation = new PageTileTranslation();
                $pageTileTranslation->page_tile_id = $pageTile->id;
                $pageTileTranslation->title = $title;
                $pageTileTranslation->description = $description;
                $pageTileTranslation->image = $image ? 'front/img/' . $filename : $pageTileTranslation->image;
                $pageTileTranslation->status = $request->input('status', 1);
                $pageTileTranslation->save();
            }
        }
        $pageTile->update($request->except(['image']));

        // Handle file uploads if necessary
        $this->handleEducationFileUpload($request, $pageTile);
        $expertGuide->save();
        return redirect()
            ->back()
            ->with('success', 'Updated successfully!');
    }

    protected function handleEducationFileUpload(Request $request, $pageTile)
    {
        // Handle bg_top_img upload

        // Handle page tile image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = now()->format('YmdHis') . '_education_item_.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/img/'), $filename);
            $pageTile->image = 'front/img/' . $filename;
        }
    }
}
