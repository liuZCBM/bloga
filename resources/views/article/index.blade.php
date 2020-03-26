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
<form action="">
    标题：<input type="text" name="article_name">
    分类：<select name="c_name">
				<option value="0">请选择</option>
			@foreach($res2 as $v)
                <option value="{{$v->c_name}}">{{$v->c_name}}</option>
            @endforeach
            </select>
    <button>搜索</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr>
            <th>品牌ID</th>
			<th>文章标题</th>
			<th>文章分类</th>
			<th>文章重要性</th>
			<th>是否显示</th>
            <th>文章作者</th>
            <th>关键章</th>
            <th>品牌介绍</th>
            <th>品牌LOGO</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
    @foreach($res as $v)
		<tr>
			<td>{{$v->article_id}}</td>
			<td>{{$v->article_name}}</td>
			<td>{{$v->c_name}}</td>
			<td>{{$v->article_pu}}</td>
            <td>{{$v->article_xs}}</td>
			<td>{{$v->article_title}}</td>
            <td>{{$v->article_word}}</td>
			<td>{{$v->article_desc}}</td>
            <td><img src="{{env('UPLOADS_URL')}}{{$v->article_logo}}" with="60" height="60"></td>
			<td>
                <a href="{{url('/article/edit/'.$v->article_id)}}" type="button" class="btn btn-primary">编辑</a>
                <a href="javascript:void(0)" id="{{$v->article_id}}" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
	
	</tbody>

</table>
<tr><td colspan="6">{{$res->links()}}</td></tr>
</body>
</html>
<script>
    $(document).on('click','.btn-danger',function(){
        var id = $(this).attr('id');
        if(confirm('是否确认删除')){
            $.get('/article/destroy/'+id,function(result){
               if(result.code=='00000'){
                   location.reload();
               }
            },'json');
        }
    
    })
    
   
</script>