<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WhoWeAre;
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

  
   public function whoweareContent()
{
    $whoWeAre = WhoWeAre::first(); // Get the record to edit
    return view('Admin.site-content.who_we_are', compact('whoWeAre'));
}

public function updatewhoweare(Request $request)
{
    $whoWeAre = WhoWeAre::first();
    $whoWeAre->update($request->except(['bg_top_img', 'top_right_section_img', 'top_card_image']));
    $whoWeAre->update($request->all());

    // Handle file uploads if necessary
    if ($request->hasFile('bg_top_img')) {
        $whoWeAre->bg_top_img = $request->file('bg_top_img')->store('uploads', 'public');
    }

    // Handle `top_right_section_img` upload
    if ($request->hasFile('top_right_section_img')) {
        $whoWeAre->top_right_section_img = $request->file('top_right_section_img')->store('uploads', 'public');
    }

    // Handle `top_card_image` upload
    if ($request->hasFile('top_card_image')) {
        $whoWeAre->top_card_image = $request->file('top_card_image')->store('uploads', 'public');
    }

    $whoWeAre->save();

    return redirect()->back()->with('success', 'Updated successfully!');
}

}
