<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UploadedPaper;
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
        $all_issue = [];
        $data =['all_issue' => $all_issue];
        return view('admin.add_journal', $data);
    }

    public function store(Request $request)
    {
        dd($request->selected_file);
        $this->validate($request,[
            'paper_title'=>'required',
            'selected_file'=>'required'
        ],[
           'paper_title.required'=>'Title Field is required',
           'selected_file.required'=>'File must be selected and file format must be in pdf or doc'
           //'paper_title.alpha_num'=>'This field accept only alpha numeric characters'
        ]);
        $uploadedPaper = new UploadedPaper();
        $uploadedPaper->paper_title = $request->paper_title;
        $uploadedPaper->author_name = $request->author_name;
        $uploadedPaper->abstract = $request->abstract;
        $uploadedPaper->issue_id = 1;
        $uploadedPaper->status = 1;
      
        if($request->selected_file){ 
            $fileName = time() .'_'.$request->selected_file->getClientOriginalName();
            $filePath = $request->selected_file->storeAs('uploads', $fileName, 'public');
            $uploadedPaper->file_location = '/storage/upload/' .$fileName;
            $uploadedPaper->save();
            return back()->with('success', 'Filehas been uploaded.')
                         ->with('file', $fileName);  
         }
        $uploadedPaper->save();
        return redirect()->action('Admin\UploadedPaperController@create')->with('success', 'Paper submitted successfully');
    }
    }
