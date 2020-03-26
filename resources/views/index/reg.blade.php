@extends('layouts.shop') 
@section('title', '首页')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/reg/reg_do')}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url('/log')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" name="code" placeholder="输入短信验证码" /> <button type="button">获取验证码</button></div>
       <div class="lrList"><input type="text" name="password" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" name="repassword" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" class="but" value="立即注册" />
      </div>
     </form><!--reg-login/-->
    @include('index.public.footer');
    <script>
        $('button').click(function(){
            var name = $('input[name="name"]').val();
            var mobilereg = /^1[3|8|5|9|]\d{9}$/;
            if(mobilereg.test(name)){
                $.get('/reg/sedsms',{name:name},function(res){
                    if(res.code=='00001'){
                        alert(res.msg);
                    }
                    if(res.code=='00000'){
                        alert(res.msg);
                    }
                   
                },'json');
                return;
            }
            var emailname = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
             
                if(emailname.test(name)){
                $.get('/reg/sedemail',{name:name},function(res){
                    if(res.code=='00001'){
                        alert(res.msg);
                    }
                    if(res.code=='00000'){
                        alert(res.msg);
                    }
                   
                },'json');
                return;
            }
          
        })
        
        // 邮箱
       
             
          
       
       
        

    </script>

    @endsection