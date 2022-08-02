@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')  

<div class="main-content main-content-login">
    <div class="container"> 
        <div class="row">
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main"> 
                    <div class="customer_login">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="login-item" id="login">
                                    <h5 class="title-login">Giỏ hàng</h5>

                                    <div class="shoppingcart-content">
                                        <form action="shoppingcart.html" class="cart-form">
                                            <table class="shop_table">
                                                <thead>
                                                <tr>
                                                    <th class="product-remove"></th>
                                                    <th class="product-thumbnail"></th>
                                                    <th class="product-name"></th>
                                                    <th class="product-price"></th>
                                                    <th class="product-quantity"></th>
                                                    <th class="product-subtotal"></th>
                                                </tr>
                                                </thead>
                                                <tbody> 
                                                    <tr>
                                                        <td class="actions"> 
                                                            <div class="order-total">
                                                                <span class="title">
                                                                    Total Price:
                                                                </span>
                                                                <span class="total-price">
                                                                    
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div> 
                            </div>
                            <p class="form-row">
                                <a href="/category" type="button" class="btn" style="text-decoration: none;">Tiếp tục mua hàng</a>  
                                <a href="/checkout" type="button" class="button-submit btn" style="text-decoration: none;">Đặt hàng</a>   
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/js/page/cart.js') }}"></script>
@endsection()