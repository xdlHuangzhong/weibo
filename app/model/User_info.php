<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    //让当前admin模型跟admin表产生关联
    public $table = 'user_info';
    
    //定义关联的主键
    public $primaryKey = 'id';


    public $timestamps = 'false';

    //允许修改字段
    public $guarded = ['updated_at'];

}
