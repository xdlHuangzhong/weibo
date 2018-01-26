<?php

namespace App\Http\Controllers;

use App\Http\Model\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=array();
        $data=$this->getCommlist();//获取评论列表
        return view('home.comment',compact('data'));
//        return $data[0]->children;
        //dd($data[0]->children);
    }
    /**
     *递归获取评论列表
     */
    protected function getCommlist($parent_id = 0,&$result = array()){
        $arr = Comment::where('parent_id',$parent_id)->orderBy('create_time','desc')->get();
        if(empty($arr)){
            return array();
        }
        foreach ($arr as $cm) {
            $thisArr=&$result[];
            $cm["children"] = $this->getCommlist($cm["id"],$thisArr);
            $thisArr = $cm;
        }
        return $result;
    }

    /**
     *添加评论
     */
    public function addComment(){
        $data=array();
        if((isset($_POST["comment"]))&&(!empty($_POST["comment"]))){
            $cm = json_decode($_POST["comment"],true);//通过第二个参数true，将json字符串转化为键值对数组
            $cm['create_time']=date('Y-m-d H:i:s',time());
            $cm = Comment::create($cm);
            $data = $cm;
        }else{
            $data["error"] = "0";
        }
        echo json_encode($data);
    }


}
