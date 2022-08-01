@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')  
<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset("customer/images/parallax/bgparallax-07.jpg")  }}" >
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1 class="product-name m-b-2"></h1>
							<ol class="tg-breadcrumb">
								<li><a href="/">Trang chủ</a></li>
								<li><a href="javascript:void(0);">Sản phẩm</a></li>
								<li class="tg-active product-name"></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<input type="hidden" class="product-id" value="{{ $id }}">

			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">

									<div class="tg-productdetail">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<div class="tg-postbook">
													<figure class="tg-featureimg"><img src="" alt="image description"></figure>
													<div class="tg-postbookcontent">
														<span class="tg-bookprice">
															
														</span> 
														<ul class="tg-delevrystock">
															<li><i class="icon-rocket"></i><span>Giao hàng hỏa tốc</span></li> 
															<li><i class="icon-store"></i><span>Trạng thái: <em>Còn hàng</em></span></li>
														</ul> 
														<a class="tg-btn tg-active tg-btn-lg quantity-add-to-cart action-add-to-card" atr="Add to card" href="javascript:void(0);" product-id="">Thêm vào giỏ hàng</a> 
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
												<div class="tg-productcontent">
													<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);"></a></li>
													</ul> 
													<div class="tg-booktitle">
														<h3 class=" product-name"></h3>
													</div>
													<span class="tg-bookwriter">Tác giả: <a href="javascript:void(0); author-name"></a></span>

													<div class="tg-description">
														<p class="product-description"></p>
													</div>
													<div class="tg-sectionhead">
														<h2>Mô tả sản phẩm</h2>
													</div>
													<ul class="tg-productinfo"> 
														<li><span>Số trang:</span><span class="data-product-count"></span></li>
														<li><span>Kích thước:</span><span class="data-product-size"></span></li>
														<li><span>Ngày xuất bản:</span><span class="data-product-date"></span></li> 
														<li><span>Ngôn ngữ:</span><span class="data-product-language"></span></li> 
													</ul> 
												</div>
											</div>
											<div class="tg-productdescription">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="tg-sectionhead">
														
													</div>
													<ul class="tg-themetabs" role="tablist">
														<li role="presentation" class="active"><a href="#description" data-toggle="tab">Nội dung</a></li> 
													</ul>
													<div class="tg-tab-content tab-content">
														<div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
															<div class="tg-description product-detail"> 
															</div>
														</div> 
													</div>
												</div>
											</div>
											 
											{{-- <div class="tg-relatedproducts">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="tg-sectionhead">
														<h2><span>Sản phẩm liên quan</span> </h2>
														<a class="tg-btn" href="javascript:void(0);">View All</a>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="images/books/img-01.jpg" alt="image description"></div>
																		<div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div>
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
																	<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
																	<div class="tg-booktitle">
																		<h3><a href="javascript:void(0);">Help Me Find My Stomach</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
																	<span class="tg-stars"><span></span></span>
																	<span class="tg-bookprice">
																		<ins>$25.18</ins>
																		<del>$27.20</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Add To Basket</em>
																	</a>
																</div>
															</div>
														</div>
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="images/books/img-02.jpg" alt="image description"></div>
																		<div class="tg-backcover"><img src="images/books/img-02.jpg" alt="image description"></div>
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
																	<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
																	<div class="tg-booktitle">
																		<h3><a href="javascript:void(0);">Drive Safely, No Bumping</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
																	<span class="tg-stars"><span></span></span>
																	<span class="tg-bookprice">
																		<ins>$25.18</ins>
																		<del>$27.20</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Add To Basket</em>
																	</a>
																</div>
															</div>
														</div>
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="images/books/img-03.jpg" alt="image description"></div>
																		<div class="tg-backcover"><img src="images/books/img-03.jpg" alt="image description"></div>
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
																	<div class="tg-themetagbox"></div>
																	<div class="tg-booktitle">
																		<h3><a href="javascript:void(0);">Let The Good Times Roll Up</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
																	<span class="tg-stars"><span></span></span>
																	<span class="tg-bookprice">
																		<ins>$25.18</ins>
																		<del>$27.20</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Add To Basket</em>
																	</a>
																</div>
															</div>
														</div>
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="images/books/img-04.jpg" alt="image description"></div>
																		<div class="tg-backcover"><img src="images/books/img-04.jpg" alt="image description"></div>
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
																	<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
																	<div class="tg-booktitle">
																		<h3><a href="javascript:void(0);">Our State Fair Is A Great State Fair</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
																	<span class="tg-stars"><span></span></span>
																	<span class="tg-bookprice">
																		<ins>$25.18</ins>
																		<del>$27.20</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Add To Basket</em>
																	</a>
																</div>
															</div>
														</div>
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="images/books/img-05.jpg" alt="image description"></div>
																		<div class="tg-backcover"><img src="images/books/img-05.jpg" alt="image description"></div>
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
																	<div class="tg-themetagbox"></div>
																	<div class="tg-booktitle">
																		<h3><a href="javascript:void(0);">Put The Petal To The Metal</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
																	<span class="tg-stars"><span></span></span>
																	<span class="tg-bookprice">
																		<ins>$25.18</ins>
																		<del>$27.20</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Add To Basket</em>
																	</a>
																</div>
															</div>
														</div>
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="images/books/img-06.jpg" alt="image description"></div>
																		<div class="tg-backcover"><img src="images/books/img-06.jpg" alt="image description"></div>
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
																	<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
																	<div class="tg-booktitle">
																		<h3><a href="javascript:void(0);">Help Me Find My Stomach</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
																	<span class="tg-stars"><span></span></span>
																	<span class="tg-bookprice">
																		<ins>$25.18</ins>
																		<del>$27.20</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Add To Basket</em>
																	</a>
																</div>
															</div>
														</div>
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="images/books/img-03.jpg" alt="image description"></div>
																		<div class="tg-backcover"><img src="images/books/img-03.jpg" alt="image description"></div>
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
																	<div class="tg-themetagbox"></div>
																	<div class="tg-booktitle">
																		<h3><a href="javascript:void(0);">Let The Good Times Roll Up</a></h3>
																	</div>
																	<span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
																	<span class="tg-stars"><span></span></span>
																	<span class="tg-bookprice">
																		<ins>$25.18</ins>
																		<del>$27.20</del>
																	</span>
																	<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																		<i class="fa fa-shopping-basket"></i>
																		<em>Add To Basket</em>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div> --}}
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input type="search" name="search" class="form-group" placeholder="Tìm kiếm sản phẩm">
											</div>
										</form>
									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Danh mục</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul class="category-list">

											</ul>
										</div>
									</div>
									{{-- <div class="tg-widget tg-widgettrending">
										<div class="tg-widgettitle">
											<h3>Trending Products</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-04.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-05.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-06.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-07.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
											</ul>
										</div>
									</div>  --}}
								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/js/page/product.js') }}"></script>
@endsection()