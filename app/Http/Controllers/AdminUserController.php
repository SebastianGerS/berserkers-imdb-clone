<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role = 1) {

            $users = User::where('id', '!=', Auth::user()->id)->get();
          
            return view('admin.handleusers', ['users' => $users]);
        }

        $request->session()->flash('message', ['unauthorised' => 'You are not authorised to acces this page']);
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            "firstname" => $request->firstname,
            "surname" => $request->surname,
            "username" => $request->username,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => $request->role
        ]);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if (Auth::user()->role == 1) {
            $user->update([
                "firstname" => $request->firstname,
                "surname" => $request->surname,
                "username" => $request->username,
                "email" => $request->email,
                "role" => $request->role
            ]);
            if(isset($request->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
            }
            

            return redirect('/admin/users');

        }

        $request->session()->flash('message', ['unauthorised' => 'You are not authorised to perform this action']);

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }
}