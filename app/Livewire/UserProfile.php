<?php

namespace App\Livewire;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $email, $number, $profile_image, $new_profile_image;
    public $successMessage = '';
    public $uploading = false;

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->number = $user->number;
        $this->profile_image = $user->profile_image;
    }

    public function updateProfile()
    {
        $user = Auth::user();

        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'number' => 'nullable|numeric|digits:10',
        ]);

        $user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'number' => $this->number,
        ]);

        $this->successMessage = 'Profile updated successfully!';
    }

    public function updatedNewProfileImage()
    {
        $this->uploading = true;

        $this->validate([
            'new_profile_image' => 'image|max:2048', // Validate image size (2MB max)
        ]);

        $user = Auth::user();

        // Delete the old profile image if it exists
        if ($user->profile_image) {
            $oldImagePath = 'public/profile_images/' . $user->profile_image;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
        }

        // Store new image
        $imageName = time() . '.' . $this->new_profile_image->getClientOriginalExtension();
        $this->new_profile_image->storeAs('public/profile_images', $imageName);

        // Update user profile image in the database
        $user->update(['profile_image' => $imageName]);

        $this->profile_image = $imageName;
        File::cleanDirectory(storage_path('app/livewire-tmp'));
        $this->uploading = false; // Hide uploading state
        $this->reset('new_profile_image'); // Clear file input
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
