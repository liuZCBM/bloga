@extends('layouts.shop') 
@section('title', '首页')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
     @if($data->goods_imgs)
     @php $goods_imgs = explode('|',$data->goods_imgs); @endphp
     @foreach($goods_imgs as $v)
     
      <img src="{{env('UPLOADS_URL')}}{{$v}}">
    @endforeach 
    @endif
     </div><!--sliderA/-->
     <table class="jia-len">
        
            <tr>
            <th>价格<strong class="orange"> ￥{{$data->goods_price}}</strong></th>
            当前访问量：{{$count}}
            <td>                                
                <input type="text" value="1"  name="number" class="spinnerExample" />
            </td>
            </tr>
            <tr>
            <td>
                <strong>商品 <font color="red"> {{$data->goods_name}}</font></strong>
                <p class="hui"></p>
            </td>
            <td align="right">
                <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
            </td>
            </tr>
            </table>
            <div class="height2"></div>
            <h3 class="proTitle">商品规格</h3>
            <ul class="guige">
            <li class="guigeCur"><a href="javascript:;">50ML</a></li>
            <li><a href="javascript:;">100ML</a></li>
            <li><a href="javascript:;">150ML</a></li>
            <li><a href="javascript:;">200ML</a></li>
            <li><a href="javascript:;">300ML</a></li>
            <div class="clearfix"></div>
            </ul><!--guige/-->
            <div class="height2"></div>
            <div class="zhaieq">
            <a href="javascript:;" class="zhaiCur">商品简介</a>
            <a href="javascript:;">商品参数</a>
            <a href="javascript:;" style="background:none;">订购列表</a>
            <div class="clearfix"></div>
            </div><!--zhaieq/-->
            <div class="proinfoList">
           
            <h5> <font color="red">介绍：</font> {{$data->goods_desc}}</h5>
          
            </div><!--proinfoList/-->
            <div class="proinfoList">
            暂无信息....
            </div><!--proinfoList/-->
            <div class="proinfoList">
            暂无信息......
            </div><!--proinfoList/-->
            <table class="jrgwc">
            <tr>
            <th>
                <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
            </th>
            <td><a id="addcart" href="javascript:void(0)">加入购物车</a></td>
            </tr>
            </table>
        
    </div><!--maincont-->
    @include('index.public.footer');
        <script>
            $('#addcart').click(function(){              
                var number = $('input[name="number"]').val();
                var goods_id = {{$data->goods_id}};
                if(number<1){
                    alert('请选择购买数量');
                    return;
                }
                $.get('/addcart',{number:number,goods_id:goods_id},function(res){
                   if(res.code=='00001'){
                       location.href = '/log?refer='+location.href;
                   }
                   if(res.code=='00004'){
                       alert(res.msg);
                       return;
                   }
                   if(res.code=='00003'){
                       alert(res.msg);
                       return;
                   }
                },'json')
            })
        </script>

    @endsection