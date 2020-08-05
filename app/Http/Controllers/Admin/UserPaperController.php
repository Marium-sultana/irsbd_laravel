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
}
