<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPaperController extends Controller
{
    public function index()
    {
        $all_paper = [];
        return view('admin.manage_papers', ['all_paper'=>$all_paper]);
    }

    public function create()
    {
        return view('user.submit_paper');
    }

    public function show($id)
    {
        $all_user = [];
        $data = ['all_user' => $all_user];
        return view('user.view_submitted_paper', $data);
    }

    public function inbox($id)
    {
        $all_paper = [];
        $data = ['all_paper' => $all_paper];
        return view('user.inbox', $data);
    }

}
