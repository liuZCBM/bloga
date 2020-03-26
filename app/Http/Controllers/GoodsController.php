<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Goods2;
use App\Cate;
use DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreGoodsPost;
use Illuminate\Support\Facades\Auth;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // $user = Auth::id();
        // $user = request()->user();
        // $user
        // dd(Auth::check())
        // dd($user);
        $goods_name = request()->goods_name;
        $where = [];
        if($goods_name){
            $where [] = ['goods_name','like',"%$goods_name"];
        }

        // DB::connection()->enableQueryLog();
        $res = Goods::select('goods.*','goods2.brand_name','cate.cate_name')
        ->leftjoin('goods2','goods.brand_id','=','goods2.brand_id')
        ->leftjoin('cate','goods.cate_id','=','cate.cate_id')->where($where)
        ->get();
        // $logs = DB::getQueryLog();
        // dd($logs);
        return view('goods.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Goods2::get();
        $res2 = Cate::get();
        $cate = getdatainfo($res2);
        // dd($cate);
        return view('goods.create',['res'=>$res,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoodsPost $request)
    {
        $data = request()->except('_token');
        if($request->hasFile('goods_img')){
            $data['goods_img'] = $this->uploads('goods_img');
        }

        if($request->hasFile('goods_imgs')){
            $goods_imgs = $this->Moreupload('goods_imgs');
            $data['goods_imgs'] = implode("|",$goods_imgs);
            
        }
        // dd($data);
        $res = Goods::insert($data);
        if($res){
            return redirect('/goods/index');  
         }
    }

    public function uploads($img){
        $file = request()->$img;
        if($file->isValid()){
            $info = $file->store('upload');
            return $info;
        }
    }

    public function Moreupload($img){
        $file = request()->file($img);
        // dd($file);
        foreach($file as $k=>$v){
            if($v->isValid()){
                $info[$k] = $v->store('upload');
            }else{
                $info[$k] = '未获取到上传文件或上传过程错误';
            }
            
        }
       return $info;
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
        $res = Goods2::get();
        $res2 = Cate::get();
        $cate = getdatainfo($res2);
        $res3 = Goods::find($id);
        // dd($res);
        return view('goods.edit',['res'=>$res,'cate'=>$cate,'res3'=>$res3]);
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
       
        $request->validate([

            'goods_name' => [
                        'required',
                        Rule::unique('goods')->ignore($id,'goods_id'),
            ],
            'brand_id' => 'required',
            'cate_id' => 'required',
            'goods_price' => 'required',
            'goods_num' => 'required|alpha_num|max:8'
        ],[
            'goods_name.required' => '名字必填!',
               'goods_name.unique' => '名字已有!',
               'goods_name.max' => '名字1—50位!',
               'goods_price.alpha_num' => '必须数字!', //价格
               'goods_price.required' => '价格必填!', //价格
              
               'goods_num.required' => '库存必填!',//库存
               'goods_num.max' => '名字小于等于20位!',//库存
               'goods_num.alpha_num' => '必须数字!',//库存
               'brand_id.required' => '品牌必填!', 
               'cate_id.required' => '分类必填!'
        ]);

        $data = request()->except('_token');
        // dd($data);
        if($request->hasFile('goods_img')){
            $data['goods_img'] = $this->uploads('goods_img');
        }

        if($request->hasFile('goods_imgs')){
            $goods_imgs = $this->Moreupload('goods_imgs');
            $data['goods_imgs'] = implode("|",$goods_imgs);
            
        }
        $res= Goods::where('goods_id',$id)->update($data);
        if($res!==false){
            return redirect('/goods/index');  
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
        $res = Goods::where('goods_id',$id)->delete();
        if($res){
            return redirect('/goods/index');  
         }
    }
}
