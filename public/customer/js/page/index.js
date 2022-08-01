const View = {
	CarouselTrending:{
		render(data){
			data.map(v => {
				$("#tg-homeslider")
					.append(`<div class="item" style="background-image: url('/customer/images/slider/img-01.jpg')">
								<div class="container">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
											<div class="tg-slidercontent">
												<figure class="tg-authorimg"><a href="javascript:void(0);"><img src="/${v.image}" alt="image description"></a></figure>
												<h1>${v.name}</h1> 
												<div class="tg-description">
													<p>${v.description}</p>
												</div>
												<div class="tg-btns">
													<a class="tg-btn" href="javascript:void(0);">Xem ngay</a> 
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>`)
			})
		},
		init(){
			var _tg_homeslider = jQuery('#tg-homeslider');
			_tg_homeslider.owlCarousel({
				items: 1,
				nav: true,
				loop: false,
				dots: true,
				autoplay:false,
				navText: [
							'<i class="icon-chevron-left"></i>',
							'<i class="icon-chevron-right"></i>'
						],
				navClass: [
							'owl-prev tg-btnround tg-btnprev',
							'owl-next tg-btnround tg-btnnext'
						],
			});
		}
	},
	CarouselNew:{
		render(data){
			data.map(v => {
				$("#tg-bestsellingbooksslider")
					.append(`<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="/${v.image}" alt="${v.slug}"></div>
											<div class="tg-backcover"><img src="/${v.image}" alt="${v.slug}"></div>
										</div> 
									</figure>
									<div class="tg-postbookcontent">
										<ul class="tg-bookscategories">
											<li><a href="javascript:void(0);">${v.category_name}</a></li> 
										</ul> 
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">${v.name}</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">${v.author_name}</a></span> 
										<span class="tg-bookprice">
											<ins>${IndexView.Config.formatPrices(v.prices)} đ</ins> 
										</span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Giỏ hàng</em>
										</a>
									</div>
								</div>
							</div>`)
			})
		},
		init(){
			var _tg_bestsellingbooksslider = jQuery('#tg-bestsellingbooksslider');
				_tg_bestsellingbooksslider.owlCarousel({
					nav: true,
					loop: false,
					margin: 30,
					dots: true,
					navText: [
								'<i class="icon-chevron-left"></i>',
								'<i class="icon-chevron-right"></i>'
							],
					navClass: [
								'owl-prev tg-btnround tg-btnprev',
								'owl-next tg-btnround tg-btnnext'
							],
					responsive: {
						0: { items:1 },
						480: { items:2 },
						600: { items:3 },
						1000: { items:5 },
						1200: { items:6 },
					}
				});
		}
	},
	CarouselAuthor:{
		render(data){
			data.map(v => {
				$("#tg-authorsslider")
					.append(`<div class="item tg-author">
								<figure><a href="javascript:void(0);" style="background-image: url('/${v.avatar}')"></a></figure>
								<div class="tg-authorcontent">
									<h2><a href="javascript:void(0);">${v.name}</a></h2>  
								</div>
							</div>`)
			})
		},
		init(){
			var _tg_authorsslider = jQuery('#tg-authorsslider');
			_tg_authorsslider.owlCarousel({
				nav: true,
				loop: false,
				dots: true,
				navText: [
							'<i class="icon-chevron-left"></i>',
							'<i class="icon-chevron-right"></i>'
						],
				navClass: [
							'owl-prev tg-btnround tg-btnprev',
							'owl-next tg-btnround tg-btnnext'
						],
				responsive: {
					0: { items:1 },
					600: { items:4 },
					1000: { items:5 },
					1200: { items:6 },
				}
			});
		}
	},
	init(){

	}
};
(() => {
    View.init();
    function init(){
    	getNew();
    	getTrending();
    	getAuthor();
    	// getTopView();

    	// getOrder( )
    }
    async function redirect_logined(url) {
        await delay(1500);
        window.location.replace(url);
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    }
    function getNew(){
    	Api.Product.GetNew()
            .done(res => { 
            	View.CarouselNew.render(res.data) ;
            	View.CarouselNew.init() ;
            })
            .fail(err => {   })
            .always(() => { });
    } 
    function getTrending(){
    	Api.Product.getTrending()
            .done(res => { 
            	View.CarouselTrending.render(res.data) ;
            	View.CarouselTrending.init() ;
            })
            .fail(err => {   })
            .always(() => { });
    } 
    function getAuthor(){
    	Api.Product.getAuthor()
            .done(res => { 
            	View.CarouselAuthor.render(res.data) ;
            	View.CarouselAuthor.init() ;
            })
            .fail(err => {   })
            .always(() => { });
    } 



    function getNewArrivals(){
        Api.Product.NewArrivals()
            .done(res => { 
            	View.Product.New.render(res.data)
            })
            .fail(err => {  })
            .always(() => { });
    }
    function getTopView(){
        Api.Product.TopView()
            .done(res => { 
            	View.Product.TopView.render(res.data)
            })
            .fail(err => {  })
            .always(() => { });
    }

    init();
})();