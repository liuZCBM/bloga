<?php
 /**
  * 
  *
  * 公共函数文件
  * 
  */
  //相册
 function Moreupload($img){
    $file = request()->file($img);
    foreach($file as $k=>$v){
        if($v->isValid()){
            $info[$k] = $v->store('upload');
        }else{
            $info[$k] = '未获取到上传文件或上传过程错误';
        }
    }
    return $info;
}
// 文件上传
 function upload($img){
    if(request()->file($img)->isValid()){
        $file = request()->file($img);
        $info = $file->store($img);
        return $info;
    }
    exit("未获取到上传文件或上传过程错误");
}

 
// 无限极分类   根据父亲找儿子
    function getdatainfo($data,$pid=0,$level=1){
        if(!$data){
            return;
        }
        static $newarray=[];
        foreach($data as $v){
            if($v->pid==$pid){
                $v->level = $level;
                $newarray[] = $v;
                // 再次调用自身符合条件的孩子
                getdatainfo($data,$v->cate_id,$level+1);
            }
        }
        return $newarray;
    }

    function getcainfo($data,$pid=0,$level=1){
        if(!$data){
            return;
        }
        static $newarray=[];
        foreach($data as $v){
            if($v->pid==$pid){
                $v->level = $level;
                $newarray[] = $v;
                getcainfo($data,$v->cate_id,$level+1);
            }
        }
        return $newarray;
    }

    function successly($font){
		$arr = ['font'=>$font,'code'=>1];
		echo json_encode($arr);die; //把数组 转化为json字符串--压缩
	}

	function fail($font){
		$arr = ['font'=>$font,'code'=>2];
		echo json_encode($arr);die; //把数组 转化为json字符串--压缩
	}







