<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Floor;
class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Floor::get();
        return view('floor.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('floor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if($request->hasFile('floor_logo')){
            $data['floor_logo'] = upload('floor_logo');
        }
        if($request->hasFile('floor_logos')){
            $floor_logos = Moreupload('floor_logos');
            $data['floor_logos'] = implode('|',$floor_logos);
        }
        // dd($request->hasFile('floor_logos'));
        //  dd($floor_logos);
        $res = Floor::insert($data);
        if($res){
           return redirect('/floor/index');  
        }
    }
    // public function Moreupload($img){
    //     $file = request()->file($img);
    //     foreach($file as $k=>$v){
    //         if($v->isValid()){
    //             $info[$k] = $v->store('upload');
    //         }else{
    //             $info[$k] = "未获取到上传文件或上传过程错误";
    //         }
    //     }
        
    //    return $info;

    // }
       
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
