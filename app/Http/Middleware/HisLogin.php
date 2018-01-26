<?php

namespace App\Http\Middleware;

use Closure;

class HisLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //如果用户已经登录
        if(session('user')){
            return $next($request);
        }else{
            return redirect('home/login')->with('errors','请先登录!');
        }
           
    }
}
