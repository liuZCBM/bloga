@extends('layouts.shop') 
@section('title', '首页')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><a href="{{url('/address')}}" class="hui"><strong class="">+</strong> 新增收货地址</a></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;"><a href="javascript:;" class="orange">删除信息</a></td>
      </tr>
     </table>
     
     <div class="dingdanlist" onClick="window.location.href='proinfo.html'">
      <table>
       @foreach($res as $v)
       <tr>
        <td width="50%">
         <h3>名字：<font color="red">{{$v->names}}</font></h3><p>电话：<font color="red">{{$v->tel}}</font></p>
         <time>地址：<font color="red">{{$v->province}}{{$v->province}}{{$v->desc}}</font></time>
        </td>
        <td align="right"><a href="address.html" class="hui"><span class="glyphicon glyphicon-check"></span> 修改信息</a></td>
       </tr>
       @endforeach
      </table>
     </div><!--dingdanlist/-->
     
     @include('index.public.footer');
     @endsection