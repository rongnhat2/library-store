<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Session;
use Hash;
use DB;

class DisplayCustomer
{ 
    public function handle(Request $request, Closure $next, $middleware)
    {
        $token = $request->cookie('_token_');
        list($isLogin, $user_id, $token) = explode('$', $request->cookie('_token_'), 3);
        $sql_getAuth    = 'SELECT * FROM customer_auth WHERE id = "'.$user_id.'"';
        $sql_getGuest   = 'SELECT * FROM customer WHERE id = "'.$user_id.'"';
        $hasAuth    = DB::select($sql_getAuth);
        $hasGuest   = DB::select($sql_getGuest);

        // tạo nhiều tài khoản trên 1 thiết bị sẽ dính bug không tồn tại
        if (count($hasGuest) != 0) {
            // Chưa đăng nhập
            if ($middleware == 'auth') {
                if (count($hasAuth) != 0) {
                    if (Hash::check($user_id . '$' . $hasAuth[0]->secret_key, $token)) {
                        return redirect()->route('customer.view.index');  
                    }else{
                        return $next($request);
                    }
                }else{
                    return $next($request);
                }
            }else{ // Vào trang bắt buộc đăng nhập
                // Kiểm tra đăng kí
                if (count($hasAuth) != 0) {
                    // Kiểm tra phiên đăng nhập hiện tại
                    if (Hash::check($user_id . '$' . $hasAuth[0]->secret_key, $token)) {
                        return $next($request);
                    }else{
                        return redirect()->route('customer.view.login')->with('error', 'Đăng nhập hết hạn !!');  
                    }
                }else{
                    return redirect()->route('customer.view.login')->with('error', 'Bạn cần đăng kí để vào trang này !!');  
                }
            }
        }else{
            if ($middleware == 'auth') {
                if (count($hasAuth) != 0) {
                    if (Hash::check($user_id . '$' . $hasAuth[0]->secret_key, $token)) {
                        return redirect()->route('customer.view.profile');  
                    }else{
                        return $next($request);
                    }
                }else{
                    return $next($request);
                }
            }else{ // Vào trang bắt buộc đăng nhập
                // Kiểm tra đăng kí
                if (count($hasAuth) != 0) {
                    // Kiểm tra phiên đăng nhập hiện tại
                    if (Hash::check($user_id . '$' . $hasAuth[0]->secret_key, $token)) {
                        return $next($request);
                    }else{
                        return redirect()->route('customer.view.login')->with('error', 'Đăng nhập hết hạn !!');  
                    }
                }else{
                    return redirect()->route('customer.view.login')->with('error', 'Bạn cần đăng kí để vào trang này !!');  
                }
            }

            // if (count($hasAuth) != 0) {
            //     if (Hash::check($user_id . '$' . $hasAuth[0]->secret_key, $token)) {
            //         return $next($request);
            //     }else{
            //         Cookie::queue(Cookie::forget('_token_'));
            //         return redirect()->back();
            //     }
            // }else{
            //     Cookie::queue(Cookie::forget('_token_'));
            //     return redirect()->back();
            // }
        }
    }
}
