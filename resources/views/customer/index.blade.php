@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')  

		<!--************************************
				Home Slider Start
		*************************************-->
		<div id="tg-homeslider" class="tg-homeslider tg-haslayout owl-carousel">

		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					All Status Start
			*************************************-->
			<section class="tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-allstatus">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bgbookwehave" data-z-index="2" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset("customer/images/parallax/bgparallax-01.jpg") }}">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-book"></i></span>
											<h2>Số sách của chúng tôi<span>24,179,213</span></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bgtotalmembers" data-z-index="2" data-appear-bottom-offset="600" data-parallax="scroll" data-image-src="{{ asset("customer/images/parallax/bgparallax-02.jpg") }}">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-user"></i></span>
											<h2>Số lượng khách hàng<span>15,179,213</span></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bghappyusers" data-z-index="2" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset("customer/images/parallax/bgparallax-03.jpg") }}">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-heart"></i></span>
											<h2>Số lượt xem<span>1,267,539</span></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					All Status End
			*************************************-->
			<!--************************************
					Best New Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2>Sách mới</h2>
								<a class="tg-btn" href="/category?category=0&sort=1">Xem tất cả</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
								 
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Best Selling End
			*************************************-->
			<!--************************************
					Featured Item Start
			*************************************-->
			<section class="tg-bglight tg-haslayout product-best-discount">
				
			</section>
			<!--************************************
					Featured Item End
			*************************************-->
			<!--************************************
					New Release Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-newrelease">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									<h2>Top Nhiều lượt xem nhất</h2>
								</div>  
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="row">
									<div class="tg-newreleasebooks">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					New Release End
			*************************************-->


			<!--************************************
					Authors Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2>Tác giả mới</h2>
								<a class="tg-btn" href="javascript:void(0);">Xem tất cả</a>
							</div>
						</div>
						<div id="tg-authorsslider" class="tg-authors tg-authorsslider owl-carousel">

						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Authors End
			*************************************-->

		</main>

@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/js/page/index.js') }}"></script>
@endsection()