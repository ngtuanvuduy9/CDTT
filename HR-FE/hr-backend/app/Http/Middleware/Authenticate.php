<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // kiểm tra người dùng đã đăng nhập hay chưa
        if(!Auth::check()){
            // nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('message', 'Middleware: Bạn cần đăng nhập để truy cập trang này.');
        }
        return $next($request);
    }
}
