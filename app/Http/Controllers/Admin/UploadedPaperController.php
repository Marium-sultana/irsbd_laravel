<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadedPaperController extends Controller
{
    public function index()
    {
        $all_journal = [];
        $data = ['all_journal'=>$all_journal];
        return view('admin.manage_journals', $data);
    }
}
