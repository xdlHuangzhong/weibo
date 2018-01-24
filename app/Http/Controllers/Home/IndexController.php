<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function index(){
    	$data = \DB::table('friends')->get();
    	$date = \DB::table('notice')->get();
    	$bata = \DB::table('fig')->get();
    	return view('home.index',['data' => $data,'date' => $date,'bata' => $bata]);
    	
    }         
}
