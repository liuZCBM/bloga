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
<a href="{{url('/admin/create')}}" style="floot:left" class="btn btn-info">添加</a>
<table class="table table-bordered">
	<thead>
		<tr>
            <th>管理员ID</th>
			<th>管理员名字</th>
			<th>邮箱</th>
			<th>电话</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
		<tr>
			<td>{{$v->admin_id}}</td>
            <td>{{$v->admin_name}}</td>
            <td>{{$v->admin_email}}</td>
            <td>{{$v->admin_tel}}</td>
            <td><img src="{{env('UPLOADS_URL')}}{{$v->admin_logo}}" with="60" height="60"></td>
			<td>
                <a href="{{url('/admin/edit/'.$v->admin_id)}}" type="button" class="btn btn-primary">编辑</a>
                <a href="{{url('/admin/destroy/'.$v->admin_id)}}" type="button" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
	
	</tbody>
</table>
</body>
</html>