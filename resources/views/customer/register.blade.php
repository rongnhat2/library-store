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
                                    <div class="login-item" id="signup">
                                        <h5 class="title-login">Đăng Ky</h5>
                                        <div class="login js-validate"> 
                                            <p class="form-row form-row-wide">
                                                <label class="text">Họ và tên</label>
                                                <input title="username" type="text" class="input-text data-name">
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Địa chỉ</label>
                                                <input title="username" type="text" class="input-text data-address">
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Số điện thoại</label>
                                                <input title="username" type="text" class="input-text data-telephone number-type">
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Email</label>
                                                <input title="username" type="text" class="input-text data-email">
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label class="text">Mật khẩu</label>
                                                <input title="password" type="password" class="input-text data-password">
                                            </p> 
                                            <p class="form-row">
                                                <button type="button" class="button-submit form-submit" atr="Register">Đăng kí</button>  
                                                <a href="{{ route("customer.view.login") }}" type="button" class="btn-auth-action register-button" atr="Register">Đăng nhập</a>  
                                            </p>
                                        </div>
                                    </div>
                                </div> 
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
<script type="text/javascript" src="{{ asset('customer/js/page/register.js') }}"></script>
@endsection()