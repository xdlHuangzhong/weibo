<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //让当前friends模型跟friends表产生关联
    public $table = 'friends';

    //定义关联的主键
    public $primaryKey = 'id';
    //取消自动维护
    public $timestamps = false;
    //不允许修改的字段
    public $guarded = [];

}
