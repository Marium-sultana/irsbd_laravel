<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Issue;

class IssueController extends Controller
{
    public function index()
    {
      
    }
    public function create()
    {
        return view('admin.add_issue');
    }
    public function store(Request $request)
    {
        $issue = new Issue();
    }
    public function show()
    {
        $all_issue = [];
        $data = ['all_issue'=>$all_issue];
        return view('admin.manage_issue', $data);
    }
}
