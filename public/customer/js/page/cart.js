const View = { 
	Cart: {
		total: 0,
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
		getCart(){
			var cart_data = JSON.parse(`{ "cart": [] }`); 
			$(".shoppingcart-content table tbody")
				.find(".cart_item").each(function(index, el) {
		            cart_data.cart 
		                .push(
		                    JSON.parse(`{ "id": ${$(el).attr("product-id")}, "meta": ${$(el).attr("metadata")}, "qty": ${$(el).attr("qty")}}`)
		                ); 
				});
			return JSON.stringify(cart_data)
		},
		render(data, meta){ 
            var real_prices     = data.discount == 0 ? data.prices : data.prices - (data.prices*data.discount/100);
			$(".shoppingcart-content table tbody")
				.prepend(`<tr class="cart_item" product-id="${data.id}" qty="1" prices="${real_prices}">
                            <td class="product-remove">
                                <a class="remove"><i class="fas fa-times-circle"></i></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="/product/${data.id}-${data.slug}" target="_blank">
                                    <img src="/${data.image}" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" style="width: 100px">
                                </a>
                            </td>
                            <td class="product-name" data-title="Product">
                                <a href="/product/${data.id}-${data.slug}" target="_blank" class="title">${data.name}</a> 
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <div class="control"> 
                                        <input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4"> 
                                    </div>
                                </div>
                            </td>
                            <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount">
                                	${real_prices}
                                </span>
                            </td>
                        </tr>`)
			View.Cart.total += real_prices;
			$(".order-total .total-price").text(`${IndexView.Config.formatPrices(View.Cart.total)} đ`)
		},
		updateCart(){
			var total = 0;
			$(".shoppingcart-content table tbody")
				.find(".cart_item").each(function(index, el) {
					var total_row = +$(el).attr("prices") * +$(el).attr("qty");
					total += total_row;
					$(el).find(".woocommerce-Price-currencySymbol").text(`${IndexView.Config.formatPrices(total_row)} đ`)
				});
			$(".order-total .total-price").text(`${IndexView.Config.formatPrices(total)} đ`)
		},
		init(){
            $(document).on('click', `.product-remove a`, function() {
            	$(this).parent().parent().remove();
            	View.Product.updateCart();
            }); 
            $(document).on('keyup', `.input-qty.qty`, function() {
            	var qty = $(this).val(); 
            	$(this).parent().parent().parent().parent().attr("qty", qty);
            	View.Product.updateCart();
            }); 
            $(document).on('click', `.btn-cart-to-checkout`, function() { 
            	localStorage.setItem("library-cart-data", View.Product.getCart())
            });  
		}
	},
	init(){
		View.Cart.init();
		View.Product.init();
	}
};
(() => {
    View.init();
    function init(){  
        var card        = localStorage.getItem("library-cart");  
        var json_cart = JSON.parse(card);   
        if (json_cart.cart.length == 0) {
            $(".cart-form").css({"display": "none"})
            $(".btn-cart-to-checkout").css({"display": "none"}) 
            $(".page-main-content").prepend(`<h3 class="text-center">カートが空です</h3>`)
        }
        json_cart.cart.map(v => {
        	getOne(v.id, v.meta)
        }) 
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

    function getOne(id, meta){
        Api.Product.getOne(id)
            .done(res => { 
            	View.Product.render(res.data[0], meta)
            })
            .fail(err => {  })
            .always(() => { });
    } 
    init();
})();