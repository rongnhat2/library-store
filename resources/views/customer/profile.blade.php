@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()

@section('body')
<main id="content" role="main">
    <div class="container">
        <div class="I-profile">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="profile-control-wrapper">
                        <div class="profile-info-wrapper">
                            <div class="info-avatar" style="background-image: url('/<?php echo $customer_data['avatar'] ?>');"></div>
                            <div class="info-data">
                                <h5 class="name"><?php echo $customer_data['name'] ?></h5>
                                <h6 class="email"><?php echo $customer_data['email'] ?></h6>
                            </div>
                        </div>
                        <div class="profile-action-wrapper">
                            <div class="action-item is-select" tab-item="Information"><i class="fas fa-user"></i>Thông tin cá nhân</div>
                            <div class="action-item" tab-item="Order"><i class="fas fa-clipboard-list"></i>Đơn mua</div>
                            <div class="action-item" tab-item="Password"><i class="fas fa-key"></i> Đổi mật khẩu</div>
                            <div class="action-item" onclick="event.preventDefault();document.getElementById('logout-form').submit(); localStorage.removeItem('card')"><i class="fas fa-sign-out-alt"></i>Đăng xuất</div>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none"> @csrf </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    @if ( Session::has('error') )
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if ( Session::has('success') )
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="profile-data-wrapper is-open" view-data="Profile">
                        <div class="profile-data-block is-open" tab-data="Information">
                            <div class="profile-wrapper">
                                <div class="profile-header">
                                    <h3>Hồ sơ của tôi</h3>
                                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                                </div>  
                                <div class="profile-body">
                                    <div class="row">
                                        <form autocomplete="off" class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                            <div class="error-log"></div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Email
                                                </div>
                                                <div class="profile-value">
                                                    <?php echo $customer_data['email'] ?>
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Họ và tên
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-name">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Địa chỉ
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-address">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Số điện thoại
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-phone">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    
                                                </div>
                                                <div class="profile-value">
                                                    <div class="action-save" atr="Save">
                                                        Lưu lại
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 avatar-wrapper">
                                            <div>
                                                <div class="image-wrapper"> </div>
                                                <label for="avatar">Chọn ảnh</label>
                                                <input type="file" id="avatar" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="profile-data-block order-block" tab-data="Order">
                            <div class="order-wrapper">
                                <div class="order-nav">
                                    <div class="order-nav-item is-select">
                                        Tất cả
                                    </div>
                                    <div class="order-nav-item" order-status="0">
                                        Chờ xác nhận
                                    </div>
                                    <div class="order-nav-item" order-status="3">
                                        Chờ lấy hàng
                                    </div>
                                    <div class="order-nav-item" order-status="4">
                                        Đang giao
                                    </div>
                                    <div class="order-nav-item" order-status="5">
                                        Đã giao
                                    </div>
                                    <div class="order-nav-item" order-status="6">
                                        Đã hủy
                                    </div>
                                </div>  
                                <div class="order-main">
                                    {{-- <form class="order-item-search" autocomplete="off">
                                        <input type="text" placeholder="Tìm kiếm theo mã đơn hàng, sản phẩm,...">
                                    </form> --}}
                                    <div class="order-item-list"> 

                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="profile-data-block " tab-data="Password">
                            <div class="profile-wrapper">
                                <div class="profile-header">
                                    <h3>Quản lý mật khẩu</h3>
                                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                                </div>  
                                <div class="profile-body">
                                    <div class="row">
                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                            <div class="error-log"></div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Mật khẩu cũ
                                                </div>
                                                <div class="profile-value">
                                                    <input type="password" value="" class="data-oldpass">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Mật khẩu mới
                                                </div>
                                                <div class="profile-value">
                                                    <input type="password" value="" class="data-newpass">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    Mã xác minh
                                                </div>
                                                <div class="profile-value">
                                                    <input type="text" value="" class="data-code">
                                                </div>
                                            </div>
                                            <div class="profile-component">
                                                <div class="profile-title">
                                                    
                                                </div>
                                                <div class="profile-value">
                                                    <div class="action-save" atr="Send">
                                                        Gửi mã xác thực
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="profile-data-wrapper order-tab-wrapper" view-data="OrderDetail">
                        <div class="go-back">
                            <div class="do-action"><i class="fas fa-caret-left mr-2"></i>Quay lại</div>
                        </div>
                        <div class="profile-data-block is-open">
                            <div class="order-procedure-wrapper">
                                <h5 class="title">Thông tin nhận hàng</h5>
                                <div class="row description-wrapper">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <div class="user-data">
                                            <i class="fas fa-user mr-2"></i><span class="data-name"> </span>
                                        </div>
                                        <div class="user-data">
                                            <i class="fas fa-map-marked-alt mr-2"></i><span class="data-address"> </span>
                                        </div>
                                        <div class="user-data">
                                            <i class="fas fa-phone mr-2"></i><span class="data-phone"> </span>
                                        </div> 
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 procedure-border procedure-timeline">
                                    </div>
                                </div>
                            </div>
                            <div class="profile-fill"></div>
                            <div class="order-item-wrapper">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</main>
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/js/page/profile.js') }}"></script>
@endsection()
        