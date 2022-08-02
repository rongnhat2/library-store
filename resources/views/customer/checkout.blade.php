@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')  

<div class="main-content main-content-login">
    <div class="container">  
        <div class="checkout-wrapp cart-form-data "  >
            <div class="shipping-address-form-wrapp">
                <div class="shipping-address-form  checkout-form row">
                    <div class="row-col-1 row-col col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">
                        <div class="shipping-address js-validate"> 
                            <h3 class="title-form">
                                Địa chỉ nhận hàng
                            </h3>
                            <div class="error-log"></div>
                            <input title="id" type="hidden" class="input-text data-id" value="{{ $customer_data["is_login"] == 1 ? $customer_data["id"] : "" }}">
                            <p class="form-row form-row-first col-md-6">
                                <label class="text">Họ và tên</label>
                                <input title="Name" type="text" class="input-text data-name" value="{{ $customer_data["is_login"] == 1 ? $customer_data["name"] : "" }}">
                            </p>  
                            <p class="form-row form-row-first col-md-6">
                                <label class="text">Email</label>
                                <input title="Email" type="text" class="input-text data-email" value="{{ $customer_data["is_login"] == 1 ? $customer_data["email"] : "" }}">
                            </p>
                            <p class="form-row form-row-last col-md-6">
                                <label class="text">Số điện thoại</label>
                                <input title="Telephone" type="text" class="input-text data-phone data-number" value="{{ $customer_data["is_login"] == 1 ? $customer_data["phone"] : "" }}">
                            </p>
                            <p class="form-row form-row-first col-md-6">
                                <label class="text">Địa chỉ nhận hàng</label>
                                <input title="Address" type="text" class="input-text data-address" value="{{ $customer_data["is_login"] == 1 ? $customer_data["address"] : "" }}">
                            </p>  
                        </div>
                        <div class="your-order">
                            <h3 class="title-form">
                                Giá trị đơn hàng
                            </h3>
                            <ul class="list-product-order">
                                 
                            </ul>
                            <div class="order-total">
                                <span class="title">
                                    Total Price:
                                </span>
                                <span class="total-price">
                                     
                                </span>
                            </div>
                        </div>
                    </div> 
                </div>
                <p class="form-row">
                    <a href="#" type="button" class="button button-payment btn" style="text-decoration: none;">Đặt hàng</a>    
                </p>
            </div> 
        </div>
    </div>
</div>

@endsection()
@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/js/page/checkout.js') }}"></script>
@endsection()