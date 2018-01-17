<?php

namespace App\Http\Controllers\Admin;
use App\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
  public function edit()
  {
    return view('admin\config.edit');
    // echo "string";
  }
}
