<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertController extends Controller
{
    //index 显示页面
    public function index()
    {
        return view('Admin/advert/index');
    }
}
