<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = User::with('profile')->get()->each(function($worker){
            $worker->showRoute = route('admin.users.show',$worker->id);
            $worker->editRoute = route('admin.users.edit',$worker->id);
        });
        return view('admin.workers.index',compact('workers'));
    }

    public function getUsers(Request $search)
    {
        $users = User::all();

        foreach ($users as $user){
            $data["{$user->profile->fullName()} - {$user->email}"] = NULL;
        }

        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.workers.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = array_merge($request->all(), [
            'name' => "{$request->input('firstname')} {$request->input('lastname')}",
            'password' => bcrypt(str_random(10))
        ]);
        $user = User::create($data);
        $user->profile()->create($data);
        if($request->input('role_id') == 2){
            $user->makeAdmin();
        }

        $request->session()->flash('success-message', "Het toevoegen van medewerker {$user->name} is gelukt.");
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $worker)
    {
        return view('admin.workers.show',compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(User $worker)
    {
        $roles = Role::all();
        $worker->load('profile');
        return view('admin.workers.edit',compact('worker','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $worker)
    {
        if($request->input('new_password') != null){
            $worker->password = bcrypt($request->input('new_password'));
            $worker->save();
        }

        $worker->update($request->all());
        $worker->profile()->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'hours' => $request->input('hours'),
            'phonenumber' => $request->input('phonenumber'),
        ]);

        $request->session()->flash('success-message', "Het bewerken van medewerker {$worker->name} is gelukt.");
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $worker)
    {
        if($worker->delete()){
            return $worker->id;
        }
        return Response::json(['error' => 'Error msg'], 404);
    }



}
