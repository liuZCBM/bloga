<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>学生修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>学生修改</h2></center>

<form action="{{url('/htt/update/'.$res->brand_id)}}" method="post" class="form-horizontal" role="form">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生名字</label>
		<div class="col-sm-8">
			<input type="text" name="brand_name" value="{{$res->brand_name}}" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">性别</label>
		<div class="col-sm-8">
			<input type="radio" name="brand_der" value="男" >男
            <input type="radio" name="brand_der" value="女" >女
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">班级</label>
		<div class="col-sm-8">
            <select name="c_id" class="form-control" id="lastname">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>