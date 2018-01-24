<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   public $table = 'message';


   public $timestamps = false;

   protected $fillable = ['id','aid','uid','mess','time','status'];

   public function user_info()
   {
   	return $this->hasOne('App\Http\Model\user_info','uid','uid');
   }


}
