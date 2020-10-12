<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EditorialTeam;
use App\IrsMember;
use App\Issue;
use App\UploadedPaper;


class HomePageController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function member()
    {
        $designation_data = IrsMember::select('member_designation')->distinct()->orderByRaw( "FIELD(member_designation, 'Coordinator', 'Publication Division', 'Knowledge Sharing Division')")->get();
        $data = [];
        //$data = IrsMember::all('member_name','member_image');
        $member_info = IrsMember::all();
       foreach($member_info as $value){
           $data[$value['member_designation']][]=$value;
       }
       // dd($data['Publication Division']['member_name']);
        //dd($data['Publication Division'][0]['member_name']);
       // dd($designation,$data);
        return view('front.irs_member', compact('data','designation_data'));
    }

    public function editorial_team()
    {
        $data = EditorialTeam::all();
        //dd($data);
        return view('front.editorial_team', compact('data'));
    }

    public function current()
    {
       // $all_issue = [];
        //$data = ['all_issue' => $all_issue];
        //$all_paper = [];
        //$paper = ['all_paper' => $all_paper];
        
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('created_at','desc')->first();
        //$paperData = UploadedPaper::all();
        $paperData = UploadedPaper::select('*')->where('issue_id',$issueData->id)->get();
        //dd($paperData);
        return view('front.current', compact('issueData','paperData'));
    }

    public function archive()
    {
       // $all_issue = [];
       // $data = ['all_issue' => $all_issue];
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('created_at','desc')->get();
        $issueArray= [];
        foreach($issueData as $info){
            $issueArray[$info->year][] = $info;
        }
        //dd($issueArray);
        return view('front.archive',compact('issueArray'));
    }

    public function article($id)
    {
        //dd($id);
        $issueData = Issue::select('id','issue_name','year')->where('id',$id)->first();
        $paperData = UploadedPaper::select('*')->where('issue_id',$id)->get();

        return view('front.view_article',compact('issueData','paperData'));
        
    }

    public function detail($id)
    {
        $paperDetail = UploadedPaper::select('paper_title','author_name','abstract','file_location')->first();
        return view('front.paper_detail',compact('paperDetail'));
        
    }
   

    public function contact()
    {
        return view('front.contact');
    }
    }
    