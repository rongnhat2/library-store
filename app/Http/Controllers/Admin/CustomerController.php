<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;
use App\Models\CustomerDetail;
use Carbon\Carbon;
use Session;
use Hash;
use DB;


class CustomerController extends Controller
{
    protected $customer;
    protected $customer_detail;

    public function __construct(CustomerAuth $customer, CustomerDetail $customer_detail){
        $this->customer         = new CustomerRepository($customer);
        $this->customer_detail  = new CustomerRepository($customer_detail);
    }
    public function index(){
        return view("admin.manager.customer");
    }
    public function get(){
        $data = $this->customer->get_data();
        return $this->customer->send_response(201, $data, null);
    }
}
