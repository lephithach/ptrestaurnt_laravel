<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CheckLoginClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::get('userClient')) {
            return redirect()->route('client.dangnhap')->with([
                'status' => 'warning',
                'message' => 'Vui lòng đăng nhập để truy cập giỏ hàng'
            ]);
        }
        
        return $next($request);
    }
}
