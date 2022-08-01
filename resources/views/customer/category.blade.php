@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')  

<!--************************************
				Inner Banner Start
		*************************************-->
        <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset("customer/images/parallax/bgparallax-07.jpg") }}">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-innerbannercontent">
                            <h1>Tất cả sản phẩm</h1>
                            <ol class="tg-breadcrumb">
                                <li><a href="/">Trang chủ</a></li>
                                <li class="tg-active">Sản phẩm</li>
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
            <!--************************************
					News Grid Start
			*************************************-->
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="tg-twocolumns" class="tg-twocolumns">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                                <div id="tg-content" class="tg-content">
                                    <div class="tg-products"> 
                                        <div class="tg-productgrid">
                                            <div class="tg-refinesearch">
                                                <span>showing 1 to 8 of 20 total</span>
                                                <div class="tg-formtheme tg-formsortshoitems">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label>sort by:</label>
                                                            <span class="tg-select">
                                                                <select class="sort-by">
                            										<option value="0">-----------</option> 
									                                <option value="1">Mới nhất</option> 
									                                <option value="2">Name: A to Z</option> 
									                                <option value="3">Name: Z to A</option> 
									                                <option value="4">Giá thấp tới cao</option> 
									                                <option value="5">Giá cao tới thấp</option>
                                                                </select>
                                                            </span>
                                                        </div> 
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="product-list-item">
                                            	
                                            </div>
                                             
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
                                                <input type="search" name="search" class="form-group" placeholder="Tìm kiếm">
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
<script type="text/javascript" src="{{ asset('customer/js/page/category.js') }}"></script>
@endsection()