<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }

    // public function logindo(){
    //     $post = request()->except('_token');
    //     //   dump($post);
    // //     $data['admin_pwd'] = md5(md5($data['admin_pwd']));
    // //     $adminuser = Admin::where($data)->first();
    // //     if($adminuser){
    // //          session(['adminuser'=>$adminuser]);
    // //          return redirect('goods/index');
    // //     }
    // //    return redirect('/login/login')->with('msg','用户名或者密码错误!');

    //     $adminuser = Admin::where('admin_name',$post['admin_name'])->first();
    //     // dd($adminuser);
    //     if(decrypt($adminuser->admin_pwd)!=$post['admin_pwd']){
    //             return redirect('/login/login')->with('msg','用户名或者密码错误!');
    //     }
    //     if(isset($post['rember'])){
    //         Cookie::queue('adminuser',$adminuser, 7*24*60);
    //     }
       
    //     session(['adminuser'=>$adminuser]);
    //     return redirect('goods/index');
    // }
        public function logindo(){
        $post = request()->except('_token');
// dd($post);//
        if (Auth::attempt(['email' => $post['admin_name'], 'password' => $post['admin_pwd']])) {
             // 认证通过... 
             return redirect('goods/index');
            // return redirect()->intended('dashboard'); }
        }
    }
     //清除session
     public function test(){
        request()->session()->flush();
        return redirect('/login/login');
    }
}
