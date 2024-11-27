<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\DesignTemplate;
use App\Models\Basket;
use Session;
use Laravel\Socialite\Facades\Socialite;
use App\Models\OtpVerification;
// use App\Mail\UserRegisterMail;
// use App\Mail\ForgottenPassword;
use App\Mail\ForgetPasswordMail;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str; 
use App\Models\Country;
use App;
use App\Models\MetaVendor;
class AuthenticationController extends Controller
{
    public function index(){

        return view('Authentication.login');

    }
    public function loginProcc(Request $request)
    {   
        $lang = Session::get('current_lang');

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->user_type == 'admin') {
                return redirect("/{$lang}/admin-dashboard")->with('success', 'Successfully loggedin! Welcome Come Admin');
                // return redirect("/admin-dashboard")->with('success', 'Successfully loggedin! Welcome Come Admin');

            } elseif (Auth::user()->user_type == 'user') {
                // $changeID = $this->convertTemporaryIdToUserId();
                if ($request->url != null) {
                    return redirect($request->url);
                } else {
                    return redirect("/{$lang}/")->with('success', 'Successfully loggedin');
                }
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'failed! Something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'failed to login');

        }
    }

    public function register()
    {
        $countries = Country::all();

        return view('Authentication.register',compact('countries'));
    }
    public function registerProcc(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email' => 'required|email|unique:users,email',  
            'password' => 'required|confirmed', 
            'country_id' => 'required', // Validate country_id exists in the countries table
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->password   = Hash::make($request->password);
        $user->country_id    = $request->country_id ;
        $user->save();
        if ($user) {
            // Attempt to log the user in
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $lang = app()->getLocale(); // Assuming you're using localization, fetch the current language
    
                // Check the user type and redirect accordingly
                if (Auth::user()->user_type === 'admin') {
                    return redirect("/{$lang}/admin-dashboard")
                        ->with('success', 'Successfully logged in! Welcome Admin');
                } else {
                    return redirect("/{$lang}/")
                        ->with('success', 'Successfully logged in');
                }
            } else {
                // Authentication failed
                return redirect()->back()->withErrors(['error' => 'Authentication failed']);
            }
        }
    }
    public function logout(){
        $lang = app()->getLocale();

        Auth::logout();
        return redirect("/{$lang}/")->with('success',"You have logged out succesfully");
    }
   
    
   
   
// {
//     public function index()
//     {

//         return view('authentication.index');
//     }
//     public function loginProcc(Request $request)
//     {
//         $request->validate([
//             'email' => 'required',
//             'password' => 'required',
//         ]);

//         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

//             if (Auth::user()->is_admin == 1) {
//                 return redirect('/admin-dashboard')->with('success', 'Successfully loggedin! Welcome Come Admin');
//             } elseif (Auth::user()->is_admin == 0) {
//                 $changeID = $this->convertTemporaryIdToUserId();
//                 if ($request->url != null) {
//                     return redirect($request->url);
//                 } else {
//                     return redirect('/')->with('success', 'Successfully loggedin');
//                 }
//             } else {
//                 Auth::logout();
//                 return redirect()->back()->with('error', 'failed! Something went wrong');
//             }
//         } else {
//             return redirect()->back()->with('error', 'failed to login');
//         }
//     }

//     public function register()
//     {

//         $countries = [
//             'AF' => '93',
//             'AL' => '355',
//             'DZ' => '213',
//         ];
//         return view('authentication.new_register', compact('countries'));
//     }
//     public function registerProcc(Request $request)
//     {
//         // dd($request->all());

//         $request->validate([
//             'first_name' => 'required',
//             'last_name' => 'required',
//             'email' => 'required|unique:users,email',
//             'password' => 'required|min:6',
//             'phone' => 'required|unique:users,number'

//         ]);

//         $user_name = $request->input('first_name') . $request->input('last_name');

//         $unique_user_name = $user_name;
//         $count = 1;
//         while (User::where('user_name', $unique_user_name)->exists()) {
//             $unique_user_name = $user_name . ++$count;
//         }
//         $user = new User();
//         $user->user_name = $unique_user_name;
//         $user->first_name = $request->input('first_name');
//         $user->last_name = $request->input('last_name');
//         $user->email = $request->input('email');
//         $user->number = $request->input('phone');
//         $user->password = Hash::make($request->password);
//         $user->save();

//         $mailData = [
//             'name' => $request->name,
//             'email' => $request->email,
//         ];
//         // $mail = Mail::to($request['email'])->send(new UserRegisterMail($mailData)); 
//         if (Auth::attempt($request->only('email', 'password'))) {
//             if (Auth::user()->is_admin == 0) {
//                 $changeID = $this->convertTemporaryIdToUserId();
//                 if ($request->url != null) {
//                     return redirect($request->url);
//                 } else {
//                     return redirect('/')->with('success', 'Your account is created successfully');
//                 }
//             }
//         }
//         // return redirect('/')->with('success','Your account is created successfully');

//     }
    public function forgotPassword()
    {
        return view('Authentication.forgot_password');
    }
    public function forgotProcc(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        session(['reset_email' => $request->email]);
        if (!$user) {
            return redirect()->back()->with('error','user not found');
        }

        $otp = rand(123456, 999999);
        $data['otp'] = $otp;


        $verification = [
            'user_id' => $user->id,
            'otp' => $otp,
            'otp_type' => "forgotpassword",
            'expires_at' => Carbon::now()->addMinutes(5)
        ];

        OtpVerification::updateOrCreate($verification);

        $data = Mail::to($request->email)->send(new ForgetPasswordMail($data));
    
        return redirect('/otp-confirm')->with('success' ,'OTP has been sent to your email');
    }
    public function otpConfirm()
    {
        return view('Authentication.get_opt');
    }
 
    public function optProcc(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6', // Assuming OTP is a 6-digit number
        ]);
        $otp = $request->otp;
     
        $verificationExists = OtpVerification::where('otp', $otp)
                                            ->where('expires_at', '>=', Carbon::now()->subMinutes(5))
                                            ->first();

        if (!$verificationExists) {
            return redirect()->back()->with('error', 'Your OTP is not correct or has expired');
        }

        $verificationExists->update([
            'expires_at' => Carbon::now()->subMinutes(5) 
        ]);

        return redirect('/new-password')->with('success' ,'Your OTP is confirmed');
    }
    public function newPassword()
    {
        return view('Authentication.new_password');
    }
    public function newPasswordProcc(Request $request)
     {
       $email = session('reset_email'); 

       $lang = app()->getLocale();

       $request->validate([
            'password' => 'required|confirmed',
        ]);
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->back()->with('error','User not found');
        }
    
        $password = Hash::make($request->password);
        $remember = $request->has('remember');
        $user->password = $password;
        $user->save(); 
        if (Auth::attempt(['email' => $email, 'password' => $request->password],$remember)) {
            // If authentication is successful, check user role
        if (Auth::user()->user_type == 'admin') {
            return redirect("/{$lang}/admin-dashboard")->with('success', 'Your new password has been created successfully');
        } elseif (Auth::user()->user_type === 'user') {
            return redirect("/{$lang}")->with('success', 'Your new password has been created successfully');
            }
        }
        return redirect()->back()->with('error', 'Failed to authenticate user');
    }

//     public function forgetPasswordSubmit(Request $request)
//     {
//         $request->validate([
//             'username' => 'required'
//         ]);
//         $user = User::where([['email', $request->username], ['is_admin', 0]])->first();
//         if ($user) {
//             $secreat_key = base64_encode($request->username);
//             $url = url('forgotten-password/newpassword/' . $secreat_key);
//             $mailData = [
//                 'token' => $secreat_key,
//                 'url' => $url,
//             ];
//             $mail = Mail::to($request->username)->send(new ForgottenPassword($mailData));
//             return redirect()->back()->with('success', 'Success! Password reset link sent to your email');
//         } else {
//             return redirect()->back()->with('error', 'Failed! this username is not found in our database');
//         }
//     }

     

//     public function newpassword($secret_key = null)
//     {

//         return view('authentication.newpassword', compact('secret_key'));
//     }
//     public function newpasswordSubmit(Request $request)
//     {
//         $request->validate([
//             'password' => 'min:6',
//             'confirmpassword' => 'required_with:password|same:password|min:6'
//         ]);
//         $email = base64_decode($request->token);
//         $password = Hash::make($request->password);
//         // echo $email;
//         $user = User::where('email', $email)->first();
//         $user->password = $password;
//         $user->update();
//         return redirect('/login')->with('success', 'Successfully updated password');
//     }
//     public function logout()
//     {
//         Auth::logout();
//         Session::flush();
//         return redirect('/')->with('success', 'successfully logged out');
//     }




//     function convertTemporaryIdToUserId()
//     {
//         $temporaryUserId = Session::get('temporaryUserId');
//         if ($temporaryUserId) {
//             DesignTemplate::where('temporary_id', $temporaryUserId)->update(['user_id' => Auth::id(), 'temporary_id' => null]);
//             Basket::where('temporary_id', $temporaryUserId)->update(['user_id' => Auth::id(), 'temporary_id' => null]);
//             Session::forget('temporaryUserId');
//         }
//         if (!Session::has('temporaryUserId')) {
//             return true;
//         } else {
//             return true;
//         }
//     }

//     public function redirectToGoogle()
//     {
//         return Socialite::driver('google')->redirect();
//     }

//     public function googleRedirect()
//     {
//         try {
//             $googleuser = Socialite::driver('google')->user();
//         } catch (\Exception $e) {
//             return redirect('/login')->with('error', 'Google authentication failed.');
//         }
//         $existingUser = User::where('email', $googleuser->email)->first();

//         if ($existingUser) {
//             Auth::login($existingUser);
//         } else {

//             $unique_user_name = $googleuser->name;
//             $count = 1;
//             while (User::where('user_name', $unique_user_name)->exists()) {
//                 $unique_user_name = $googleuser->name . ++$count;
//             }

//             // $newUser = User::create([
//             //     'user_name' => $unique_user_name,
//             //     'first_name' => 'test',
//             //     'last_name' => 'user',
//             //     'email' => $googleuser->email,
//             //     'number' => null,
//             //     'is_admin' => 0,
//             //     'password' => Hash::make($googleuser->email),

//             // ]);

//             $newUser = new User();
//             $newUser->user_name = $unique_user_name;
//             $newUser->first_name = $unique_user_name;
//             // $newUser->last_name = 'user';
//             $newUser->email = $googleuser->email;
//             // $newUser->number =12321312312;
//             $newUser->password = Hash::make($googleuser->email);
//             $newUser->save();

//             Auth::login($newUser);
//         }

//         if (Auth::user()->is_admin == 1) {
//             return redirect('/admin-dashboard')->with('success', 'Successfully loggedin! Welcome Come Admin');
//         } elseif (Auth::user()->is_admin == 0) {
//             // $changeID =  $this->convertTemporaryIdToUserId();

//             return redirect('/')->with('success', 'Successfully loggedin');
//         } else {
//             abort(404);
//         }
//     }



//     public function facebookRedirect()
//     {
//         return Socialite::driver('facebook')->redirect();
//     }

//     public function facebookCallback()
//     {
//         try {
//             $facebookUser = Socialite::driver('facebook')->user();
//         } catch (\Exception $e) {
//             return redirect('/login')->with('error', 'Facebook authentication failed.');
//         }

//         print_r($facebookUser);
//         die();
//         // $existingUser = User::where('email', $facebookUser->email)->first();

//         // if ($existingUser) {
//         //     Auth::login($existingUser);
//         // } else {
//         //     $unique_user_name = $facebookUser->name;
//         //     $count = 1;
//         //     while (User::where('user_name', $unique_user_name)->exists()) {
//         //         $unique_user_name =  $facebookUser->name . $count++;
//         //     }

//         //     $newUser = new User();
//         //     $newUser->user_name = $unique_user_name;
//         //     $newUser->first_name = $facebookUser->name;
//         //     $newUser->email = $facebookUser->email;
//         //     $newUser->password = Hash::make($facebookUser->email);
//         //     $newUser->save();

//         //     Auth::login($newUser);
//         // }

//         // if (Auth::user()->is_admin == 1) {
//         //     return redirect('/admin-dashboard')->with('success', 'Successfully logged in! Welcome Admin');
//         // } elseif (Auth::user()->is_admin == 0) {
//         //     return redirect('/')->with('success', 'Successfully logged in');
//         // } else {
//         //     abort(404);
//         // }
//     }
// }
// neeraj code login with google

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Get the current locale
        $lang = app()->getLocale();

        try {
            // Retrieve the user information from Google
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Redirect back to the login page if authentication fails
            return redirect("/{$lang}/login")->with('error', 'Google authentication failed.');
        }

        // Check if the user already exists in the database
        $existingUser = User::where('email', $googleUser->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Handle the case where the user does not exist
            list($firstName, $lastName) = explode(' ', $googleUser->name . ' ', 2);
            
            // Create a new user
            $newUser = User::create([
                'first_name' => trim($firstName), // Use trim to avoid any leading/trailing spaces
                'last_name' => trim($lastName), // Last name may be empty if only one name is given
                'email' => $googleUser->email,
                'user_type' => 'user', // Default user type
                'password' => Hash::make($googleUser->email), // Generate a random password
            ]);

            // Log in the newly created user
            Auth::login($newUser);
        }

        // Get the logged-in user
        $user = auth()->user();
        
        // Redirect based on user type
        return $this->redirectUser($user, $lang);
    }

    // Helper function to redirect based on user type
    private function redirectUser($user, $lang)
    {
        if ($user->user_type === 'admin') {
            return redirect("/{$lang}/admin-dashboard")->with('success', 'Successfully logged in! Welcome, Admin.');
        } elseif ($user->user_type === 'user') {
            return redirect("/{$lang}")->with('success', 'Successfully logged in.');
        } else {
            abort(404); // Handle unexpected user types
        }
    }


    // neeraj code login with facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // public function handleFacebookCallback()
    // {
    //     // Get the current locale
    //     $lang = app()->getLocale();
    
    //     try {
    //         // Retrieve the user information from Facebook
    //         $facebookUser = Socialite::driver('facebook')->user();
    //     } catch (\Exception $e) {
    //         // Log the exception message
    //         \Log::error('Facebook authentication error: ' . $e->getMessage());
            
    //         // Redirect back to the login page if authentication fails
    //         return redirect("/{$lang}/login")->with('error', 'Facebook authentication failed.');
    //     }
    
    //     // Log the returned user data for debugging
    //     \Log::info('Facebook User Data:', (array) $facebookUser);
    
    //     // Check if the user object is not null and has the necessary properties
    //     if (is_null($facebookUser) || !property_exists($facebookUser, 'email')) {
    //         return redirect("/{$lang}/login")->with('error', 'Unable to retrieve user data from Facebook.');
    //     }
    
    //     // Check if the user already exists in the database
    //     $existingUser = User::where('email', $facebookUser->email)->first();
    
    //     if ($existingUser) {
    //         // Log in the existing user
    //         Auth::login($existingUser);
    //         // dd($existingUser);
    //         // Redirect based on user type
    //         if ($existingUser->user_type === 'admin') {
    //             return redirect("/{$lang}/admin-dashboard")->with('success', 'Successfully logged in! Welcome, Admin.');
    //         } elseif ($existingUser->user_type === 'user') {
    //             return redirect("/{$lang}")->with('success', 'Successfully logged in.');
    //         } else {
    //             abort(404); // Handle unexpected user types
    //         }
    //     } else {
    //         // Create a new user if they do not exist
    //         $newUser = User::create([
    //             'first_name' => $facebookUser->name, // Handle names as necessary
    //             'last_name' => '',  // Add logic to handle last name if needed
    //             'email' => $facebookUser->email,
    //             'user_type' => 'user', // Default user type
    //             'password' => Hash::make($facebookUser->email), // Generate a unique password
    //         ]);
    
    //         // Log in the newly created user
    //         Auth::login($newUser);
    
    //         // Redirect based on user type
    //         if ($newUser->user_type === 'admin') {
    //             return redirect("/{$lang}/admin-dashboard")->with('success', 'Successfully logged in! Welcome, Admin.');
    //         } elseif ($newUser->user_type === 'user') {
    //             return redirect("/{$lang}")->with('success', 'Successfully logged in.');
    //         } else {
    //             abort(404); // Handle unexpected user types
    //         }
    //     }
    // }
    public function handleFacebookCallback()
    {
        // Get the current locale
        $lang = app()->getLocale();
        
        try {
            // Retrieve the user information from Facebook
            $facebookUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            // Log the exception message
            \Log::error('Facebook authentication error: ' . $e->getMessage());
            
            // Redirect back to the login page if authentication fails
            return redirect("/{$lang}/login")->with('error', 'Facebook authentication failed.');
        }
        
        // Log the returned user data for debugging
        \Log::info('Facebook User Data:', (array) $facebookUser);
        
        // Check if the user object is not null and has the necessary properties
        if (is_null($facebookUser) || !property_exists($facebookUser, 'email')) {
            return redirect("/{$lang}/login")->with('error', 'Unable to retrieve user data from Facebook.');
        }
        
        // Check if the user already exists in the database
        $existingUser = User::where('email', $facebookUser->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user if they do not exist
            list($firstName, $lastName) = explode(' ', $googleUser->name . ' ', 2);
            $newUser = User::create([
                'first_name' => trim($firstName), // Use trim to avoid any leading/trailing spaces
                'last_name' => trim($lastName), // Last name may be empty if only one name is given
                'email' => $facebookUser->email,
                'user_type' => 'user', // Default user type
                'password' => Hash::make($facebookUser->email), // Generate a random password
            ]);
            
            // Log in the newly created user
            Auth::login($newUser);
        }

        // Get the logged-in user
        $user = auth()->user();
        
        // Redirect based on user type
        return $this->redirectUserRole($user, $lang);
    }

    // Helper function to redirect based on user type
    private function redirectUserRole($user, $lang)
    {
        if ($user->user_type === 'admin') {
            return redirect("/{$lang}/admin-dashboard")->with('success', 'Successfully logged in! Welcome, Admin.');
        } elseif ($user->user_type === 'user') {
            return redirect("/{$lang}")->with('success', 'Successfully logged in.');
        } else {
            abort(404); // Handle unexpected user types
        }
    }

    //******************* Vendor Registration functions ********************//

    public function vendorRegisterForm()
    {
        $countries = Country::all();

        return view('Authentication.vendor_register',compact('countries'));
    }

    public function vendorRegisterProcess(Request $request)
    {
        $lang = app()->getLocale();
        // Validate incoming data
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'job_title'     => 'required',
            'business_email'=> 'required|email',
            'business_phone'=> 'required|numeric|digits:10', 
            'country_id'    => 'required',
            'company_name'  => 'required',
            'company_size'  => 'required',
        ]);

        // Create and save the User record
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->business_email;
        $user->password   = Hash::make($request->business_email);
        $user->number     = $request->business_phone;
        $user->country_id = $request->country_id;
        $user->user_type  = 'vendor'; // Assign the user type as 'vendor'
        $user->save();

        // Create and save the MetaVendor record, associate with the created User
        $vendor = new MetaVendor();
        $vendor->user_id       = $user->id; // Fix this assignment
        $vendor->job_title     = $request->job_title;
        $vendor->company_name  = $request->company_name; // Fixed the typo in company_name
        $vendor->company_size  = $request->company_size;
        $vendor->product_name  = $request->product_name ?? null;
        $vendor->product_url   = $request->product_url ?? null;
        $vendor->website_url   = $request->website_url ?? null;
        $vendor->save();

        return redirect()->back()->with('success', 'Registration successfully done');
        // return redirect("")->with('success', 'Registration successfully done');
        // if ($user) {
        //     // Attempt to log the user in
        //     if (Auth::attempt(['email' => $request->business_email, 'password' => $request->business_email])) {
        //         $lang = app()->getLocale(); // Assuming you're using localization, fetch the current language
        //         if (Auth::user()->user_type === 'vendor') {
        //             return redirect("/{$lang}/vendor-dashboard")->with('success', 'Successfully logged in! Welcome Vendor');
        //         } 
        //     } else {
        //         // Authentication failed
        //         return redirect()->back()->withErrors(['error' => 'Authentication failed']);
        //     }
        // }
    }

}

