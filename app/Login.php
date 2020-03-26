<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    // 指定表名
    protected $table = 'login';
    protected $primaryKey = 'login_id';
    // 关闭时间戳
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
