<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
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
        $data = IrsMember::all('id','member_name','member_designation','member_contact_no','member_email');
        return view('admin.manage_member', compact('data'));   
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
             //'member_contact_no' => 'required',
            // 'member_email' => 'required',
             'member_image' => 'required'
            // 'member_profile_link' => 'required'
        ],[
             'member_name.required' => 'Name field must be required',
            // 'member_contact_no.required' => 'Contact field must be required',
             //'member_email.required' => 'Email field must be required',
             //'member_profile_link.required' => 'Profile Link field must be required'
             
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
            $irsMember->member_image = $fileName; 
           
        }
        
        $irsMember->save();
        return redirect()->action('Admin\IrsMemberController@index')->with('success', "Member Created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $irsMember = IrsMember::find($id);
        //dd($uploadedPaper);
       // $paper_info = [];
       // $data=['paper_info' => $paper_info];
         return view('admin.edit_member',compact('irsMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IrsMember $irsMember)
    {
       // dd($request->all());

        if($request->hasFile('member_image')){ 
            // dd('true');
            //@unlink(public_path('/storage/papers/'.$uploadedPaper->file_location));
            Storage::disk('public')->delete('/member_images/' . $irsMember->member_image);
 
             $fileName = time() .'_'.$request->member_image->getClientOriginalName();
             $filePath = $request->member_image->storeAs('member_images', $fileName, 'public');
            // $uploadedPaper->update(['file_location' => $fileName]);
           // Storage::delete('/storage/app/public/papers/'.$fileName); 
           $submittedData = [
              
             'member_name' => $request->member_name,
              'member_email' => $request->member_email,
              'member_profile_link' => $request->member_profile_link,
              'member_contact_no' => $request->member_contact_no,
              'member_designation' => $request->member_designation,
              'member_image' => $fileName
           
       ];
          }
          else{
             // dd('false');
             $submittedData = [
              
                'member_name' => $request->member_name,
                'member_email' => $request->member_email,
                'member_profile_link' => $request->member_profile_link,
                'member_contact_no' => $request->member_contact_no,
                'member_designation' => $request->member_designation              
           ];
          }
        // dd($submittedData,$irsMember);
          
         $irsMember->update([$submittedData]);
         $irsMember = IrsMember::find($irsMember->id)->update($submittedData);
 
         return redirect()->action('Admin\IrsMemberController@index')->with('success', "Member updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $irsMember = IrsMember::find($id);
        $irsMember->delete();
        return redirect()->action('Admin\IrsMemberController@index')->with('success', "Member deleted successfully");
        
    }
}
