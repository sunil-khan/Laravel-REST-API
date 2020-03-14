<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\userManagement;
use Response;
use Illuminate\Support\Facades\Cache;


class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = Cache::remember('users', 300, function () {
            return userManagement::all()->toArray();
        });
        return response()->json(['users' => $users]);     
        
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

     $validation = Validator::make($request->all(),[
        'first_name'=>'required|string|max:255|strip_tags',
        'last_name'=>'required|string|max:255|strip_tags',
        'email'=>'required|string|email|strip_tags',
        'password'=>'required|confirmed|min:6',

    ]);

     $request['password'] = bcrypt($request['password']);

     if ($validation->fails()) 
     {
        return $validation->errors()->first();
        
    }
    else
    {

        unset($request['password_confirmation']);
        
        $data = userManagement::create($request->all());
        return $data;

    }


}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $get_user = Cache::remember('get_user'.$id, 300, function () use ($id) 
        {
            return userManagement::findOrfail($id);
        });
        return response()->json(['get_user' => $get_user]);


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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
