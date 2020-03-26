@extends('layouts.shop') 
@section('title', '首页')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>订单</h1>
      </div>
     </header>
     <div class="susstext">订单提交成功</div>
     <div class="sussimg">&nbsp;</div>
     <div class="dingdanlist">
      <table>
        @foreach($res as $v)
       <tr>
        <td width="50%">
         <h3>订单号：{{$v->order_no}}</h3>
         <time>创建日期：{{date('Y-m-d H:i:s',$v->order_time)}}<br />
</time>
         <strong class="orange">¥{{$v->goods_price*$v->number}}</strong>
        </td>
        <td align="right">
          <span> 
               <a class="orange" order_id="{{$v->order_id}}" href="{{url('/pays/'.$v->order_id)}}">支付</a>
          </span>
        </td>
       </tr>
       @endforeach
      </table>
     </div><!--dingdanlist/-->
     <div class="succTi orange">请您尽快完成付款！</div>
     
    </div><!--content/-->
    
    <div class="height1"></div>
    <div class="gwcpiao">
     <table>
      <tr>
       <td width="50%">
       <a href="{{url('/prlist')}}" class="jiesuan" style="background:#5ea626;">继续购物</a></td>
      
      </tr>
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
  <script>
    $(".orange").click(function(){
        var order_id = $(this).attr('order_id');
        $.get('/paysp',{order_id:order_id},function(res){
         alert(res)
        })
    })
  
  
  </script>


@endsection