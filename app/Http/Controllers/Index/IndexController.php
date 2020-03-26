<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Goods;
use App\Cate;
use App\Cart;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    public function index(){
        //先去缓存读取数据
        // Cache::flush();
        // Redis::flushall();
        // $res = Cache::get('is_slide');
        // $res = cache('is_slide');
        $res = Redis::get('is_slide');
        // dd($res);
        if(!$res){
            //如果缓存没有则读取数据库
            // $res = Goods::select('goods_id','goods_img')->where('is_slide',1)->take(5)->get();
            $res = Goods::getSlideData();
            //存入memcache
            // Cache::put('is_slide',$res,60*60*24);
            // cache('is_slide',$res,60*60*24);
            // 存入Redis
            //序列化
            $res = serialize($res);
           
            Redis::setex('is_slide',60*60*24,$res);
            }
            // 反序列化
            $res = unserialize($res);
           
            $res2 = Cate::where('pid',0)->get();
        $res3 = Cache::get('is_hot');
        if(!$res3){
             $res3 = Goods::where('is_hot',1)->take(4)->get();
             Cache::put('is_hot',$res3);
        }
        $res4 = Cache::get('is_new');
        // dd($res4);
        if(!$res4){
            $res4 = Goods::where('is_new',2)->take(4)->get();
            Cache::put('is_new',$res4);
        }
        //    dd($res3);
        return view('index.index',['res'=>$res,'res2'=>$res2,'res3'=>$res3,'res4'=>$res4]);
    }
    //列表
    public function prlist(){
        $res = Goods::get();
        return view('index.prlist',['res'=>$res]);
    }
}
