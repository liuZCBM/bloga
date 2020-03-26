<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\News;
use App\Cart;
use App\Area;
use App\Address;
use App\Order;
use Illuminate\Support\Facades\Cache;
class CartController extends Controller
{
    // 删除
    public function delcar(Request $request){
        $goods_id = $request->goods_id;
        $res = Cart::where('goods_id',$goods_id)->delete();
        return json_encode(['code'=>'00000','count'=>$count]);
        
    }
    // 订单
    public function pay(){
        return view('index/pay');
    }
    // 确认结算
    public function success(Request $request){
        $res = Cache::get('cart_id');
        if(!$res){
        $res = Order::get();
            Cache::put('cart_id',$res);
        }
        return view('index/success',['res'=>$res]);
    }
    public function cartsu(Request $request){
        $id = $request->id;
        // dd($id);
        $cart_id = $request->cart_id;
        $login = session("name");
       
        $cart = Cart::find($cart_id);
        $number = $cart->number;
        //  dd($number);
        $order_no = time().rand(10000,99999);
       
        $order_time['order_time'] = time();
        $data = [
            'login_id'=>$login->login_id,
            'goods_price'=>$cart->goods_price,
            'cart_id'=>$cart_id,
            'order_no'=>$order_no,
            'order_time'=>time(),
            'id'=>$id,
            'number'=>$number
        ];
         Order::insert($data);
        return json_encode(['code'=>'00004','msg'=>'下单成功']);
        // dd($cart);
    }

    public function payid(Request $request){
        $goods_id = $request->goods_id;
        $res = Cache::get('sid');
        // dd($res);
        if(!$res){
            $res = Cart::where('goods_id',$goods_id)->get();
            Cache::put('sid',$res);
        }
        $data = Address::get();
        return view('index/pay',['res'=>$res,'data'=>$data]);
    }
    //收货地址
    public function address(){
        $area = Area::where('pid',0)->get();
        
       $city = $this->city();
        return view('index/address',['area'=>$area,'city'=>$city]);
    }

    public function city(){
        $id = request()->id;
       
        $city = Area::where('pid',$id)->get();
        
       return $city;
    }
    // 添加地址
    public function add_do(){
        $data = request()->all();
        $data['time'] = time();
        $res = Address::insert($data);
        return redirect('/add_dos');
    }
    public function add_dos(){
        $res = Address::get();
        return view('index.add_dos',['res'=>$res]);
    }
}
