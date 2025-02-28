<div class="col-lg-9 p-0">
    <div class="user_content user_info">

        <div class="uer_nm">
            <h1>My Profile</h1>
        </div>

        <div class="profile-main">
            <div class="profile-main-hd d-flex">
                <div class="profile-img">
                    @if ($profile_image)
                        <img src="{{ asset('storage/profile_images/' . $profile_image) }}" alt="Profile Image">
                    @else
                        <img src="{{ asset('user-dashboard-theme/img/profile_img.svg') }}" alt="Default Profile">
                    @endif
                    <div class="upload-img">
                        <input type="file" id="fileInput" style="display: none;" wire:model="new_profile_image">
                        <label for="fileInput">
                            <img src="{{ asset('user-dashboard-theme/img/upload-img.svg') }}" alt="Upload">
                        </label>
                    </div>
                </div>
                <button class="blue-btn" onclick="document.getElementById('fileInput').click()">
                    <span wire:loading wire:target="new_profile_image">Uploading...</span>
                    <span wire:loading.remove wire:target="new_profile_image">Change Profile</span>
                </button>

                @if ($successMessage)
                    <div class="alert alert-success">{{ $successMessage }}</div>
                @endif
            </div>
            <!-- Personal Data -->
            <div class="reward-main-inner">
                <div class="rewrd-inner-hd">
                    <h4>Personal Data</h4>
                </div>
                <div class="rewrd-innr-btm d-flex">
                    <form wire:submit.prevent="updateProfile">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-wrp">
                                    <label>First Name</label> <br>
                                    <input type="text" wire:model="first_name" placeholder="John">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-wrp">
                                    <label>Last Name</label> <br>
                                    <input type="text" wire:model="last_name" placeholder="Smith">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-wrp">
                                    <label>Phone Number</label> <br>
                                    <input type="number" wire:model="number" placeholder="9876543210">
                                    @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-wrp">
                                    <label>Email</label> <br>
                                    <input type="email" wire:model="email" placeholder="John123@gmail.com">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <button class="unq_btn" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
            <div class="profile-main deactivate-accnt">
                <h6>Deactivate</h6>
                <p>Deactivating your account will disable your profile and remove your name from any content you've
                    submitted. </p>
                <a class="click-deacti" href="">Yes, deactivate my account.</a>
            </div>
        </div>
    </div>

