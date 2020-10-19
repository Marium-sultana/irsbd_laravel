<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CoverImage;

class CoverImageController extends Controller
{
    public function index()
    {
        return view('admin.cover_image');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
             'selected_file'=>'required'
        ],[
            'selected_file.required'=>'Image format must be in jpeg ,jpg, png format'
        ]);
        
        Validator::make($request->all(),['selected_file'=>"required|mimes:png,jpeg,jpg|max:2048"])->validate();

        $coverImage = new CoverImage();

        if($request->hasFile('selected_file')){
            $fileName = time() .'_'.$request->selected_file->getClientOriginalName();
            $filePath = $request->selected_file->storeAs('cover_image', $fileName, 'public');
            $coverImage->image_location = $fileName; 
            $coverImage->save();
        }
       // dd($request->seleced_file);
       
       
       //$bannerImage::find(1)->update(['image_location'=>'marium']);
       return redirect()->action('Admin\CoverImageController@index');
    }
}
