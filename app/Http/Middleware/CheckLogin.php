<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $adminuser = $request->session()->get('adminuser');
        // dd($adminuser);
        if(!$adminuser){
            // //七天免登录
            // //判断cookie内是否有用户登录信息 由则获取cookie的值  获取cookie的值后存入session
            $adminuser = $request->cookie('adminuser');
            // dd($adminuser);
            if($adminuser){
                session(['adminuser'=>$adminuser]);
                $request->session()->save();
                // dump($request);
            }else{
                // return redirect('/login');
                return redirect("/login/login");
         }
           
        }
        return $next($request);
    }
}
