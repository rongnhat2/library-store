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

class DisplayController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product             = new ProductRepository($product); 
    }
    public function login(){
        return view('admin.auth.login');
    }
    public function statistic(){
        return view('admin.manager.statistic');
    }
    public function watermark(){
        return view('admin.manager.watermark');
    }
    public function image(Request $request){
        $data = $this->product->imageInventor('image-upload', $request->file, 1280);
        return $this->product->send_response(201, $data, null);
    }
}
