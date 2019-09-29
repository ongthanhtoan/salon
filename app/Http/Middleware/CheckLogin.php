<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckLogin
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
        if(Session::has('admin') || Session::has('user')){
            return $next($request);
        }else{
            return redirect()->route('dang-nhap.getDangNhap');
        }
    }
}
