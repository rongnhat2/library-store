<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ProductRepository;
use App\Models\Product; 
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product             = new ProductRepository($product); 
    }
    public function get_all(Request $request){
        $count = count($this->product->get_all_condition($request)); 
        $data = [ 
            "data"      => $this->product->get_condition($request, $count),
            "count"     => $count,
        ];
        return $this->product->send_response(200, $data, null);
    }
    // Lấy ra sản phẩm mới
    public function get_new(){
        $data = $this->product->get_new();
        return $this->product->send_response(200, $data, null);
    }
    // Lấy ra sản phẩm trending carousel
    public function get_trending(){
        $data = $this->product->get_trending(8);
        return $this->product->send_response(200, $data, null);
    }
    // Lấy ra tgacs giả mới
    public function get_author(){
        $data = $this->product->get_author();
        return $this->product->send_response(200, $data, null);
    }
    // Lấy ra 1 sản phẩm
    public function get_one($id){
        $this->product->updateView($id);
        $data = $this->product->get_one($id);
        return $this->product->send_response(200, $data, null);
    }
    // lấy ra sản phẩm mới
    public function get_top_view(){
        $data = $this->product->get_top_view(6);
        return $this->product->send_response(200, $data, null);
    }
    // giảm giá sâu nhất
    public function get_best_discount(){
        $data = $this->product->get_best_discount();
        return $this->product->send_response(200, $data, null);
    }


    // lấy ra sản phẩm mới
    public function get_new_arrivals(){
        $data = $this->product->get_new_arrivals(8);
        return $this->product->send_response(200, $data, null);
    }
    // lấy ra sản phẩm liên quan
    public function get_related($id){
        $product = $this->product->get_one($id);
        $data = $this->product->get_related($product[0]->category_id, $id);
        return $this->product->send_response(200, $data, null);
    }
    
    public function get_search(Request $request){
        $text       = $request->data_text;
        $category   = $request->data_category;
        $slug_data = $this->product->to_slug($text);
        $data = $this->product->find_real_time($slug_data, $category);
        return $this->product->send_response(200, $data, null);
    }
}
