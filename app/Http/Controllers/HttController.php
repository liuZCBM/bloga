<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Htt;
class HttController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $res = DB::table('xue')->get();
        $res = Htt::get();
        return view('htt/index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       return view('htt.create');

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
    //    $res = DB::table('xue')->insert($data);
       $res = Htt::insert($data);
       if( $res ){
        return redirect('/htt/index');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $res = DB::table('xue')->where('brand_id',$id)->first();
        $res = Htt::find($id);
        return view('/htt/edit',['res'=>$res]);
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
        $data = $request->except('_token');
        $res = DB::table('xue')->where('brand_id',$id)->update($data);
        if($res!==false){
           return redirect('/htt/index');
        }    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('xue')->where('brand_id',$id)->delete();
        if($res){
            return redirect('/htt/index');
        }
    }
}
