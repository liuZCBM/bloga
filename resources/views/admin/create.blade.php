<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>管理员添加页面</h2></center>
<a href="{{url('/admin/index')}}" style="floot:left" class="btn btn-info">列表</a>
<!-- @if ($errors->any()) 
<div class="alert alert-danger"> 
<ul>@foreach ($errors->all() as $error) 
<li>{{$error}}</li> 
@endforeach
</ul> 
</div> 
@endif -->
<form action="{{url('/admin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名字</label>
		<div class="col-sm-8">
			<input type="text" name="admin_name" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('admin_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">邮箱</label>
		<div class="col-sm-8">
			<input type="text" name="admin_email" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('admin_email')}}</b>
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">电话</label>
		<div class="col-sm-8">
			<input type="text" name="admin_tel" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('admin_tel')}}</b>
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-8">
			<input type="password" name="admin_pwd" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('admin_pwd')}}</b>
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-8">
			<input type="file" name="admin_logo" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('admin_logo')}}</b>
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