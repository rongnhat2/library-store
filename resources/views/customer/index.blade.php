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
											<h2>Số lượt thích<span>1,267,539</span></h2>
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
								<a class="tg-btn" href="javascript:void(0);">Xem tất cả</a>
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
			<section class="tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-featureditm">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
								<figure><img src="images/img-02.png" alt="image description"></figure>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
								<div class="tg-featureditmcontent">
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-booktitle">
										<h3><a href="javascript:void(0);">Things To Know About Green Flat Design</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Farrah Whisenhunt</a></span>
									<span class="tg-stars"><span></span></span>
									<div class="tg-priceandbtn">
										<span class="tg-bookprice">
											<ins>$23.18</ins>
											<del>$30.20</del>
										</span>
										<a class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Xem ngay</em>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="tg-sectionhead">
									<h2>Top Nhiều lượt xem nhất</h2>
								</div> 
								<div class="tg-btns">
									<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
									<a class="tg-btn" href="javascript:void(0);">Read More</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="row">
									<div class="tg-newreleasebooks">
										<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="images/books/img-07.jpg" alt="image description"></div>
														<div class="tg-backcover"><img src="images/books/img-07.jpg" alt="image description"></div>
													</div>
													<a class="tg-btnaddtowishlist" href="javascript:void(0);">
														<i class="icon-heart"></i>
														<span>add to wishlist</span>
													</a>
												</figure>
												<div class="tg-postbookcontent">
													<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);">Adventure</a></li>
														<li><a href="javascript:void(0);">Fun</a></li>
													</ul>
													<div class="tg-booktitle">
														<h3><a href="javascript:void(0);">Help Me Find My Stomach</a></h3>
													</div>
													<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
													<span class="tg-stars"><span></span></span>
												</div>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="images/books/img-08.jpg" alt="image description"></div>
														<div class="tg-backcover"><img src="images/books/img-08.jpg" alt="image description"></div>
													</div>
													<a class="tg-btnaddtowishlist" href="javascript:void(0);">
														<i class="icon-heart"></i>
														<span>add to wishlist</span>
													</a>
												</figure>
												<div class="tg-postbookcontent">
													<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);">Adventure</a></li>
														<li><a href="javascript:void(0);">Fun</a></li>
													</ul>
													<div class="tg-booktitle">
														<h3><a href="javascript:void(0);">Drive Safely, No Bumping</a></h3>
													</div>
													<span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
													<span class="tg-stars"><span></span></span>
												</div>
											</div>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-3 col-lg-4 hidden-md">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="images/books/img-09.jpg" alt="image description"></div>
														<div class="tg-backcover"><img src="images/books/img-09.jpg" alt="image description"></div>
													</div>
													<a class="tg-btnaddtowishlist" href="javascript:void(0);">
														<i class="icon-heart"></i>
														<span>add to wishlist</span>
													</a>
												</figure>
												<div class="tg-postbookcontent">
													<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);">Adventure</a></li>
														<li><a href="javascript:void(0);">Fun</a></li>
													</ul>
													<div class="tg-booktitle">
														<h3><a href="javascript:void(0);">Let The Good Times Roll Up</a></h3>
													</div>
													<span class="tg-bookwriter">By: <a href="javascript:void(0);">Elisabeth Ronning</a></span>
													<span class="tg-stars"><span></span></span>
												</div>
											</div>
										</div>
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
					Testimonials Start
			*************************************-->
			<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
								<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
									<div class="item tg-testimonial">
										<figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="images/author/imag-02.jpg" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
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