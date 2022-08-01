const IndexView = { 
    Category: {
        render(data){
            data.map(v => {
                $(".category-list")
                    .append(`<li> <a href="/category?category=${v.id}" aria-controls="biography">${v.name}</a> </li>`)
            })
        }
    },
    onSearch(callback){
        $(document).on('keyup', '.search-input-wrapper', function() {
            $('.suggest-list .suggess-wrapper').remove()
            var data_text = $(this).val();   
            var fd = new FormData();
            fd.append('data_text', data_text); 
            if (data_text) callback(fd, data_text);
        });

        $(document).mouseup(function(e) {
            var container = $(".searchProduct");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.suggest-list .suggess-wrapper').remove()
            }
        });
    }, 
    Config: {
        onNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
        isEmail(email){
            return email.match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ );
        },
        formatPrices(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        toNoTag(string){
            return string.replace(/(<([^>]+)>)/ig, "");
        },
        toRemoveStringTag(string){
            return string.replace(/(<([^>]+)>(.*?)<\/([^>]+)>)/ig, ""); 
        },
        onPricesKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
    }, 
    Cart: { 
        add_to_card(name, callback){
            $(document).on('click', `.action-add-to-card`, function() {
                if($(this).attr('atr').trim() == name) {
                    callback($(this));
                }
            });
        },
        update(){
            var card = localStorage.getItem("library-cart"); 
            var json_cart = JSON.parse(card);   
            $("#tg-minicart .tg-themebadge").html(json_cart.cart.length) 
        }
    },
    init(){
        $(document).on('keypress', `.number-type`, function(event) {
            return IndexView.Config.onNumberKey(event);
        });
    }
};
(() => {
    IndexView.init();
    if (localStorage.getItem("library-cart") == null) {localStorage.setItem("library-cart", `{ "cart": [] }`)}
    IndexView.Cart.update();

    IndexView.Cart.add_to_card("Add to card", (item) => {
        var card        = localStorage.getItem("library-cart"); 
        var product_id     = item.attr("product-id"); 
        var json_cart = JSON.parse(card);  

        // Kiểm tra sản phẩm đã có trong giở hàng
        var has_in_cart = false;
        json_cart.cart.map(v => { 
            if (v.id == product_id) {
                has_in_cart = true;
            }
        })

        if (!has_in_cart) {
            json_cart.cart 
                .push(
                    JSON.parse(`{ "id": ${product_id}, "size": 1}`)
                );
            localStorage.setItem("library-cart", JSON.stringify(json_cart));

        } else{
            console.log("%cProduct inside Cart", "color: #f00");
        }
        item.html(`<i class="fas fa-check"></i>`)
        IndexView.Cart.update();
    })

    IndexView.onSearch((fd, text) => {
        Api.Product.GetSearch(fd)
            .done(res => { 
                $('.suggest-list .suggess-wrapper').remove()
                $('.suggest-list')
                    .append(`<div class="suggess-wrapper"></div>`)
                if (res.data.length > 0) {
                    res.data.map(v => {
                        $(".suggess-wrapper").append(`<div class="suggess-item"><a title="${v.name}" href="/product/${v.id}-${v.slug}">${highlight(text, v.name)}</a></div>`)
                    })
                }else{
                    $(".suggess-wrapper").append(`<div class="suggess-item">No resurt</div>`)
                }
            })
    })
    function getCart(){
        if (IndexView.Auth.isLogin()) {
            Api.Cart.GetCart()
                .done(res => { 
                    if (res.status == 200) {
                        var cart = localStorage.getItem("card") == null ? [] : localStorage.getItem("card").split(","); 
                        if (res.data.cart != null) {
                            res.data.cart.split(",").map(v => {
                                cart.includes(v) ? "" : cart.push(v);
                            })
                            localStorage.setItem("card", cart);
                        }
                        updateCartUser();
                    }else{
                        redirect_logined(res.data, 1000)
                    }
                })
        }
    }
    function updateCartUser(){
        var cart = localStorage.getItem("card");
        if (cart != null) {
            var fd = new FormData();
            fd.append('cart', cart); 
            Api.Cart.Update(fd)
                .done(res => {
                    IndexView.Cart.update();
                })
                .fail(err => {  })
                .always(() => { });
        }
    }
    function init(){
        getCategory()
    }
    function getCategory(){
        Api.Category.GetAll()
            .done(res => {  
                IndexView.Category.render(res.data)
            })
            .fail(err => {  })
            .always(() => { });
    }
    init();
})();