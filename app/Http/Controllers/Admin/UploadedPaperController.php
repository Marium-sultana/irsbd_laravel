<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\UploadedPaper;
use App\Issue;
use App\File;
//use App\Storage;

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
        $issue = Issue::where('status', 1)->pluck('issue_name','id');
        //dd($issue);
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
        $uploadedPaper->paper_title = trim($request->paper_title);
        $uploadedPaper->author_name = trim($request->author_name);
        $uploadedPaper->abstract= $request->abstract;
        $uploadedPaper->issue_id = $request->issue_id;
        $uploadedPaper->status = 1;

        Validator::make($request->all(),['selected_file'=>"required|mimes:pdf,zip,docx|max:2048"])->validate();
      
        if($request->selected_file){ 
            $fileName = time() .'_'.$request->selected_file->getClientOriginalName();
            $filePath = $request->selected_file->storeAs('papers', $fileName, 'public');
            $uploadedPaper->file_location = $fileName; 
         }
       
        $uploadedPaper->save();
        return redirect()->action('Admin\UploadedPaperController@index')->with('success', "Paper submitted successfully");
         
    }

    public function edit($id)
    {
        $uploadedPaper = UploadedPaper::find($id);
       //dd($uploadedPaper);
        return view('admin.edit_journal',compact('uploadedPaper'));

    }

    public function update(Request $request, UploadedPaper $uploadedPaper)
    {
              //dd($uploadedPaper->id);
       // $uploadedPaper = new UploadedPaper();
        //dd($request->all());
       // $uploadedPaper->update(['paper_title' => $request->paper_title]);
       // $uploadedPaper->update(['author_name' => $request->author_name]);
       // dd($uploadedPaper);
       // $uploadedPaper->update(['file_location' => '']);
       $this->validate($request,[
        'selected_file'=>'required'
    ],[
       'selected_file.required'=>'File must be selected and file format must be in pdf or doc'
    ]);
    Validator::make($request->all(),['selected_file'=>"required|mimes:pdf,zip,docx|max:2048"])->validate();

        if($request->selected_file){ 
           // dd('true');
           //@unlink(public_path('/storage/papers/'.$uploadedPaper->file_location));
           Storage::disk('public')->delete('/papers/' . $uploadedPaper->file_location);

            $fileName = time() .'_'.$request->selected_file->getClientOriginalName();
            $filePath = $request->selected_file->storeAs('papers', $fileName, 'public');
           // $uploadedPaper->update(['file_location' => $fileName]);
          // Storage::delete('/storage/app/public/papers/'.$fileName); 
          $submittedData = [
             
            'paper_title' => $request->paper_title,
             'author_name' => $request->author_name,
             'file_location' => $fileName
          
      ];
         }
         else{
            // dd('false');
            $submittedData = [
             
                'paper_title' => $request->paper_title,
                 'author_name' => $request->author_name
                
              
          ];
         }

         
        $uploadedPaper->update([$submittedData]);
        $uploadedPaper = UploadedPaper::find($uploadedPaper->id)->update($submittedData);
         //dd($submittedData,$uploadedPaper);

        return redirect()->action('Admin\UploadedPaperController@index')->with('success', "Paper updated successfully");

    }

   

    public function destroy($id)
    {
        $uploadedPaper = UploadedPaper::find($id);
        Storage::disk('public')->delete('/papers/' . $uploadedPaper->file_location);
        $uploadedPaper->delete();
        //dd($uploadedPaper);
        return redirect()->action('Admin\UploadedPaperController@index')->with('success', "Paper deleted successfully");

    }


    }
