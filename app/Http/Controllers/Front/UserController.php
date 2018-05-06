<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        return view('front.user.index',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Get logged in user
        $user = \Auth::user();

        // Separate email from input data
        $email = $request->input('email');

        // Check is email had been changed
        if($user->email != $email){
            // If email had been changed, update user email
            $user->update([
                'email' => $email
            ]);
        }

        // Update user profile data and return if succeeded
        return \Auth::user()->profile()->update($request->only([
            'firstname',
            'lastname',
            'phonenumber'
        ]));
    }

    /**
     * Method to update password
     * @param Request $request
     * @return User|null
     */
    public function passwordUpdate(Request $request)
    {
        $user = \Auth::user();
        $user->update([
            'password' => bcrypt($request->input('password'))
        ]);

        return $user;
    }

    /**
     * Get user with profile data
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getUserData()
    {
        $user = User::with('profile')->where('id',\Auth::user()->id)->first();
        return $user;
    }


}
