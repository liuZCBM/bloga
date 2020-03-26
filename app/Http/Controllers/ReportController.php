<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use Illuminate\Support\Facades\Redis;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $re_name = request()->re_name;
        $where = [];
        if($re_name){
            $where [] = ['re_name','like',"%$re_name%"];
        }
        $page = request()->page??1;
        // dd($page);
        // Redis::flushall();
        $res = Redis::get('re_'.$page.'_'.$re_name);
        //  dd($res);
        if(!$res){
            echo 'DB ====';
            $res = Report::where($where)->paginate(2);
            $res = serialize($res);
                // dd($res);
             Redis::setex('re_'.$page.'_'.$re_name,60*5,$res);
           
        }
        // 你的ajax请求呢
        $input = request()->all();

        if(request()->ajax()){
            return view('report.ajaxpage',['res'=>$res,'input'=>$input]);
        }
        $res = unserialize($res);
        //   dd($res);
       return view('report.index',['res'=>$res,'input'=>$input]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.create');
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
        $data['re_time'] = time();
        $res = Report::insert($data);
        if($res){
            return redirect('/report/index');
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
