<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Ca;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //存session
        // session(['name'=>'张三 李四 王五 马六']);
        // request()->session()->put('number',4);
        // // 销毁session
        // // session(['name'=>null]);
        // // request()->session()->forget('number');
        // request()->session()->flush();
        // // 取session
        // echo request()->session()->get('number');
        // echo session('name');
        // 取所有
        // dump(request()->session()->all());
        // $news_name = request()->news_name;
        // $news_title = request()->news_title;
        // // dd($news_title);
        // $where = [];
        // if(!$news_name){
        //     $where [] = ['news_name','like',"%'$news_name'%"];
        // }
        // $input = request()->all();
        $res = News::leftjoin('ca','news.pid','=','ca.pid')->paginate(2);
        // dd($res);
        // if(request()->ajax()){
        //     return view('news.ajaxpage',['res'=>$res]);
        // }
        return view('news.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $res = News::get();
        $cate = getcainfo($res);
    // dd($cate);
        return view('news.create',['res'=>$res,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'news_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:news',
            'news_title' => 'required',
        ],[
            'news_name.required' => '新闻名字必填',
            'news_name.regex' => '由中文、字母、数字、下划线组成',
            'news_name.unique' => '新闻名字已有',
            'news_title.required' => '作者名字必填',

        ]);
        $data = request()->except('_token');
        // $data['news_time'] = time();
        // dd($data);
        $res = News::insert($data);
        if($res){
            return redirect('/news/index');
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
