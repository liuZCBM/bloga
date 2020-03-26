<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
   
    // 关闭时间戳
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];

    //获取幻灯片数据
    public static function getSlideData(){
        $res = Goods::select('goods_id','goods_img')->where('is_slide',1)->take(5)->get();
        return $res;
    }
}
