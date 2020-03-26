<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>修改页面</h2></center>
<form action="{{url('/brand/update/'.$res->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名字</label>
		<div class="col-sm-8">
			<input type="text" name="brand_name" value="{{$res->brand_name}}" class="form-control" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌地址</label>
		<div class="col-sm-8">
			<input type="text" name="brand_url" value="{{$res->brand_url}}" class="form-control" id="lastname" 
				   placeholder="请输入地址">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌</label>
		<div class="col-sm-2">
            <select name="c_id" class="form-control" id="lastname">
				<option value="">请选择</option>
				@foreach($res2 as $v)
                <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                @endforeach
            </select>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-3">
			<input type="file" name="brand_logo" class="form-control" id="lastname">
		</div>
		@if($res->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$res->brand_logo}}" with="50" height="50">@endif
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-8">
			<textarea  type="text" name="brand_desc" class="form-control" id="lastname" 
				   placeholder="请输入内容">{{$res->brand_desc}}</textarea>
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