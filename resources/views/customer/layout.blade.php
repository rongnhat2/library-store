<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TraMy Store</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('customer/css/responsive.css') }}">
	<script src="{{ asset('customer/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('customer/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="tg-home tg-homeone">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  

							<div class="user-login-wrapper">
								<?php if ($customer_data['is_login']): ?>
								<figure><a href="{{ route("customer.profile.index") }}"><span><?php echo $customer_data['name'] ?></span></a></figure>  
	                            <?php else: ?>
								<figure><a href="/login"><span>Đăng nhập</span></a></figure> 
								<figure><a href="/register"><span>Đăng ký</span></a></figure> 
	                            <?php endif ?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="tg-middlecontainer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="/"><img src="{{ asset("customer/images/logo.png") }}" alt="company name here"></a></strong>
							<div class="tg-wishlistandcart">

								<div class="dropdown tg-themedropdown tg-minicartdropdown">
									<a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="tg-themebadge">3</span>
										<i class="icon-cart"></i> 
									</a> 
								</div>
							</div>
							<div class="tg-searchbox">
								<form class="tg-formtheme tg-formsearch">
									<fieldset>
										<input type="text" name="search" class="typeahead form-control search-input-wrapper" placeholder="Tìm kiếm tên truyện">
										<button type="submit"><i class="icon-magnifier"></i></button>
									</fieldset> 
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>
										<li class="menu-item-has-children">
											<a href="javascript:void(0);">Danh mục</a> 
											<ul class="sub-menu category-list"> 
											</ul>  
										</li>
										<li>
											<a href="javascript:void(0);">Trang chủ</a> 
										</li> 
										<li>
											<a href="javascript:void(0);">Tất cả sản phẩm</a> 
										</li> 
										<li>
											<a href="javascript:void(0);">Đang giảm giá</a> 
										</li> 
										<li><a href="contactus.html">Liên hệ</a></li> 
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************--> 

        @yield('body')

		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-footerarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-clientservices">
								<li class="tg-devlivery">
									<span class="tg-clientserviceicon"><i class="icon-rocket"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Fast Delivery</h3>
										<p>Shipping Worldwide</p>
									</div>
								</li>
								<li class="tg-discount">
									<span class="tg-clientserviceicon"><i class="icon-tag"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Open Discount</h3>
										<p>Offering Open Discount</p>
									</div>
								</li>
								<li class="tg-quality">
									<span class="tg-clientserviceicon"><i class="icon-leaf"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Eyes On Quality</h3>
										<p>Publishing Quality Work</p>
									</div>
								</li>
								<li class="tg-support">
									<span class="tg-clientserviceicon"><i class="icon-heart"></i></span>
									<div class="tg-titlesubtitle">
										<h3>24/7 Support</h3>
										<p>Serving Every Moments</p>
									</div>
								</li>
							</ul>
						</div>
						<div class="tg-threecolumns">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol">
									<strong class="tg-logo"><a href="javascript:void(0);"><img src="{{ asset("customer/images/flogo.png") }}" alt="image description"></a></strong>
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>Đức Thắng, Bắc Từ Liêm, Hà Nội</address>
										</li>
										<li>
											<i class="icon-phone-handset"></i>
											<span>
												<em>0396947730</em>
											</span>
										</li> 
										<li>
											<i class="icon-envelope"></i>
											<span>
												<em><a href="mailto: tramy5508@gmail.com"> tramy5508@gmail.com</a></em>
											</span>
										</li>
									</ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
										<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgetnavigation">
									<div class="tg-widgettitle">
										<h3>Danh mục</h3>
									</div>
									<div class="tg-widgetcontent category-list"> 

									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgettopsellingauthors">
									<div class="tg-widgettitle">
										<h3>Gửi góp ý</h3>
									</div>
									<div class="tg-widgetcontent">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
			<div class="tg-footerbar">
				<a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="tg-paymenttype"><img src="images/paymenticon.png" alt="image description"></span>
							<span class="tg-copyright">2022 All Rights Reserved By &copy; Luu Thi Tra My</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
    <script src="https://kit.fontawesome.com/d8162761f2.js"></script>
	<script src="{{ asset('customer/js/vendor/jquery-library.js') }}"></script>
	<script src="{{ asset('customer/js/vendor/bootstrap.min.js') }}"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
	<script src="{{ asset('customer/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('customer/js/jquery.vide.min.js') }}"></script>
	<script src="{{ asset('customer/js/countdown.js') }}"></script>
	<script src="{{ asset('customer/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('customer/js/parallax.js') }}"></script>
	<script src="{{ asset('customer/js/countTo.js') }}"></script>
	<script src="{{ asset('customer/js/appear.js') }}"></script>
	<script src="{{ asset('customer/js/gmap3.js') }}"></script>
	<script src="{{ asset('customer/js/main.js') }}"></script>
	<script src="{{ asset('customer/js/api.js') }}"></script>
	<script src="{{ asset('customer/js/layout.js') }}"></script>
	@yield('js')
</body>
</html>