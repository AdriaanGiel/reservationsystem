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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = \Auth::user();
        $email = $request->input('email');

        if($user->email != $email){
            $user->update([
                'email' => $email
            ]);
        }

        return \Auth::user()->profile()->update($request->only([
            'firstname',
            'lastname',
            'phonenumber'
        ]));
    }

    public function passwordUpdate(Request $request)
    {
        $user = \Auth::user();
        $user->update([
            'password' => bcrypt($request->input('password'))
        ]);

        return $user;
    }

    public function getUserData()
    {
        $user = User::with('profile')->where('id',\Auth::user()->id)->first();
        return $user;
    }


}
