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
<a href="{{url('/floor/create')}}" style="floot:left" class="btn btn-info">添加</a>
<table class="table table-bordered">
	<thead>
		<tr>
            <th>ID</th>
			<th>小区名称</th>
			<th>导购人</th>
			<th>导购联系方式</th>
			<th>房屋面积</th>
            <th>房屋图片</th>
            <th>房屋相册</th>
            <th>售价</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
        <tr>
            <td>{{$v->floor_id}}</td>
            <td>{{$v->floor_name}}</td>
            <td>{{$v->floor_ren}}</td>
            <td>{{$v->floor_tel}}</td>
            <td>{{$v->floor_mian}}</td>
            <td><img src="{{env('UPLOADS_URL')}}{{$v->floor_logo}}" with="60" height="60"></td>
            <td>
           
           @php $floor_logos = explode('|',$v->floor_logos); @endphp
           @foreach($floor_logos as $vv)
            <img src="{{env('UPLOADS_URL')}}{{$vv}}" with="60" height="60">
            @endforeach
          
           
           </td>
            <td>{{$v->floor_price}}</td>
        </tr>
	@endforeach
	</tbody>
</table>
</body>
</html>