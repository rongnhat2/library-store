<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Mail; 

use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;

use App\Repositories\Manager\OrderRepository;
use App\Models\Order;
use App\Models\OrderDetail; 

use App\Repositories\Manager\ProductRepository;
use App\Models\Product;

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class OrderController extends Controller
{
    protected $product;
    protected $customer;
    protected $order;
    protected $order_detail;

    public function __construct(Product $product, CustomerAuth $customer, Order $order, OrderDetail $order_detail){
        $this->customer         = new CustomerRepository($customer);
        $this->order            = new OrderRepository($order);
        $this->order_detail     = new OrderRepository($order_detail); 
        $this->product          = new ProductRepository($product);
    }

    // Lấy ra danh sách đơn hàng
    public function get(Request $request){
        $is_user = static::check_token($request); 
        $route_redirect = "/";
        if ($is_user) { 
            $tab = $request->tab;
            list($user_id, $token) = static::unpack_token($request); 
            $data   = [];
            $order = $this->order->get_all($tab, $user_id);
            foreach ($order as $key => $value) {
                $order_detail = $this->order->get_detail($value->id);
                $order_group = [
                    "order"         => $value,
                    "order_detail"  => $order_detail,
                ];
                array_push($data, $order_group);
            }
            return $this->order->send_response("Danh sách đơn hàng", $data, 200); 
        }else{
            return $this->order->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        } 
    }
    
    // Đặt hàng
    public function checkout(Request $request){  

        $is_user = static::check_token($request); 
        list($user_id, $token) = static::unpack_token($request); 
        $metadata = json_decode($request->metadata); 

        $customer_id         = $user_id;
        $name       = preg_replace('/(<([^>]+)>)/', '', $request->data_name);
        $email      = preg_replace('/(<([^>]+)>)/', '', $request->data_email);
        $address    = preg_replace('/(<([^>]+)>)/', '', $request->data_address);
        $phone      = preg_replace('/(<([^>]+)>)/', '', $request->data_phone); 

        $sub_total  = 0;
        $discount   = 0;
        $total      = 0; 
        foreach ($metadata->cart as $key => $value) { 
            $data = $this->product->get_one($value->id);

            $sub_total  += $data[0]->prices;
            $discount   += $data[0]->prices / 100 * $data[0]->discount;
            $total      += ($data[0]->prices - ( $data[0]->prices / 100 * $data[0]->discount )) * $value->size;
        }
        $route_redirect = "/profile?tab=Order";
        try {
            DB::beginTransaction(); 
            $data_order = [
                "customer_id"   => $customer_id, 
                "sub_total"     => $sub_total,
                "discount"      => $discount,
                "total"         => $total,
                "name"          => $name, 
                "phone"         => $phone, 
                "address"       => $address, 
                "order_value"   => Carbon::now()->toDateTimeString() . "|Đặt hàng thành công",
                "order_status"  => 0,
            ]; 
            $order_item = $this->order->create($data_order);

            foreach ($metadata->cart as $key => $value) {
                $product = $this->product->get_one($value->id);
                $item_order = [
                    "order_id"      => $order_item->id,
                    "product_id"    => $value->id, 
                    "quantity"      => $value->size,
                    "prices"        => $data[0]->prices,
                    "discount"      => $data[0]->discount,
                    "total_price"   => ($data[0]->prices - ( $data[0]->prices / 100 * $data[0]->discount ) ) * $value->size,
                ];
                $this->order_detail->create($item_order);
            }
 
            DB::commit(); 
            if ($customer_id) { 
                return $this->order->send_response("Đặt hàng thành công", $route_redirect, 201); 
            }
            return $this->order->send_response("Lỗi đăng nhập", $route_redirect, 201); 
        } catch (\Exception $exception) {
            dd( $exception);
            DB::rollBack(); 
            return $this->order->send_response("Error", $route_redirect, 404);  
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
            return false;
        }
        
    }

    // Tách token
    public function unpack_token(Request $request){
        $token = $request->cookie('_token_');
        return explode('$', $token, 2); 
    }
}
