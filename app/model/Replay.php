<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    ////让当前admin模型跟content表产生关联
    public $table = 'replay';

    //定义关联的主键
    public $primaryKey = 'rid';
    //允许批量操作
    public $guarded = [];
    public $timestamps = false;
}
