<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        return view('admin.add_journal');
    }
    public function store()
    {
        return view('admin.add_issue');
    }
    public function show()
    {
        $all_issue = [];
        $data = ['all_issue'=>$all_issue];
        return view('admin.manage_issue', $data);
    }
}
