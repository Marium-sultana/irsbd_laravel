<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
        $this->validate($request,[
             'selected_file'=>'required'
        ],[
            'selected_file.required'=>'Image format must be in jpeg ,jpg, png format'
        ]);
        
        Validator::make($request->all(),['selected_file'=>"required|mimes:png,jpeg,jpg|max:2048"])->validate();

        $bannerImage = new BannerImage();

        if($request->hasFile('selected_file')){
            $fileName = time() .'_'.$request->selected_file->getClientOriginalName();
            $filePath = $request->selected_file->storeAs('banner', $fileName, 'public');
            $bannerImage->image_location = $fileName; 
            $bannerImage->save();
        }
       // dd($request->seleced_file);
       //$bannerImage::find(1)->update(['image_location'=>'marium']);
       return redirect()->action('Admin\BannerImageController@index');
    }
}
