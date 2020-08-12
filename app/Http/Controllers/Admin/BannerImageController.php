<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BannerImage;

class BannerImageController extends Controller
{
    public function index()
    {
        return view('admin.add_banner');
    }

    public function store(Request $request)
    {
        $bannerImage = new BannerImage();

        if($request->hasFile('seleced_file')){
            $fileName = $request->seleced_file->getClientOriginalName();
            $filePath = $request->seleced_file->storeAs('banner',$fileName,'public');
            $bannerImage->image_location = '/storage/banner/' .$fileName;
            $bannerImage->save();
        }
       // dd($request->seleced_file);
       
       
       //$bannerImage::find(1)->update(['image_location'=>'marium']);
       return redirect()->action('Admin\BannerImageController@index');
    }
}
