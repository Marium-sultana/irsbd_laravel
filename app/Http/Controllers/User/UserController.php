<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.change_pass');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('user.user_login');
    }

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
        $user = User::where([
            ['email', '=', $request->email],
            ['password', '=', md5($request->password)]
        ])->first();

        //$user = User::all('email','password');

        if(!empty($user)){
        //dd($user[0]);
       // dd($user->id);
       // Session::put('user_id',$user->id);
        //Session::put('username',$user->username);
        //Session::put('name',$user->id);
        session([
            'user_id' => $user->id,
            'name' => $user->name,
            'user_email' => $user->email,
            'username' => $user->username

        ]);


           return view('user.submit_paper');
          // return redirect()->route('user');
        }
        else{
           //return redirect()->route('user');
           return view('user.user_login');

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
