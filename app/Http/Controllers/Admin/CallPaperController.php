<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CallPaper;


class CallPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callPaper = CallPaper::all('text');
        return view('admin.add_call_paper',compact('callPaper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $callPaper = new CallPaper();
       // $callPaper->save();
       // DB::table('call_papers')->where('id', 1)->update(['text' => "Updated Text"]);
        $data = CallPaper::all()->first();
        if(!empty($data)){
            DB::table('call_papers')->where('id',$data->id)->update(['text' => $request->text]);
            $msg = "Call paper updated successfully";
        }else{
            $callPaper->text = $request->text;
            $callPaper->save();
            $msg = "Call paper inserted successfully";
        }
        
       // dd($data);
        return redirect()->action('Admin\CallPaperController@index')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
