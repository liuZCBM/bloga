@extends('layouts.shop') 
@section('title', '首页')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">2</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/static/index/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" /> 全选</a></td>
       </tr>
       @foreach($res as $v)
       <tr>
        <td width="4%"><input type="checkbox" goods_id ="{{$v->goods_id}}" class="box" name="1" /></td><td  id="but" goods_id ="{{$v->goods_id}}"><a href="javascript:;">删除</a></td>
        <td class="dingimg" width="15%"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>{{date('Y-m-d H:i:s',$v->cart_time)}}</time>
        </td>
        <td align="right"> <font color="red"><input type="text" class="spinnerExample" value="{{$v->number}}" /></font></td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">¥{{$v->goods_price*$v->number}}</strong></th>
       </tr>
       @endforeach
      </table>
     </div><!--dingdanlist/-->
     
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <!-- <td width="50%">总计：<strong class="orange">¥69.88</strong></td> -->
       <td width="40%"><a href="javascript:;" class="jiesuan">去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
     
    <script src="/static/index/js/jquery.excoloSlider.js"></script>
    
     <script>
         $("#but").click(function(){
             var goods_id = $(this).attr("goods_id");
             if(confirm('是否确认删除')){
            $.get('/delcar',{goods_id:goods_id},function(result){
               if(result.code=='00000'){
                   location.reload();
               }
            },'json');
        }
         })
         
         $(document).on("click",".jiesuan",function(){
            //  alert(23)
            var _box = $(".box:checked");
            if(_box.length>0){
                var goods_id = '';
                _box.each(function(index){
                    goods_id+= $(this).attr("goods_id")+',';
                })
                goods_id = goods_id.substr(0,goods_id.length-1);//获取id
                location.href="/payid?goods_id="+goods_id;
            }else{
                alert("请至少选择一件商品进行结算");
            }
            
        })
        //  $(".box").click(function(){
        //      var _box = $("box:checked");
            
           
        //         //循环得到每一个复选框
        //         var goods_id = '';
        //         _box.each(function(index){
                   
        //              goods_id += $(this).attr('goods_id')+',';
        //         })
        //         var goods_id = goods_id.substr(0,goods_id.length-1);
        //      $.get('/payid',{goods_id:goods_id},function(res){
        //          alert(res)
        //      })
        //  })
    
    </script> 
    

@endsection 