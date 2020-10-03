<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function login()
    {
        if(!session()->has('admin'))
        return view('admin.admin_login');
    else
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkLogin(Request $request)
    {
        $admin = Admin::where([
            ['email_address', '=', $request->admin_email],
            ['password', '=', md5($request->admin_password)]
        ])->first();

        //$user = User::all('email','password');

        if(!empty($admin)){
            //dd($user[0]);
            // dd($user->id);
            // Session::put('user_id',$user->id);
            //Session::put('username',$user->username);
            //Session::put('name',$user->id);
            session([
				'admin' =>
				[
					'admin_id' => $admin->id,
					'name' => $admin->full_name,
					'admin_email' => $admin->email_address
				]
            ]);
            return redirect('admin');
        }

        else{
            return redirect('admin/checkLogin');

        }
    }

    public function adminLogout()
    {
        session()->flush();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
