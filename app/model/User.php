<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //让当前admin模型跟admin表产生关联
    public $table = 'user';

    //定义关联的主键
    public $primaryKey = 'id';

//     public $guarded = ['_token'];

    public $guarded = [];

//    public $timestamps = 'false';
}
