<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fig extends Model
{
    ////让当前admin模型跟admin表产生关联
    public $table = 'fig';

    //定义关联的主键
    public $primaryKey = 'id';
    //允许批量操作
    public $guarded = [];
}
