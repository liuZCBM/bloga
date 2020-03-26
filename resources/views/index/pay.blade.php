@extends('layouts.shop') 
@section('title', '首页')
@section('content')

     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>订单信息</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <div class="dingdanlist" >  <!-- onClick="window.location.href='{{url('/address')}}'" -->
      <table>
       <tr>
        <td class="dingimg" width="75%" colspan="2" onClick="window.location.href='{{url('/address')}}'">新增收货地址</td>
        <td align="right"><img src="/static/index/images/jian-new.png" /></td>
       </tr>
       <tr>
          <td class="dingimg" width="75%" colspan="2">
            <select name="" class="but">
              <option value="">请选择收货地址</option>
              @foreach($data as $v)
              <option value="{{$v->id}}">{{$v->names}}{{$v->province}}{{$v->city}}{{$v->desc}}{{$v->tel}}{{$v->time}}</option>
              @endforeach
            </select>
          </td>
      </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">支付方式</td>
        <td align="right"><span class="hui">网上支付</span></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr><td colspan="3" style="height:10px; background:#fff;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="3">商品清单</td>
       </tr>
       @foreach($res as $v)
       <tr>
        <td class="dingimg" width="15%"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>{{date('Y-m-d H:i:s',$v->cart_time)}}</time>
        </td>
        <td align="right"><span class="qingdan">X {{$v->number}}</span></td>
       </tr>
       </div><!--dingdanlist/-->
       <tr>
        <th colspan="3"><strong class="orange">1件/¥{{$v->goods_price}}</strong></th>
       </tr>
       
       <tr>
        <td class="dingimg" width="75%" colspan="2">商品金额</td>
        <td align="right"><strong class="orange">¥{{$v->goods_price*$v->number}}</strong></td>
       </tr>
      
       <tr>
        <td class="dingimg" width="75%" colspan="2">折扣优惠已暂停</td>
        <td align="right"><strong class="green">¥？？？</strong></td>
       </tr>
      
       <tr>
        <td class="dingimg" width="75%" colspan="2">免运费运输</td>
        <td align="right"><strong class="orange">¥0.00</strong></td>
       </tr>
      </table>
    
     
     
    </div><!--content/-->
    
    <div class="height1"></div>
    <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥{{$v->goods_price*$v->number}}</strong></td>
       <td width="40%"><a href="javascript:;" cart_id="{{$v->cart_id}}" class="jiesuan">提交订单</a></td>
      </tr>
      @endforeach
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/style.js"></script>
    <!--jq加减-->
    <script src="js/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>
<script src="/static/index/js/jquery.excoloSlider.js"></script>

<script>
  $('.jiesuan').click(function(){
      var cart_id = $(this).attr('cart_id');
      $.get('/cartsu',{cart_id:cart_id},function(res){
        if(res.code=='00004'){
               alert(res.msg);
              return;
           }
       location.href="/success?cart_id="+cart_id;
      })
  })
  $('.but').change(function(){
    var id = $(this).prop('value');
    $.get('/cartsu',{id:id},function(res){
      alert(res);
    })
  })
</script>


@endsection