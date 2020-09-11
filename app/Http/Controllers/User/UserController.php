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
        if(!session()->has('user_id'))
            return view('user.user_login');
        else
            return redirect('/');
    }

    public function create()
    {
        //
    }

     public function user_registration()
     {
        return view('front.user_registration');
         
     }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
         $user = new User();
         $user->username = $request->username;
         $user->password = md5($request->password);
         $user->name = $request->name;
         $user->gender = $request->gender;
         $user->email = $request->email;
         $user->additional_email = $request->additional_email;
         $user->phone = $request->phone;
         $user->country = $request->country;
        // $user->forget_password = 0;
         $user->save();
         return redirect()->action('User\UserController@user_registration')->with('success', "User Created Successfully");
        

     }

    public function checkLogin(Request $request)
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
            return redirect('user/submit_paper');
        }

        else{
            return redirect('user/checkLogin');

        }
    }

    public function userLogout()
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
