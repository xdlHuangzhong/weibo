<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
  public $table='config';
  public $primaryKey='id';
  public $guarded=[];
  public $timestamps=false;
}
