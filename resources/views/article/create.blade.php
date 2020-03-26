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
<center><h2>添加页面</h2></center>
<form action="{{url('/article/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" name="article_name" class="bth form-control" 
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
                <option value="{{$v->c_id}}">{{$v->c_name}}</option>
            @endforeach
			</select>
			<b style="color:red">{{$errors->first('c_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-8">
			<input type="radio" name="article_xs" value="普通">普通
			<input type="radio" name="article_pu" value="置顶">置顶
			<b style="color:red">{{$errors->first('article_xs')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="article_xs" value="显示">显示
			<input type="radio" name="article_xs" value="不显示">不显示
			<b style="color:red">{{$errors->first('article_xs')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-8">
			<input type="text" name="article_title" class="form-control" id="firstname" 
				   placeholder="请输入名章">
				<b style="color:red">{{$errors->first('article_title')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键章</label>
		<div class="col-sm-8">
			<input type="text" name="article_word" class="form-control" id="firstname" 
				   placeholder="请输入名章">
				<b style="color:red">{{$errors->first('article_word')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
		<div class="col-sm-8">
			<textarea  type="text" name="article_desc" class="form-control" id="lastname" 
				   placeholder="请输入内容"></textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
		<div class="col-sm-8">
			<input type="file" name="article_logo" class="form-control" id="lastname">
		</div>
		
	</div>
    
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>
<script>
	 $("input[name='article_name']").blur(function(){
		 $(this).next().empty();
		 var article_name = $(this).val();
		
		 var reg = /^[\u4e00-\u9fa5\w]{2,50}$/;
		 if(!reg.test(article_name)){
			 $(this).next().text('文章名称由中文，字母，数组，下划线，-或.组成长度为2-50');
			return;
		 }
		 // 唯一性验证
		 var obj = $(this)
		$.ajax({
			url:"/article/checkonly",
			data:{article_name:article_name},
			// async:true,
			dataType:'json',
			success:function(result){
				if(result.count>0){
					// alert(23)
					obj.next().text('名字2已有');
				}
			}
		})
	 })
	 
	
	  $("button").click(function(){
	
		 var article_name = $("input[name='article_name']").val();
		 var reg = /^[\u4e00-\u9fa5\w]{2,50}$/;
		 if(!reg.test(article_name)){
			$("input[name='article_name']").next().text('文章名称由中文，字母，数组，下划线，-或.组成长度为2-50');
			 return;
		 }
		
		$.ajax({
			url:"/article/checkonly",
			data:{article_name:article_name},
			async:false,
			dataType:'json',
			success:function(result){
				if(result.count>0){		
					alert(3444)	
					$("input[name='article_name']").next().text('名字2已有');
					nameflag = false;
				}
			}});
		
		alert(nameflag)
		if(!nameflag){
			return;
		}
		alert(123)
		// $('form').submit();
	 })
</script>