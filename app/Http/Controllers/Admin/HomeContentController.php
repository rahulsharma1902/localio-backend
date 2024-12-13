<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
class HomeContentController extends Controller
{
    //

    public function homeContent()
    {
        $homeContents = HomeContent::all();
        return view('Admin.site-content.home_page',compact('homeContents'));
    }
    public function homeContentUpdate(Request $request)
    {
        // $validated = $request->validate([
        //     'meta_value.*' => 'required|string|max:255', // Validate each meta_value
        // ]);

        foreach ($request->meta_value as $id => $value) {
            $homeContent = HomeContent::find($id);
            if ($homeContent) {
                $homeContent->update(['meta_value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Home content updated successfully.');
    }
}
