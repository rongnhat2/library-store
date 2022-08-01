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

class DisplayController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product             = new ProductRepository($product); 
    }
    public function login(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.login", compact("customer_data"));
    }
    public function register(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.register", compact("customer_data"));
    }
    public function index(Request $request){ 
        $customer_data = static::generate_logined($request);   
        return view("customer.index", compact("customer_data"));
    }
    public function about(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.about", compact("customer_data"));
    }
    public function category(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.category", compact("customer_data"));
    }
    public function product(Request $request, $id, $slug){
        $customer_data = static::generate_logined($request);  
        return view("customer.product", compact("customer_data", "id"));
    }
    public function contact(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.contact", compact("customer_data"));
    }
    public function cart(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.cart", compact("customer_data"));
    }
    public function checkout(Request $request){
        $customer_data = static::generate_logined($request);   
        return view("customer.checkout", compact("customer_data"));
    }
    public function profile(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.profile", compact("customer_data"));
    }
    


    public function register_successful(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.confirm-register", compact("customer_data"));
    }
    public function checkout_login(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.checkout-login", compact("customer_data"));
    }

    public function rule_agreement(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-agreement", compact("customer_data"));
    }
    public function rule_pay(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-pay", compact("customer_data"));
    }
    public function rule_back(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-back", compact("customer_data"));
    }
    public function rule_product(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-product", compact("customer_data"));
    }
    public function rule_ship(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-ship", compact("customer_data"));
    }
    public function rule_buy(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-buy", compact("customer_data"));
    }
    public function rule_order(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-order", compact("customer_data"));
    }
    public function rule_privacy(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-privacy", compact("customer_data"));
    }
    public function rule_recruit(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.rule-recruit", compact("customer_data"));
    }
    

    // Generate user detail
    public function generate_logined($request){
        $user_login = [
            'id'        => null,
            'email'     => null,
            'name'      => null,
            'phone'     => null,
            'avatar'    => null,
            'address'   => null,
            'is_login'  => false
        ];
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $request->cookie('_token_'), 2);
            $sql_getAuth    = 'SELECT   customer.id,
                                        customer.email,
                                        customer_detail.name,
                                        customer_detail.phone,
                                        customer_detail.avatar,
                                        customer_detail.address 
                                FROM customer 
                                LEFT JOIN customer_detail
                                ON customer.id = customer_detail.customer_id
                                WHERE customer.id = "'.$user_id.'"';
            $hasAuth    = DB::select($sql_getAuth);
            if (count($hasAuth) != 0) {
                $user_login['id']           = $hasAuth[0]->id;
                $user_login['email']        = $hasAuth[0]->email;
                $user_login['name']         = $hasAuth[0]->name;
                $user_login['avatar']       = $hasAuth[0]->avatar;
                $user_login['phone']        = $hasAuth[0]->phone;
                $user_login['address']      = $hasAuth[0]->address; 
                $user_login['is_login']     = true;
            }
        }
        return $user_login;
    }

}
