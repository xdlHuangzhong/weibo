<?php

namespace App\Http\Controllers\Admin;
use App\Model\Config;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function putContent()
    {
      $conf=Config::pluck('content','names')->all();
      $v="<?php return ".var_export($conf,true).';';
      file_put_contents(config_path().'/webconfig.php',$v);
    }
    
    public function index(Request $request)
    {
      $data=Config::orderBy('order','asc')->get();
      foreach($data as $k=>$v){
        switch($v->type){
          case 'input':
            $value=$v['content'];
            $res='<input type="text" name="content[]" style="color:white;background:#4b5367;" value='.$value.'>';
            $v['content']=$res;
            break;
          case 'textarea':
            $value=$v['content'];
            $res='<textarea type="text" rows="3" id="doc-ta-2s" name="content[]" style="color:white;background:#4b5367;">'.$value.'</textarea>';
            $v['content']=$res;
            break;
          case 'radio':
            $sta=$v['status'];
              if($sta=='0'){
                $res='<input type="radio" value="0" name="content[]" checked> 关闭 &nbsp<input type="radio" value="1" name="content[]"> 开启';
              }else{
                $res='<input type="radio" value="0" name="content[]"> 关闭 &nbsp<input type="radio" value="1" name="content[]" checked> 开启';
              }
            $v['content']=$res;
            break;
        }
      }
      $this->putContent();
      return view('admin.config.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	  $this->putContent();
      return view('admin.config.interface');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input=$request->except('_token');
      $rule=[
        'title'=>'required',
        'names'=>'required',
        'content'=>'required',
        'explain'=>'required',
      ];
      $mess=[
        'title.required'=>'标题不能为空',
        'names.required'=>'名称不能为空',
        'content.required'=>'内容不能为空',
        'explain.required'=>'说明不能为空',
      ];
      $validator = Validator::make($input, $rule,$mess);
      if ($validator->fails()) {
          return redirect('admin/config/create')
              ->withErrors($validator)
              ->withInput();
      }
      $res=Config::create($input);
      if($res)
      {
        $this->putContent();
        return redirect('admin/config');
      }else{
        return back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
     {
       $data=$request->all();
       if(!empty($data['id'])){
         // \DB::transaction(function()use($data){
         //   foreach ($data['id'] as $k=>$v)
         //   {
         //     $res=Config::find($v);
         //     $res->update(['content'=>$data['content'][$k]]);
         //   }
         // });
         DB::beginTransaction();
         try{
           foreach($data['id'] as $k=>$v)
           {
             $res=Config::find($v);
             $res->update(['content'=>$data['content'][$k]]);
           }
         }catch(Exception $e){
           DB::rollBack();
           return $e->getMessage();
         }
         DB::commit();
       }
       $this->putContent();
       return redirect('admin/config');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $res=Config::find($id)->delete();
      if($res)
      {
        $this->putContent();
        $data=['status'=>0,'message'=>'删除成功'];
      }else{
        $data=['status'=>1,'message'=>'删除失败'];
      }
      return $data;
    }
}
