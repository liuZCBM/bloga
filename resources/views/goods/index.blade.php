<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 边框表格</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>列表页面</h2></center>
<a href="{{url('/goods/create')}}" style="floot:left" class="btn btn-info">添加</a>
<form action="">
    <input type="text" name="goods_name">
    <button>搜索</button>
</form>
<a href="{{url('/login/test')}}">退出登录</a>
<table class="table table-bordered">
	<thead>
                                                             <tr>
                                                                <th>id</th>
                                                                <th>商品名字</th>
                                                                <th>商品价格</th>
                                                                <th>商品介绍</th>
                                                                <th>商品库存</th>
                                                                <th>商品积分</th>
                                                                <th>商品图片</th>
                                                                <th>商品相册</th>
                                                                <th>是否新品</th>
                                                                <th>是否热销</th>
                                                                <th>是否精品</th>
                                                                <th>是否上架</th>
                                                                <th>品牌</th>
                                                                <th>分类</th>
                                                                <th>操作</th>
                                                            </tr>
	</thead>
	<tbody>
    @foreach($res as $v)
        <tr>
            <td>{{$v->goods_id}}</td>
            <td>{{$v->goods_name}}</td>
            <td>{{$v->goods_price}}</td>
            <td>{{$v->goods_desc}}</td>
            <td>{{$v->goods_num}}</td>
            <td>{{$v->goods_score}}</td>
            <td><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" with="60" height="60"></td>
            <td>
            @php $goods_imgs = explode("|",$v->goods_imgs); @endphp   
            @foreach($goods_imgs as $vv)
            <img src="{{env('UPLOADS_URL')}}{{$vv}}" with="60" height="60">
            @endforeach
            </td>
            <td>{{$v->is_new}}</td>
            <td>{{$v->is_hot}}</td>
            <td>{{$v->is_best}}</td>
            <td>{{$v->is_up}}</td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->cate_name}}</td>
            <td>
            <a href="{{url('goods/edit/'.$v->goods_id)}}" type="button" class="btn btn-primary">编辑</a>
                <a href="{{url('goods/destroy/'.$v->goods_id)}}" type="button" class="btn btn-danger">删除</a>
            </td>
        </tr>
	@endforeach
	</tbody>
</table>
</body>
</html>