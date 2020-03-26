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
<table class="table table-bordered">
	<thead>
		<tr>
            <th>学生ID</th>
			<th>学生名字</th>
			<th>性别</th>
			<th>班级</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
		<tr>
			<td>{{$v->brand_id}}</td>
			<td>{{$v->brand_name}}</td>
			<td>{{$v->brand_der}}</td>
            <td>{{$v->c_id}}</td>
			<td>
                <a href="{{url('/htt/edit/'.$v->brand_id)}}" type="button" class="btn btn-primary">编辑</a>
                <a href="{{url('/htt/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
	</tbody>
</table>

</body>
</html>