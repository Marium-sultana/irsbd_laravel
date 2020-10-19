<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EditorialTeam;
use App\IrsMember;
use App\Issue;
use App\UploadedPaper;
use App\WiseWord;
use App\BannerImage;
use App\CallPaper;
use App\CoverImage;


class HomePageController extends Controller
{
    public function index()
    {
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $coverImage = CoverImage::select('id','image_location')->orderBy('created_at','desc')->first(); 
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('created_at','desc')->first();
        $paperData = UploadedPaper::select('*')->where('issue_id',$issueData->id)->get();

        //dd($issueImage);
        return view('front.home',compact('issueImage','wiseWord','callPaper','coverImage','paperData'));
    }

    public function manuscript()
    {
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        return view('front.manuscript_submission',compact('issueImage','wiseWord','callPaper'));
        
    }

    public function guidelines()
    {
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');

        return view('front.author_guidelines',compact('issueImage','wiseWord','callPaper'));
        
    }

    public function help()
    {
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        return view('front.help_desk',compact('issueImage','wiseWord','callPaper'));
        
    }

    public function member()
    { 
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
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
        return view('front.irs_member', compact('data','designation_data','issueImage','wiseWord','callPaper'));
    }

    public function editorial_team()
    {
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $data = EditorialTeam::all();
        //dd($data);
        return view('front.editorial_team', compact('data','issueImage','wiseWord','callPaper'));
    }

    public function current()
    {
       // $all_issue = [];
        //$data = ['all_issue' => $all_issue];
        //$all_paper = [];
        //$paper = ['all_paper' => $all_paper];
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('created_at','desc')->first();
        //$paperData = UploadedPaper::all();
        $paperData = UploadedPaper::select('*')->where('issue_id',$issueData->id)->get();
        //dd($paperData);
        return view('front.current', compact('issueData','paperData','issueImage','wiseWord','callPaper'));
    }

    public function archive()
    {
       // $all_issue = [];
       // $data = ['all_issue' => $all_issue];
       $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
       $callPaper = CallPaper::all('text');
       $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('created_at','desc')->get();
        $issueArray= [];
        foreach($issueData as $info){
            $issueArray[$info->year][] = $info;
        }
        //dd($issueArray);
        return view('front.archive',compact('issueArray','issueImage','wiseWord','callPaper'));
    }

    public function article($id)
    {
        //dd($id);
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $issueData = Issue::select('id','issue_name','year')->where('id',$id)->first();
        $paperData = UploadedPaper::select('*')->where('issue_id',$id)->get();

        return view('front.view_article',compact('issueData','paperData','issueImage','wiseWord','callPaper'));
        
    }

    public function detail($id)
    {
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $paperDetail = UploadedPaper::select('paper_title','author_name','abstract','file_location')->first();
        return view('front.paper_detail',compact('paperDetail','issueImage','wiseWord','callPaper'));
        
    }
   

    public function contact()
    {
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        return view('front.contact',compact('issueImage','wiseWord','callPaper'));
    }
    
}