<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    //让当前admin模型跟admin表产生关联
    public $table = 'poster';
    
    //定义关联的主键
    public $primaryKey = 'id';


    public $timestamps = false;

    //允许修改字段
    public $guarded = ['art_thumb'];

}