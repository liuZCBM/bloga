@extends('layouts.shop') 
@section('title', '首页')
@section('content')

@if(session('msg'))
<div class="alert alert-danger">{{session('msg')}}</di v>
@endif
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     
     <form action="{{url('/log/user')}}" method="get" class="reg-login">
     
      <h3>还没有三级分销账号？点此<a class="orange" href="{{url('/reg')}}">注册</a></h3>
      @csrf
      <input type="hidden" name="refer" value="{{request()->refer}}">
      <div class="lrBox">
       <div class="lrList"><input type="text" name="name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList"><input type="password" name="password" placeholder="输入证码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即登录" />
      </div>
     </form><!--reg-login/-->
     @include('index.public.footer');


      @endsection