const View = {
    Cart: {
        item: [],
        init(){ 
            var card        = localStorage.getItem("library-cart");  
            var json_cart = JSON.parse(card);  
            json_cart.cart.map(v => { 
                View.Cart.item.push(v.id);
            })
        }
    },
	Product: {
		render(data){
            $(".product-list-item .product-item").remove(); 
			data.map(v => { 
                var real_prices     = IndexView.Config.formatPrices(v.discount == 0 ? v.prices : v.prices - (v.prices*v.discount/100));
				$(".product-list-item")
					.append(`<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product-item">
                                <div class="tg-postbook">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img src="/${v.image}" alt="${v.slug}"></div>
                                            <div class="tg-backcover"><img src="/${v.image}" alt="${v.slug}"></div>
                                        </div> 
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="/category?category=${v.category_id}">${v.category_name}</a></li> 
                                        </ul> 
                                        <div class="tg-booktitle">
                                            <h3><a href="/product/${v.id}-${v.slug}">${v.name}</a></h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">${v.author_name}</a></span> 
                                        <span class="tg-bookprice">
                                            ${v.discount == 0 
                                                ?  `<ins>${IndexView.Config.formatPrices(v.prices)+"đ"}</ins>`
                                                :   `<ins>${IndexView.Config.formatPrices(real_prices)} đ </ins>
                                                    <del>${IndexView.Config.formatPrices(v.prices)+"đ"}</del>`}
                                        </span>
                                        <a class="tg-btn tg-btnstyletwo action-add-to-card" atr="Add to card" href="javascript:void(0);" product-id="${v.id}">
                                            ${View.Cart.item.includes(v.id) 
                                                    ? `<i class="fas fa-check"></i>` 
                                                    : `<i class="fa fa-shopping-basket"></i>
                                                        <em>Giỏ hàng</em>`
                                            }  
                                        </a>
                                    </div>
                                </div>
                            </div>`)
			})
		}
	},
	Category: {
		id: 0,
		render(data){
            $(".category-list-tag")
                    .append(`<li class="tag-cloud-link status-tag" status-id="new"><a>新着商品</a> </li>`)
            $(".category-list-tag")
                    .append(`<li class="tag-cloud-link status-tag" status-id="hot"><a>オススメ商品</a> </li>`)
			data.map((v, k) => {
				$(".category-list-tag")
					.append(`<li class="tag-cloud-link category-tag" category-id="${v.id}"><a category-id="${v.id}">${v.name}</a> </li>`)
			})
		},
        onEvent(callback){ 
            $(document).on('click', `.tag-cloud-link.category-tag`, function() {
                $(".category-list-tag .tag-cloud-link").removeClass("active");
                $(this).addClass("active")
                callback($(this).find("a").attr("category-id"))
            }); 
        },
        onStatusEvent(callback){ 
            $(document).on('click', `.tag-cloud-link.status-tag`, function() {
                $(".category-list-tag .tag-cloud-link").removeClass("active");
                $(this).addClass("active")
                console.log($(this).attr("status-id"));
                callback($(this).attr("status-id"))
            }); 
        },
        init(){
            $(".category-list-tag .tag-cloud-link.category-tag").removeClass("active")
            $(`.category-list-tag .tag-cloud-link.category-tag[category-id=${View.Category.id}]`).addClass("active")

            $(".category-list-tag .tag-cloud-link.status-tag").removeClass("active")
            $(`.category-list-tag .tag-cloud-link.status-tag[status-id='${View.URL.get("status") ?? 0}']`).addClass("active")
        }
	},
	SlidesRange: { 
        onStop(callback){ 
            $('.slider-range-price').slider({ 
                    stop : function(e, ui) {
                        callback();   
                    }  
                });
        }
	},
    pagination: {
        page: 1,
        pageSize: 6,
        total: 0,
        onChange(callback) {
            const oThis = View.pagination;
            $(document).on('click', '.pagination .page-numbers:not(.disabled, .active)', function () {
                const page = $(this).attr("atr");
                let nextPage = null;
                if (page.match(/Next/g)) {
                    nextPage = oThis.page + 1;
                }
                else if (page.match(/Back/g)) {
                    nextPage = oThis.page - 1;
                }
                else {
                    nextPage = +page;
                }
                // callback first
                callback(+nextPage);
                // page change after
                oThis.page = +nextPage;

            });
        },
        length(){
            return Math.ceil(this.total / this.pageSize);
        },
        render() {
            const paginationHTML = generatePagination(this.page, Math.ceil(this.total / this.pageSize));
            if($('.pagination.clearfix.style3').length) {
                $('.pagination.clearfix.style3').remove();
            }
            $('.pagination-navigation').append(paginationHTML);
            const startEntry = this.pageSize * (this.page - 1) + 1;
            const lastEntry = Math.min(this.pageSize * this.page, this.total);
        }
    },
    URL: {
        setURL(filters){
            const param     = (new URLSearchParams({ ...filters })).toString();
            window.history.pushState('','', '?' + param);
        },
        getFilterURL(){
            // lấy ra url và trả về chuỗi filter tương ứng
            var urlParam    = new URLSearchParams(window.location.search); 
            return filters  = {
                keyword:      View.Keyword ?? '',
                category:     View.Category.id ?? '0',
                sort:         urlParam.get('sort') ?? $(".sort-by").val(),
                status:       urlParam.get('status') ?? '', 
                page:         View.pagination.page ?? '1',
            };
        }, 
        set(item){
            const pageState = item;
            const param     = (new URLSearchParams({ ...pageState })).toString();
            window.history.pushState('','', '?' + param);
        },
        get(id){
            var urlParam    = new URLSearchParams(window.location.search);
            return urlParam.get(id)
        }
    },
    Sort:{
        onChange(callback){
            $(document).on('change', `.sort-by`, function() { 
                callback($(this).val())
            });
        }
    },
    Layout: {
        onChange(){
            $(".grid-view-mode .modes-mode").on("click", function(){
                $(".grid-view-mode .modes-mode").removeClass("active");
                $(this).addClass("active");
                var control = $(this).attr("atr");
                $(".list-products").removeClass("active");
                $(`.list-products[option-control=${control}]`).addClass("active");
            })
        }
    },
	init(){ 
        View.Layout.onChange();
        View.Cart.init();
	}
};
(() => {
    View.init();
    function init(){
        View.Category.id = View.URL.get("category") 
    	View.URL.setURL(View.URL.getFilterURL())
    	getCategory();
    	getData();
        new Promise(() => {
            setTimeout(() => {
                View.Category.init();
            }, 1000);
        });
        
    	// getOrder( )
    }
    async function redirect_logined(url) {
        await delay(1500);
        window.location.replace(url);
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

    View.Sort.onChange(() => {
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.set({'sort': $(".sort-by").val()}); 
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    })

    View.Category.onEvent((id) => {
        View.Category.id = id;
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.set({'status': 0, 'sort': 0}); 
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    }) 
    View.Category.onStatusEvent((tag) => {
        View.Category.id = 0;
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.set({'status': tag, 'sort': 0}); 
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    }) 


    View.pagination.onChange((page) => {
        View.pagination.page = +page;
        View.pagination.render();
        View.URL.setURL(View.URL.getFilterURL()) 
        getData()
    })
 
    View.SlidesRange.onStop(() => {
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.setURL(View.URL.getFilterURL()) 
        getData()
    });

    function getData(){ 
        Api.Product.GetAll(View.URL.getFilterURL())
            .done(res => {  
                View.Product.render(res.data.data)
                View.pagination.total = res.data.count;
                View.pagination.render();
                $(".category-data-total").text(`Tổng: ${res.data.count}`)
            })
            .fail(err => {  })
            .always(() => { });
    }

    function getCategory(){
        Api.Category.GetAll()
            .done(res => { 
                View.Category.render(res.data); 
            })
            .fail(err => {  })
            .always(() => { });
    }

    init();
})();