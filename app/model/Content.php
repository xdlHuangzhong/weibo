<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
      ////让当前admin模型跟content表产生关联
    public $table = 'contents';

    //定义关联的主键
    public $primaryKey = 'cid';
    //允许批量操作
    public $guarded = ['art_thumb'];
    public $timestamps = false;

    public function user_info()
    {
    	return $this->hasOne('App\Model\user_info','uid','uid');	
    }

    public function replay()
    {
        return $this->hasOne('App\Model\Replay','cid','cid');
    }
}
