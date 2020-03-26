<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    // 指定表名
    protected $table = 'area';
    protected $primaryKey = 'id';
    // 关闭时间戳
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
