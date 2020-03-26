<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\News;
use App\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
     //商品详情的展示
    public function index($id){
        // 统计访问量
        // if(Cache::add('count_'.$id,1)){
        //     $count = Cache::get('count_'.$id);
        // }else{
        //     $count = Cache::increment('count_'.$id);
        // }
        // Cache::flush();
        // $count = Cache::add('count_'.$id,1) ? Cache::get('count_'.$id):
        // Cache::increment('count_'.$id);
        $count = Redis::setnx('count_'.$id,1)?Redis::get('count_'.$id):
        Redis::incr('count_'.$id);

       $data = Cache::get($id);
    //    dd($data);
       if(!$data){
            $data = Goods::find($id);
            Cache::put($id,$data,60*60*24);
       }
       
        return view('index.prinfo',['data'=>$data,'count'=>$count]);
    }

    public function addcart(request $request){
         // 判断用户是否登录
        $login = session("name");
        if(!$login){
            return json_encode(['code'=>'00001','msg'=>'用户未登录']);

        }
        $number = $request->number;
        // dump($number);
        $goods_id = $request->goods_id;
        //根据商品id查询商品信息
        $goods = Goods::find($goods_id);
        $goods_price = $goods->goods_price*$number;
        // dd($goods_price);
        if($goods->goods_num<$number){
            return json_encode(['code'=>'00004','msg'=>'库存不足']);
        }
        //判断用户是否在之前添加过此商品，如果添加过更改购买数量即可
        $cart = Cart::where(['login_id'=>$login->login_id,'goods_id'=>$goods_id])->first();
        if($cart){
            $number = $cart->number+$number;
            if($goods->goods_num<$number){
                $number = $goods->goods_num;
            }
            $res = Cart::where('login_id',$login->login_id)->update(['number'=>$number]);
        }else{

        
        $data = [
            'goods_id'=>$goods_id,
            'login_id'=>$login->login_id,
            'goods_price'=>$goods_price,
            'goods_name'=>$goods->goods_name,
            'goods_img'=>$goods->goods_img,
            'cart_time'=>time(),
            'number'=>$number
        ];
            $res = Cart::insert($data);
            if( $res ){
                return json_encode(['code'=>'00003','msg'=>'加入购物车成功']);
            }
        }
    }
    public function car(){
        $res = Cache::get('gid');
        if(!$res){
        $res = Cart::leftjoin("goods","cart.goods_id","=","goods.goods_id")->get();
         Cache::put('gid',$res);    
        }
        return view('index.car',['res'=>$res]);
    }

   
}
