<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //让当前admin模型跟admin表产生关联
    public $table = 'cate';

    //定义关联的主键
    public $primaryKey = 'id';

//     public $guarded = ['_token'];

    public $guarded = ['updated_at', 'created_at'];

    public $timestamps = false;
    //处理分类排序

    //格式化数据(排序,缩进)
    public function getCate()
    {
        $cates = $this->orderBy('order','asc')->paginate(2);

        return $this->Cate($cates);
    }


    public function Cate($category)
    {

        $arr = [];

        foreach($category as $k=>$v){
            //排序
            if($v->pid == 0){
                $v['setname'] = $v['name'];
                $arr[] = $v;
                //获取二级类
                foreach($category as $m=>$n)
                {
                    if($n->pid == $v->id)
                    {
                        $n['setname'] = '|--'.$n['name'];
                        $arr[] = $n;
                    }
                }

            }
        }


        return $arr;
    }

}