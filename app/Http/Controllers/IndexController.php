<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        echo "首页";
    }

    public function goods(){
        echo "商品页";
    }

   public function add(){
    //    dd(request()->isMethod());
       if(request()->isMethod('get')){
            return view('add');
       }
       if(request()->isMethod('post')){
            echo request()->names;
        }    
      
   }

   public function adddo(){
       echo request()->names;
       return redirect('/goods');
   }

   public function show($id,$name){
    echo $id.'=='.$name;
   }

   public function news($goods_id=null){
       echo'新闻';
       echo $goods_id;
   }

   public function cate($goods_id=null,$name){
    echo'新闻';
    echo $goods_id;
    echo $name;
}

}
