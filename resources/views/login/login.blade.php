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
<center><h2>后台登录</h2></center>
@if(session('msg'))
<div class="alert alert-danger">{{session('msg')}}</di v>
@endif
<form action="{{url('/login/logindo')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户名</label>
		<div class="col-sm-8">
			<input type="text" name="admin_name" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('admin_name')}}</b>
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
	<label for="firstname" class="col-sm-2 control-label"></label>
		<div class="col-sm-8">
			<input type="checkbox" name="rember"  >七天免登录
				
		</div>
    </div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>

</body>
</html>