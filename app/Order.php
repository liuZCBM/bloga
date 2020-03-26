<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   // 指定表名
   protected $table = 'order';
   protected $primaryKey = 'order_id';
   // 关闭时间戳
   public $timestamps = false;
   // 黑名单
   protected $guarded = [];
}
