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
	
	