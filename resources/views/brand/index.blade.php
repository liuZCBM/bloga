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
<a href="{{url('/brand/create')}}" style="floot:left" class="btn btn-info">添加</a>
<form action="">
	<input type="text" name="brand_name" value="{{$input['brand_name']??''}}">
	<input type="text" name="brand_url" value="{{$input['brand_url']??''}}">
	<button>搜索</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
            <th>品牌ID</th>
			<th>品牌名字</th>
			<th>品牌地址</th>
			<th>品牌</th>
			<th>品牌LOGO</th>
            <th>品牌介绍</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_url}}</td>
			<td>{{$v->c_id}}</td>
            <td>
			@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" with="50" height="50">@endif</td>
			<td>{{$v->brand_desc}}</td>
			<td>
                <a href="{{url('/brand/edit/'.$v->brand_id)}}" type="button" class="btn btn-primary">编辑</a>
                <a href="{{url('/brand/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
	
	</tbody>
</table>
<tr><tdcolspan="6">{{$res->appends($input)->links()}}</td></tr>
</body>
</html>