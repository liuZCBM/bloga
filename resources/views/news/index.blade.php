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
<table class="table table-bordered">
	<thead>
		<tr>
            <th>新闻ID</th>
			<th>新闻名字</th>
			<th>新闻分类</th>
			<th>新闻作者</th>
            <th>时间</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
		<tr>
			<td>{{$v->cate_id}}</td>
			<td>{{$v->news_name}}</td>
			<td>{{$v->ca_name}}</td>
            <td>{{$v->news_title}}</td>
            <td>{{$v->news_time}}</td>
			<td>
                <a href="{{url('/news/edit/'.$v->brand_id)}}" type="button" class="btn btn-primary">编辑</a>
                <a href="{{url('/news/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
   <td>{{$res->links()}}</td>
	</tbody>
</table>
    <script>
        $(document).on('click','.pagination a',function(){
             var url = $(this).attr('href');
             $.get(url,function(result){
                 $('tbody').html(result);
             })
             return false;
        })    
    </script>
</body>
</html>