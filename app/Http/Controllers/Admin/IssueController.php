<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Issue;

class IssueController extends Controller
{
    public function index()
    {
        $data = Issue::all('id','issue_name','year','status');
          return view('admin.manage_issue',compact('data'));
    }
    public function create()
    {
        return view('admin.add_issue');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'issue_name'=>'required',
            'year' => 'required|numeric'
        ],[
            'issue_name.required' => 'Issue field must be required',
            'year.numeric' => 'Year field must be in number'
        ]);
        $issue = new Issue();
        $issue->issue_name = $request->issue_name;
        $issue->year = $request->year;
        $issue->save();
        return redirect()->action('Admin\IssueController@create')->with('success', 'Issue Create successfully');
    }
    public function show()
    {
        $all_issue = [];
        $data = ['all_issue'=>$all_issue];
        return view('admin.manage_issue', $data);
    }

    public function destroy($id)
    {
        $issue = Issue::find($id);
        $issue->delete();
       // dd($issue);
        return redirect()->action('Admin\IssueController@index')->with('success', "Issue deleted successfully");

    }

    public function status($id)
    {
        $issue = Issue::find($id);
        if($issue->status === 1){
            $issue->status = 0;
            $msg = 'Your issue is deactivated';
        }else{
            $issue->status = 1;
            $msg = 'Your issue is activated';
        }
        $issue->save();
       // dd($uploadedPaper);
        return redirect()->action('Admin\IssueController@index')->with('success', $msg);

    }
    
}
