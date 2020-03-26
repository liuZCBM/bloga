<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    // 指定表名
    protected $table = 'books';
    protected $primaryKey = 'books_id';
    // 关闭时间戳
    public $timestamps = false;
    // 黑名单
    protected $guarded = [];
}
