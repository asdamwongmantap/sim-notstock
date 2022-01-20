<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all user
        $data_user = \App\Models\User::all();
        return view('user/listuser',['data_user' => $data_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add user
        return view('user/adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //process add user
        DB::table('users')->insert(
            ['name' => $request->name, 'email' => $request->email,'password' => bcrypt($request->password),'remember_token' => Str::random(60),'level' => $request->level]
        );
        return 'berhasil';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get detail user
        $data_user = \App\Models\User::find($id);
        return view('user/detailuser',['data_user' => $data_user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get edit user
        $data_user = \App\Models\User::find($id);
        return view('user/edituser',['user' => $data_user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update detail product
        $data_user = \App\Models\User::find($id);
        $data_user->update($request->all());
        return 'berhasil';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //delete user
         $user = \App\Models\User::find($id);
         $user->delete();
         return 'berhasil';
    }
}
