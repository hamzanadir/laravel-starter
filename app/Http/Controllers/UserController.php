<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;

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
            return back()->with('error', 'You need to specify a different value to update!');
        }

        $profile->save();

        return back()->with('status', 'Profile updated!');
    }
}
