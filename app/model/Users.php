<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //让当前Users模型跟User表产生关联
    public $table = 'user';
    
    //定义关联的主键
    public $primaryKey = 'id';


    public $timestamps = 'false';

    //允许修改字段
    public $guarded = [];

}
