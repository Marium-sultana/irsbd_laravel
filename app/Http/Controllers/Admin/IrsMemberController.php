<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\IrsMember;

class IrsMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
             'member_name' => 'required',
             'member_contact_no' => 'required',
             'member_email' => 'required',
             'member_image' => 'required',
             'member_profile_link' => 'required'
        ],[
             'member_name.required' => 'Name field must be required',
             'member_contact_no.required' => 'Contact field must be required',
             'member_email.required' => 'Email field must be required',
             'member_profile_link.required' => 'Profile Link field must be required'
             
        ]);

        Validator::make($request->all(),['member_image'=>"required|mimes:png,jpeg,jpg|max:2048"])->validate();

        $irsMember = new IrsMember();
        $irsMember->member_name = $request->member_name;
        $irsMember->member_designation = $request->member_designation;
        //$irsMember->member_image = '';
        $irsMember->member_contact_no = $request->member_contact_no;
        $irsMember->member_email = $request->member_email;
        $irsMember->member_profile_link = $request->member_profile_link; 
        
        if($request->hasFile('member_image')){
            $fileName = $request->member_image->getClientOriginalName();
            $filePath = $request->member_image->storeAs('member_images',$fileName,'public');
            $irsMember->member_image = '/storage/member_images/' .$fileName;
            $irsMember->save();
            return back()->with('success', 'Image has been uploaded.')
                         ->with('file', $fileName);  
        }
        
        $irsMember->save();
        return redirect()->action('Admin\IrsMemberController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $all_member = [];
        $data = ['all_member' => $all_member];
        return view('admin.manage_member', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
