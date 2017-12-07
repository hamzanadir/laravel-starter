<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the profile .
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        $user = Auth::user();
        return view('user.profile',compact("user"));
    }

    /**
     * Update the profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'job',
            'bio',
            'phone',
            'address',
            'city',
            'country',
            'birth_day',
            'zip_code',
        ]);

        $profile = Auth::user()->profile;
        $profile->fill($data);

        if($profile->isClean()){
            return back()->with('error_settings', 'You need to specify a different value to update!');
        }

        $profile->save();

        return back()->with('status', 'Profile updated!');
    }

    /**
     * Update the mail user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateMail(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'new_email' => 'email|confirmed|unique:users,email,'.$user->id,
            'current_password' => 'required',
        ];

        $this->validate($request,$rules);

        $hashedPassword = $user->password;

        if(Hash::check($request->current_password,$hashedPassword)){
            if($request->new_email != $user->email){
                $user->verified = User::UNVERIFIED_USER;
                $user->verification_token = User::generateVerificationCode();
                $user->email = $request->new_email;
            }
        }
        else{
            return back()->with('error_security', 'Please enter the correct current password!');
        }

        if($user->isClean()){
            return back()->with('error_security', 'You need to specify a different value to update!');
        }

        $user->save();

        Auth::logout();

        return redirect()->route('login')->with('message', 
        'The email has been updated successfully. Please confirm your new email');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ];

        $this->validate($request,$rules);

        $user = Auth::user();

        $hashedPassword = $user->password;

        if(Hash::check($request->current_password,$hashedPassword)){
            $user->password = bcrypt($request->new_password);
        }
        else{
            return back()->with('error_security', 'Please enter the correct current password!');
        }


        if($user->isClean()){
            return back()->with('error_security', 'You need to specify a different value to update!');
        }

        $user->save();

        Auth::logout();
        
        return redirect()->route('login')->with('message', 
                'The password has been updated successfully. Please log in');

    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        $rules = [
            'avatar' => 'required|image'
        ];

        $this->validate($request,$rules);

        $profile = Auth::user()->profile;

        $profile->avatar_path = $request->file('avatar')->store('avatars','public');


        if($profile->isClean()){
            return back()->with('error_security', 'You need to specify a different value to update!');
        }

        $profile->save();

        return back()->with('status', 'Profile updated!');

    }
}
