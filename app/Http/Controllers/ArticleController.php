<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\brand2;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res2 = brand2::get();
        $article_name = request()->article_name;
        $c_name = request()->c_name;
        
        $where = [];
        if($article_name){
            $where[] = ['article_name','like',"%$article_name%"];
        }
        if($c_name){
            $where[] = ['c_name','like',"%$c_name%"];
        }
      
        $res = Article::
        leftjoin('brand2','brand2.c_id','=','article.c_id')
        ->where($where)
        ->paginate(2);
        return view('article.index',['res'=>$res,'res2'=>$res2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = brand2::get();
        return view('article.create',['res'=>$res]);
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
            'article_name' => 'required|unique:article|regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u',
            'c_id' => 'required',
            'article_pu' => 'required',
            'article_xs' => 'required',
            'article_title' => 'required',
            'article_word' => 'required',
            
        ],[
            'article_name.required' => '名字必填',
            'article_name.unique' => '名字已有',
            'article_name.regex' => '由中文，字母，数字，下划线',
            'c_id.required' => '文章分类必填',
            'article_pu.required' => '文章必填',
            'article_xs.required' => '文章重要性必填',
            'article_title.required' => '是否显示必填',
            'article_word.required' => '关键章必填',
        ]);
        $data = request()->except('_token');
        if($request->hasFile('article_logo')){
            $data['article_logo'] = upload('article_logo');
        }
        $res = Article::insert($data);
        if($res){
           return redirect('/article/index');
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
        $res = brand2::get();
        $res2 = Article::find($id);
        //  dd($res2);
      
        return view('article.edit',['res'=>$res,'res2'=>$res2]);
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
        $res = Article::where('article_id',$id)->update($data);
        if($res!==false){
            return redirect('/article/index');
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
        $res = Article::where('article_id',$id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(['code'=>'00000','msg'=>'删除成功']);
            }
            return redirect('/article/index');
         }
    }
    public function checkonly(){
        $article_name = request()->article_name;
        $count = Article::where('article_name',$article_name)->count();
        // dd($count);
        return json_encode(['code'=>'00000','count'=>$count]);
    }
}
