<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书添加页面</h2></center>
<a href="{{url('/books/index')}}" style="floot:left" class="btn btn-info">列表</a>
<form action="{{url('/books/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">书名</label>
		<div class="col-sm-8">
			<input type="text" name="books_name" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('books_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-8">
			<input type="text" name="books_title" class="form-control" id="lastname" 
				   placeholder="请输入地址">
				  
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-8">
			<input type="text" name="books_price" class="form-control" id="lastname" 
				   placeholder="请输入地址">
				   
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图书封面</label>
		<div class="col-sm-8">
			<input type="file" name="books_logo" class="form-control" id="lastname" 
				   placeholder="请输入地址">
				   
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>