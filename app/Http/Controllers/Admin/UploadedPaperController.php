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
      $data = UploadedPaper::all('id','paper_title','author_name','abstract','issue_id','file_location');
      $issue_data = Issue::all();
      $issue = [];
      foreach($issue_data as $value){
          $issue[$value->id] = $value->issue_name;
      }
        return view('admin.manage_journals',compact('data','issue'));
    }

    public function create()
    {
        $issue = Issue::pluck('issue_name','id');
        return view('admin.add_journal',compact('issue'));
    }

    public function store(Request $request)
    {
        //dd($request->selected_file);
        $this->validate($request,[
            'paper_title'=>'required',
            'selected_file'=>'required'
        ],[
           'paper_title.required'=>'Title Field is required',
           'selected_file.required'=>'File must be selected and file format must be in pdf or doc'
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
         }
       
        $uploadedPaper->save();
        return redirect()->action('Admin\UploadedPaperController@index')->with('success', "Paper submitted successfully");
         
    }

    public function edit($id)
    {
        $uploadedPaper = UploadedPaper::find($id);
        return view('admin.edit_journal',compact('uploadedPaper'));

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $uploadedPaper = UploadedPaper::find($id);
        $uploadedPaper->delete();
        //dd($uploadedPaper);
        return redirect()->action('Admin\UploadedPaperController@index')->with('success', "Paper deleted successfully");

    }
    }
