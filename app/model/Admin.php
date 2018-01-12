<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //让当前admin模型跟admin表产生关联
    public $table = 'admin';

    //定义关联的主键
    public $primaryKey = 'id';
}
