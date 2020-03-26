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
     <form action="{{url('/address/add_do')}}" method="get" class="reg-login">
      <div class="lrBox">
       <div class="lrList"><input type="text" name="names" placeholder="收货人" /></div>
      
       <div class="lrList">
        <select id="area" name="province">
                <option value="">省/直辖市</option>
            @foreach($area as $v)
                <option    value="{{$v->id}}">{{$v->name}}</option>
            @endforeach
        </select>
        <select id="area" name="city">
                <option value="" selected="selected">市</option>                        
        </select> 
       </div>
       <div class="lrList">
        <input type="textarea" name="desc" placeholder="详细地址">
       </div>
       <div class="lrList"><input type="text" name="tel" placeholder="手机" /></div>
       <div class="lrList2"><input type="text" placeholder="设为默认地址" /> <button>设为默认</button></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="保存" />
      </div>
     </form><!--reg-login/-->
     @include('index.public.footer');
   
    <script>
        $("#area").change(function(){
            var _this = $(this)
            _this.nextAll("select").html();
            var id =_this.val();
            $.get('/city',{id:id},function(res){
                var _potion = "<option value=''>请选择</option>";
         for(var i in res){
           _potion+="<option value='"+res[i]['id']+"'>"+res[i]['name']+"</option>"
         }
         _this.next("select").html(_potion);
            })
        })
    
    </script>




@endsection