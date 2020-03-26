@foreach($res as $v)
		<tr>
			<td>{{$v->news_id}}</td>
			<td>{{$v->news_name}}</td>
			<td>{{$v->ca_id}}</td>
            <td>{{$v->news_title}}</td>
            <td>{{$v->news_time}}</td>
			<td>
                <a href="{{url('/news/edit/'.$v->brand_id)}}" type="button" class="btn btn-primary">编辑</a>
                <a href="{{url('/news/destroy/'.$v->brand_id)}}" type="button" class="btn btn-danger">删除</a>
            </td>
		</tr>
	@endforeach
   <td>{{$res->links()}}</td>