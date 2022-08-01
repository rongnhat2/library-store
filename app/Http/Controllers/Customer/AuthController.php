<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie; 
use Mail; 

use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;
use App\Models\CustomerDetail;
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class AuthController extends Controller
{
    protected $customer;
    protected $customer_detail;

    public function __construct(CustomerAuth $customer, CustomerDetail $customer_detail){
        $this->customer         = new CustomerRepository($customer);
        $this->customer_detail  = new CustomerRepository($customer_detail);
    }

    // Đăng ký
    public function register(Request $request){   
        if ($this->customer->check_email($request->data_email)) {
            return $this->customer->send_response("Email đã tồn tại!!", null, 500);
        }else{
            $secret_key = mt_rand(1, 9999999);
            $data_auth = [
                "secret_key"    => $secret_key,
                "email"         => preg_replace('/(<([^>]+)>)/', '', $request->data_email),
                "password"      => Hash::make($request->data_password),
                "status"        => 1,
            ];
            $auth_register = $this->customer->create($data_auth);
            $data_detail = [
                "customer_id"   => preg_replace('/(<([^>]+)>)/', '', $auth_register->id),
                "name"          => preg_replace('/(<([^>]+)>)/', '', $request->data_name),
                "phone"         => preg_replace('/(<([^>]+)>)/', '', $request->data_phone),
                "address"       => preg_replace('/(<([^>]+)>)/', '', $request->data_address), 
            ];
            $this->customer_detail->create($data_detail);  
            Cookie::queue(Cookie::forget('_token_')); 
            $tokenAuth = $auth_register->id . '$' . Hash::make($auth_register->id . '$' . $secret_key);
            Cookie::queue('_token_', $tokenAuth, 2628000);  
            return $this->customer->send_response("Register Successful", "/", 201);
        }
    } 

    // Đăng nhập
    public function login(Request $request){
        $customer_id = $this->customer->checkEmailPassword($request);
        $route_redirect = Session::get("url_save")  == null ? "/" : Session::get("url_save");
        if ($customer_id) { 
            Cookie::queue('_token_', $this->customer->createTokenClient($customer_id), 2628000);
            return $this->customer->send_response("Login Successful", $route_redirect, 200); 
        }else{
            return $this->customer->send_response("ログインできませんでした。 入力内容に誤りがないかご確認ください。", $route_redirect, 500); 
        }
    }

    // Quên mật khẩu
    public function forgot(Request $request){
        if ($this->customer->check_email($request->data_email)) {
            $customer = $this->customer->find_with_email($request->data_email);
            $now = Carbon::now(); 
            $dt2 = Carbon::create($customer->updated_at);
            $time_delta = $now->diffInMinutes($dt2);
            if ($time_delta >= 5) {
                $code = mt_rand(1, 9999999);
                $this->customer->update(["verify_code" => $code], $customer->id);
                $email = $request->data_email; 
                Mail::send('email-forgot', array('code'=> $code), function($message) use ($email) {
                    $message->from('techchat2110@gmail.com', 'Computer Store khôi phục mật khẩu');
                    $message->to($email)->subject('Computer Store');
                });
                return $this->customer->send_response("Kiểm tra email để nhận mã khôi phục", null, 200);
            }else{
                return $this->customer->send_response("Hành động quá nhanh. Bạn cần đợi thêm ".(5-(int) $time_delta)." phút để nhận mã khôi phục", null, 500);
            }
        }else{
            return $this->customer->send_response("Email không tồn tại", null, 500);
        }
    }

    // Khôi phục mật khẩu
    public function reset(Request $request){
        $customer = $this->customer->find_with_email($request->data_email);
        $now = Carbon::now(); 
        $dt2 = Carbon::create($customer->updated_at);
        $time_delta = $now->diffInMinutes($dt2);
        $route_redirect = Session::get("url_save")  == null ? "/" : Session::get("url_save");
        if ($time_delta < 30) {
            if ($request->data_code == $customer->verify_code) {
                $secret_key = mt_rand(1, 9999999);
                $data_auth = [
                    "secret_key"    => $secret_key,
                    "password"      => Hash::make($request->data_password),
                    "verify_code"    => null,
                ];
                $this->customer->update($data_auth, $customer->id);
                $tokenAuth = $customer->id . '$' . Hash::make($customer->id . '$' . $secret_key);
                Cookie::queue('_token_', $tokenAuth, 2628000);
                return $this->customer->send_response("Khôi phục thành công!! <br> Tự động đăng nhập sau 2 giây", $route_redirect, 200);
            }else{
                return $this->customer->send_response("Mã bảo mật không chính xác", null, 500);
            }
        }else{
            return $this->customer->send_response("Mã khôi phục hết hạn", null, 500);
        }
    }

    // Tạo code đổi mật khẩu
    public function code(Request $request){
        $is_user = static::check_token($request); 
        $route_redirect = "/";
        if ($is_user) {
            list($user_id, $token) = static::unpack_token($request); 
            $customer = $this->customer->find_with_id($user_id);
            $route_redirect = Session::get("url_save")  == null ? "/" : Session::get("url_save");
            $now = Carbon::now(); 
            $dt2 = Carbon::create($customer->updated_at); 
            $time_delta = $now->diffInMinutes($dt2);
            if ($time_delta >= 30 || $customer->verify_code == null) {
                $code = mt_rand(1, 9999999);
                $this->customer->update(["verify_code" => $code], $user_id);
                $email = $customer->email; 
                Mail::send('email-forgot', array('code'=> $code), function($message) use ($email) {
                    $message->from('techchat2110@gmail.com', 'Computer Store đổi mật khẩu');
                    $message->to($email)->subject('Computer Store');
                });
                return $this->customer->send_response("Đã gửi mã xác thực về email", null, 200);
            }else{
                return $this->customer->send_response("Có lỗi không xác định", null, 500);
            }
        }else{
            return $this->customer->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        }
    }

    // Đổi mật khẩu
    public function change(Request $request){
        $is_user = static::check_token($request); 
        if ($is_user) {
            list($user_id, $token) = static::unpack_token($request); 
            $customer = $this->customer->find_with_id($user_id);
            $check_password = Hash::check($request->data_oldpass, $customer->password);
            if ($check_password) {
                if ($request->data_code == $customer->verify_code) {
                    $code = mt_rand(1, 9999999);
                    $data_change = [
                        "secret_key"    => $code, 
                        "password"      => Hash::make($request->data_newpass),
                        "verify_code"   => null,
                    ];
                    $this->customer->update($data_change, $user_id);
                    $tokenAuth = $user_id . '$' . Hash::make($user_id . '$' . $code);
                    Cookie::queue('_token_', $tokenAuth, 2628000);
                    return $this->customer->send_response("Đổi mật khẩu thành công", null, 200); 
                }else{
                    return $this->customer->send_response("Mã bảo mật không đúng", null, 500); 
                }
            }else{
                return $this->customer->send_response("Mật khẩu cũ không đúng", null, 500); 
            }
        }else{
            return $this->customer->send_response("Phiên đăng nhập hết hạn", $route_redirect, 500); 
        }
    }

    // Đăng xuất
    public function logout(Request $request){
        Cookie::queue(Cookie::forget('_token_'));
        return redirect()->route('customer.view.index');
    }

    // Lấy ra Name, Phone, Address
    public function get_profile(Request $request){
        $is_user = static::check_token($request); 
        $route_redirect = "/";
        if ($is_user) {
            list($user_id, $token) = static::unpack_token($request);  
            $user = $this->customer->get_profile($user_id);
            return $this->customer->send_response("Thông tin tài khoản", $user, 200);
        }else{
            return $this->customer->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        }
    }
    
    // Cập nhật thông tin cá nhân
    public function update(Request $request){
        $is_user = static::check_token($request); 
        $route_redirect = "/";
        if ($is_user) { 
            list($user_id, $token) = static::unpack_token($request); 
            $data = [
                "name"          => $this->customer_detail->remove_tag($request->data_name),
                "phone"         => $this->customer_detail->remove_tag($request->data_phone), 
                "address"       => $this->customer_detail->remove_tag($request->data_address), 
            ];
            if ($request->data_image != "undefined") {
                $data["avatar"] = $this->customer->imageInventor('image-upload', $request->data_image, 600);
            }
            $user = $this->customer->get_profile($user_id)[0]; 
            $this->customer_detail->update($data, $user->id);
            return $this->customer->send_response("Cập nhật thành công", "", 200); 
        }else{
            return $this->customer->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        } 
    }

    // Kiểm tra token hợp lệ
    public function check_token(Request $request){
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $token, 2); 
            $user = $this->customer->get_secret($user_id);
            if ($user) {
                return Hash::check($user_id . '$' . $user[0]->secret_key, $token);
            }else{
                return false;
            }
        }else{
            return abort('403');
        }
    }

    // Tách token
    public function unpack_token(Request $request){
        $token = $request->cookie('_token_');
        return explode('$', $token, 2); 
    }

}
