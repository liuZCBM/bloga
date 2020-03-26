<h1>控制器</h1>
<form action="{{url('/adddo')}}" method="post">
{{csrf_field()}}
<input type="text" name="names">
<button>提交</button>
</form>