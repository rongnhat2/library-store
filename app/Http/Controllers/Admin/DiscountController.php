<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ProductRepository;
use App\Models\Product; 
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class DiscountController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product             = new ProductRepository($product); 
    }
    public function index(){
        return view("admin.manager.discount");
    }
    public function get(){
        $data = $this->product->get_data_discount();
        return $this->product->send_response(201, $data, null);
    }
    public function get_not(){
        $data = $this->product->get_data_not_discount();
        return $this->product->send_response(201, $data, null);
    }
    public function store(Request $request){ 
        $data = [
            "discount"   => $request->data_discount,  
        ]; 
 
        $this->product->update($data, $request->data_product);
        return $this->product->send_response(201, $data, null);
    }
    public function delete($id){ 
        $data = [
            "discount"   => 0,  
        ]; 
 
        $this->product->update($data, $id);
        return $this->product->send_response(201, $data, null);
    }


}
