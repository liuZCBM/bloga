<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>售楼添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>售楼添加页面</h2></center>
<a href="{{url('/floor/index')}}" style="floot:left" class="btn btn-info">列表</a>
<form action="{{url('/floor/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">小区名字</label>
		<div class="col-sm-8">
			<input type="text" name="floor_name" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">导购人</label>
		<div class="col-sm-8">
			<input type="text" name="floor_ren" class="form-control" id="lastname" 
				   placeholder="请输入">
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">导购联系方式</label>
		<div class="col-sm-8">
			<input type="text" name="floor_tel" class="form-control" id="lastname" 
				   placeholder="请输入">
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">房屋面积</label>
		<div class="col-sm-8">
			<input type="text" name="floor_mian" class="form-control" id="lastname" 
				   placeholder="请输入">
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">房屋图片</label>
		<div class="col-sm-8">
			<input type="file" name="floor_logo" class="form-control" id="lastname">
		</div>
		
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">房屋相册</label>
		<div class="col-sm-8">
			<input type="file" name="floor_logos[]" multiple class="form-control" id="lastname">
		</div>
		
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-8">
			<input type="text" name="floor_price" class="form-control" id="lastname">
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