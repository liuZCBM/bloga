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
<center><h2>商品修改页面</h2></center>
<a href="{{url('/goods/index')}}" style="floot:left" class="btn btn-info">列表</a>
<form action="{{url('/goods/update/'.$res3->goods_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名字</label>
		<div class="col-sm-8">
            <input type="text"   name="goods_name" value="{{$res3->goods_name}}" placeholder="商品名称"  />
            <b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-8">
        <input type="text" name="goods_price" value="{{$res3->goods_price}}" id="form-field-2" placeholder="价格"/>
        <b style="color:red">{{$errors->first('goods_price')}}</b>    
    </div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品介绍</label>
		<div class="col-sm-8">
        <textarea name="goods_desc" placeholder="商品介绍"  cols="30" rows="10">{{$res3->goods_desc}}</textarea>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-8">
        <input type="text" value="{{$res3->goods_num}}" id="form-field-2" name="goods_num">
        <b style="color:red">{{$errors->first('goods_num')}}</b>  
		</div>
	</div>
    <div class="form-group">
		<label for="lastname"  class="col-sm-2 control-label">商品积分</label>
		<div class="col-sm-8">
        <input type="text"  id="form-field-2" value="{{$res3->goods_score}}" name="goods_score">
		</div>
		
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品图片</label>
		<div class="col-sm-8">
        <input type="file" id="form-field-2" name="goods_img">
        <img src="{{env('UPLOADS_URL')}}{{$res3->goods_img}}" with="60" height="60">
		</div>
		
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-8">
        <input type="file" multiple id="form-field-2" name="goods_imgs[]">
        @php $goods_imgs = explode("|",$res3->goods_imgs); @endphp   
            @foreach($goods_imgs as $vv)
            <img src="{{env('UPLOADS_URL')}}{{$vv}}" with="60" height="60">
            @endforeach
		</div>
		
    </div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-8">
        <input type="radio" name="is_new" value="1">是
		<input type="radio" name="is_new" value="2">否
		</div>
		
    </div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否热销</label>
		<div class="col-sm-8">
        <input type="radio" name="is_hot" value="1">是
		<input type="radio" name="is_hot" value="2">否
		</div>
		
    </div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-8">
        <input type="radio" name="is_best" value="1">是
		<input type="radio" name="is_best" value="2">否
		</div>
		
    </div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否上架</label>
		<div class="col-sm-8">
        <input type="radio"  name="is_up" {{$res3->is_up==1?'checked':''}} value="1">是
		<input type="radio" name="is_up"{{$res3->is_up==2?'checked':''}} value="2">否
		</div>
		
    </div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">品牌</label>
		<div class="col-sm-8">
            <select name="brand_id">
                <option value="">--请选择--</option>	
            @foreach($res as $v)										
                <option {{$res3->brand_id==$v->brand_id?'selected':''}} value="{{$v->brand_id}}">{{$v->brand_name}}</option>
            @endforeach
            </select>	
            <b style="color:red">{{$errors->first('brand_id')}}</b>  
		</div>
		
    </div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">分类</label>
		<div class="col-sm-8">
        <select name="cate_id">
            <option value="">--请选择--</option>
			@foreach($cate as $v)
            <option {{$res3->cate_id==$v->cate_id?'selected':''}} value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
            @endforeach						
        </select>
        <b style="color:red">{{$errors->first('cate_id')}}</b>  
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