<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>修改页面</h2></center>
<form action="{{url('/article/update/'.$res2->article_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" name="article_name" value="{{$res2->article_name}}" class="form-control" id="firstname" 
				   placeholder="请输入名章">
				<b style="color:red">{{$errors->first('article_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-2">
            <select name="c_id" class="form-control" id="lastname">
				<option value="">请选择</option>
			@foreach($res as $v)
                <option {{$res2->c_id==$v->c_id?'selected':''}} value="{{$v->c_id}}">{{$v->c_name}}</option>
            @endforeach
            </select>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-8">
			<input type="radio"  name="article_pu" value="普通" {{$res2->article_pu=='普通'?'checked':''}} >普通
            <input type="radio" name="article_pu" value="置顶" {{$res2->article_pu=='置顶'?'checked':''}}>置顶
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="article_xs" value="显示" {{$res2->article_xs=='显示'?'checked':''}}>显示
            <input type="radio" name="article_xs" value="不显示" {{$res2->article_xs=='不显示'?'checked':''}}>不显示
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-8">
			<input type="text" name="article_title" value="{{$res2->article_title}}" class="form-control" id="firstname" 
				   placeholder="请输入名章">
				<b style="color:red">{{$errors->first('article_title')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-8">
			<input type="text" name="article_word" value="{{$res2->article_word}}" class="form-control" id="firstname" 
				   placeholder="请输入名章">
				<b style="color:red">{{$errors->first('article_word')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-8">
			<textarea  type="text" name="article_desc" class="form-control" id="lastname" 
				   placeholder="请输入内容">{{$res2->article_desc}}</textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-8">
			<input type="file" name="article_logo" class="form-control" id="lastname">
            <img src="{{env('UPLOADS_URL')}}{{$res2->article_logo}}" with="60" height="60">
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