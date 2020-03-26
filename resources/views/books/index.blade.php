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
<a href="{{url('/books/create')}}" style="floot:left" class="btn btn-info">添加</a>
<form action="">
    <input type="text" name="books_name" value="{{$quest['books_name']??''}}">
    <button>搜索</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
            <th>图书ID</th>
			<th>书名</th>
			<th>作者</th>
			<th>价格</th>
			<th>图书LOGO</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $k=>$v)
        <tr>
            <td>{{$v->books_id}}</td>
            <td>{{$v->books_name}}</td>
            <td>{{$v->books_title}}</td>
            <td>{{$v->books_price}}</td>
            <td><img src="{{env('UPLOADS_URL')}}{{$v->books_logo}}" with="60" height="60"></td>
            <td></td>
        </tr>
    @endforeach
	</tbody>
    <tr><td colspan="6">{{$res->appends($quest)->links()}}</td></tr>
</table>


</body>
</html>