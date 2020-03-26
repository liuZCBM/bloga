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
<a href="{{url('/brand/create')}}" style="floot:left" class="btn btn-info">添加</a>
 <form action="">    <!--  value="{{$input['brand_name']??''}}"
 value="{{$input['brand_url']??''}}"
  -->
	<input type="text" name="re_name" value="{{$input['re_name']??''}}" >

	<button>搜索</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
            <th>ID</th>
			<th>新闻名字</th>
			<th>新闻作者</th>
			<th>新闻简介</th>
			<th>时间</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
		<tr>
			<td>{{$v->re_id}}</td>
			<td>{{$v->re_name}}</td>
			<td>{{$v->re_title}}</td>
            <td>{{$v->re_desc}}</td>
			<td>{{$v->re_time}}</td>
			<td>
                <a href="" type="button" class="btn btn-primary">编辑</a>
                <a href="" type="button" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
		<tr>
        <td>{{$res->appends($input)->links()}}</td>
    </tr>
	</tbody>

</table>
   
	<script>
	$(document).on("click",".pagination a",function(){
		var url = $(this).attr('href');
		$.get(url,function(res){
			$('tbody').html(res);
		})
		return false;
	})

</script>
</body>
</html>
