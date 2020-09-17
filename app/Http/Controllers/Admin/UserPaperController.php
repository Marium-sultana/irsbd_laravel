<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\UserPaper;
use App\File;
use App\User;

class UserPaperController extends Controller
{
    public function index()
    {
        $a_data = UserPaper::all('id','paper_title','file_location','cover_letter','agreement_letter','other_files','author_name','status','review','text');
        return view('admin.manage_papers', compact('a_data'));
    }

    public function create()
    {
        return view('user.submit_paper');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'user_email'=>'required',
            'paper_title'=>'required',
            'author_name'=>'required',
            'abstract'=>'required',
            'selected_file'=>'required',
            'cover_letter'=>'required',
            'agreement_letter'=>'required'
             
        ],[
           //'paper_title.required'=>'Title Field is required',
           'selected_file.required'=>'File must be selected and file format must be in pdf or doc',
           'cover_letter.required'=>'File must be selected and file format must be in pdf or doc',
           'agreement_letter.required'=>'File must be selected and file format must be in pdf or doc',

        ]);

        $userPaper = new UserPaper();
        //dd($userPaper);
        $userPaper->user_email = $request->user_email;
        $userPaper->paper_title = $request->paper_title;
        $userPaper->author_name = $request->author_name;
        $userPaper->abstract= $request->abstract;
        $userPaper->suggested_reviewer = $request->suggested_reviewer;
        $userPaper->subject_area= $request->subject_area;
        $userPaper->manuscript_type= $request->manuscript_type;
       // $userPaper->cover_letter= '';
       // $userPaper->agreement_letter= '';
       // $userPaper->other_files= '';
        $userPaper->status = 1;
        $userPaper->user_id = Session::get('user_id');

      // dd($userPaper);
        	        
       Validator::make($request->all(),
       [
           'selected_file'=>"required|mimes:pdf,zip,docx|max:2048",
           'cover_letter'=>"required|mimes:pdf,zip,docx|max:2048",
           'agreement_letter'=>"required|mimes:pdf,zip,docx|max:2048",

       
       ]
       )->validate();
     
        if($request->selected_file){ 
            $fileName = time() .'_'.$request->selected_file->getClientOriginalName();
            $filePath = $request->selected_file->storeAs('user_papers', $fileName, 'public');
            $userPaper->file_location = $fileName; 
         }

         if($request->cover_letter){ 
            $fileName = time() .'_'.$request->cover_letter->getClientOriginalName();
            $filePath = $request->cover_letter->storeAs('cover_letters', $fileName, 'public');
            $userPaper->cover_letter = $fileName; 
         }

         if($request->agreement_letter){ 
            $fileName = time() .'_'.$request->agreement_letter->getClientOriginalName();
            $filePath = $request->agreement_letter->storeAs('agreement_letter', $fileName, 'public');
            $userPaper->agreement_letter = $fileName; 
         }

         if($request->other_file){ 
            $fileName = time() .'_'.$request->other_file->getClientOriginalName();
            $filePath = $request->other_file->storeAs('other_file', $fileName, 'public');
            $userPaper->other_files = $fileName; 
         }
      //  dd($userPaper);
        $userPaper->save();
        return redirect()->action('Admin\UserPaperController@viewSubmittedPaper')->with('success', "Paper submitted successfully");
         
    }

    public function show($id)
    {

    }
    
    public function viewSubmittedPaper()
    {
        $data = UserPaper::all('paper_title','file_location','cover_letter','agreement_letter','other_files','author_name','status');

        return view('user.view_submitted_paper',compact('data'));
    }

    public function edit($id)
    {
        $userPaper = UserPaper::find($id);
       //dd($uploadedPaper);
      // $paper_info = [];
      // $data=['paper_info' => $paper_info];
        return view('admin.review_paper',compact('userPaper'));

    }

    public function update(Request $request, UserPaper $userPaper){
        $submittedData = [
             
            'review' => $request->review,
             'text' => $request->text 
      ];
      $userPaper->update([$submittedData]);
      $userPaper = UserPaper::find($userPaper->id)->update($submittedData);
      return redirect()->action('Admin\UserPaperController@index')->with('success', "Paper updated successfully");

    }

    public function inbox($id)
    {
        $all_paper = [];
        $data = ['all_paper' => $all_paper];
        return view('user.inbox', $data);
    }

    public function destroy($id)
    {
        $userPaper = UserPaper::find($id);

        Storage::disk('public')->delete('/user_papers/' .$userPaper->file_location);
        Storage::disk('public')->delete('/cover_letters/' .$userPaper->cover_letter);
        Storage::disk('public')->delete('/agreement_letter/' .$userPaper->agreement_letter);
        Storage::disk('public')->delete('/other_file/' .$userPaper->other_file);
        //dd($userPaper);

       $userPaper->delete();

        return redirect()->action('Admin\UserPaperController@index')->with('success', "User Paper deleted successfully");

    }

}
