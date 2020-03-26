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
<a href="{{url('/news/index')}}" style="floot:left" class="btn btn-info">列表</a>
<form action="{{url('/news/store')}}" method="post" class="form-horizontal" role="form">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻名字</label>
		<div class="col-sm-8">
			<input type="text" name="news_name" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<!-- <b style="color:red">{{$errors->first('news_name')}}</b> -->
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻分类</label>
		<div class="col-sm-8">
                   <select name="pid" class="form-control" >
                   @foreach($cate as $v)				  
                       <option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->news_name}}</option>
                    @endforeach
                   </select>
				<b style="color:red">{{$errors->first('ca_id')}}</b>
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻作者</label>
		<div class="col-sm-8">
			<input type="text" name="news_title" class="form-control" id="firstname" 
				   placeholder="请输入名字">
				<b style="color:red">{{$errors->first('news_title')}}</b>
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