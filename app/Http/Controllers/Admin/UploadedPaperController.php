<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\UploadedPaper;
use App\Issue;
use App\File;

class UploadedPaperController extends Controller
{
    public function index()
    {
        $all_journal = [];
        $data = ['all_journal'=>$all_journal];
        return view('admin.manage_journals', $data);
    }

    public function create()
    {
      //  $all_issue = [];
       // $data =['all_issue' => $all_issue];
        $issue = Issue::pluck('issue_name','id');
        //dd($issue);
        return view('admin.add_journal',compact('issue'));
    }

    public function store(Request $request)
    {
        //dd($request->selected_file);
        $this->validate($request,[
            'paper_title'=>'required',
            'selected_file'=>'required'
           //'selected_file.*'=>'mimes:doc,pdf'
        ],[
           'paper_title.required'=>'Title Field is required',
           'selected_file.required'=>'File must be selected and file format must be in pdf or doc'
           //'paper_title.alpha_num'=>'This field accept only alpha numeric characters'
        ]);
        $uploadedPaper = new UploadedPaper();
        $uploadedPaper->paper_title = $request->paper_title;
        $uploadedPaper->author_name = $request->author_name;
        $uploadedPaper->abstract = $request->abstract;
        $uploadedPaper->issue_id = $request->issue_id;
        $uploadedPaper->status = 1;

        Validator::make($request->all(),['selected_file'=>"required|mimes:pdf,zip,docx|max:2048"])->validate();
      
        if($request->selected_file){ 
            $fileName = time() .'_'.$request->selected_file->getClientOriginalName();
            $filePath = $request->selected_file->storeAs('papers', $fileName, 'public');
            $uploadedPaper->file_location = '/storage/papers/' .$fileName;
            $uploadedPaper->save();
            return back()->with('success', 'Filehas been uploaded.')
                         ->with('file', $fileName);  
         }

         foreach($request->issue as $value){
             $uploadedPaper->attachIssue($value);

         }
       
        $uploadedPaper->save();
        return redirect()->action('Admin\UploadedPaperController@create')->with('success', 'Paper submitted successfully');
    }
    }
