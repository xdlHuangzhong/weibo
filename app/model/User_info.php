<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    //让当前admin模型跟admin表产生关联
    public $table = 'user_info';
    
    //定义关联的主键
    public $primaryKey = 'id';


    public $timestamps = false;

    //允许修改字段
    public $guarded = ['updated_at','created_at','art_thumb'];

    //用户信息
    public function user()
    {
        return $this->belongsTo('App\Http\user','id');
    }

	//用户发帖的信息
    public function contents()
    {
    	return $this->hasOne('App\Model\contents','uid','uid');
    }


}
