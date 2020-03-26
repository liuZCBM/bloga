<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $primaryKey = 're_id';
   
    // 关闭时间戳
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];

}
