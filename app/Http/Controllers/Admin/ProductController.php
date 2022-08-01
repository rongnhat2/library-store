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

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product             = new ProductRepository($product); 
    }
    public function index(){
        return view("admin.manager.product");
    }
    public function get(){
        $data = $this->product->get_data();
        return $this->product->send_response(201, $data, null);
    }
    public function get_one($id){
        $data = $this->product->get_one($id);
        return $this->product->send_response(200, $data, null);
    }
 
    public function store(Request $request){    
        $data = [
            "category_id"   => $request->data_category, 
            "author_id"     => $request->data_author, 
            "name"          => $request->data_name,
            "slug"          => $this->product->to_slug($request->data_name), 
            "image"         => $this->product->imageInventor('image-upload', $request->data_image, 600),  
            "prices"        => $request->data_prices,
            "discount"      => 0,
            "description"   => nl2br($request->data_description ?? ""),
            "detail"        => $request->data_detail ?? "", 
            "metadata"      => $request->data_meta,
            "trending"      => 0,
        ];  
        $data_return = $this->product->create($data);
        return $this->product->send_response("Created", $data_return, 201);
    }
    public function update(Request $request){ 
        $data = [
            "category_id"   => $request->data_category, 
            "author_id"     => $request->data_author, 
            "name"          => $request->data_name,
            "slug"          => $this->product->to_slug($request->data_name),  
            "prices"        => $request->data_prices, 
            "description"   => nl2br($request->data_description ?? ""),
            "detail"        => $request->data_detail ?? "", 
            "metadata"      => $request->data_meta, 
        ]; 

        if ($request->data_image != "null") {  
            $data["image"] = $this->author->imageInventor('image-upload', $request->data_image, 600);
        }
        $this->product->update($data, $request->data_id);
        return $this->product->send_response(201, "Update Success", null);
    }  

    public function update_price(){
        $data = $this->product->get_data();
        foreach ($data as $key => $value) { 
            $data_meta = json_decode($value->metadata)->data;
            if (count($data_meta) > 0) {
                $data = [
                    "price" => json_decode($value->metadata)->data[0]->prices
                ];
                $this->product->update($data, $value->id);
            } 
        } 
        return $this->product->send_response(200, "Update successful", null);
    }
    public function delete($id){
        $this->product->delete($id); 
        return $this->product->send_response(200, "Delete successful", null);
    }
    // cập nhật trending
    public function update_trending(Request $request){
        $this->product->update_trending($request->id);
        return $this->product->send_response(200, null, null);
    }
}
