<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function index(){
        return view("admin.manager.order");
    }
    public function get(Request $request){
        $id = $request->id;
        $data = $this->order->get_order($id);
        return $this->order->send_response(201, $data, null);
    }
    public function get_one(Request $request){
        $data_order = $this->order->get_in_order($request->id);
        $data_sub = $this->order_detail->get_full_order($request->id);
        $data = [
            "data_order" => $data_order,
            "data_sub" => $data_sub,
        ];
        return $this->order_detail->send_response(200, $data, null);
    }
    public function update(Request $request){
        $order_id       = $request->data_id;
        $order_status   = $request->data_status;
        $message_user   = [
            "",
            "Đã xác nhận đơn hàng",
            "Đã hoàn thiện đơn hàng",
            "Shipper đang lấy hàng",
            "Shipper đang vận chuyển",
            "Đã nhận hàng",
            "Đã hủy",
        ];
        $order = $this->order->get_one($order_id);
        $order_message_array = explode(",",$order[0]->order_value);
        array_push($order_message_array, Carbon::now()->toDateTimeString() . "|" . $message_user[$order_status]);
        $data = ["order_value" => implode(",",$order_message_array)];
  
        if ($request->data_status == 1) { 
            $this->order->update(["order_status" => $request->data_status], $request->data_id);
        }else if ($request->data_status == 2) { 
            $this->order->update(["order_status" => $request->data_status], $request->data_id);
        }else if ($request->data_status == 3) { 
            $this->order->update(["order_status" => $request->data_status], $request->data_id);
            $this->order->update(["order_value" => implode(",",$order_message_array), "order_status" => $order_status], $order_id); 
        }else if ($request->data_status == 4) {
            // Customer hệ thống gán shipper 
            $this->order->update(["order_status" => $request->data_status], $request->data_id);
        }else if ($request->data_status == 5) {
            // Giao hàng thành công
            $this->order->update(["order_status" => $request->data_status], $request->data_id);
        }else if ($request->data_status == 6) { 
            $data_sub = $this->order_detail->get_full_order($request->data_id); 
            $this->order->update(["order_status" => $request->data_status], $request->data_id);
        } 
        return $this->order->send_response("Cập nhật thành công", null, 200); 
    }


}
