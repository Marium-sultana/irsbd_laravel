<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function member()
    {
        return view('front.irs_member');
    }

    public function editorial_team()
    {
        $editorial_team = [];
        $data = ['editorial_team' => $editorial_team];
        return view('front.editorial_team', $data);
    }

    public function current()
    {
        $all_issue = [];
        $data = ['all_issue' => $all_issue];
        $all_paper = [];
        $paper = ['all_paper' => $all_paper];
        return view('front.current', $data, $paper);
    }

    public function archive()
    {
        return view('front.archive');
    }

   

    public function contact()
    {
        return view('front.contact');
    }
}
