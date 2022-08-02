const IndexView = { 
    Auth: {
        isLogin(){
            return $("#auth-value").val() == 1 ? true : false;
        }, 
        Login: {
            resource: "#login",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_email              = $(`${resource}`).find('.data-email').val();
                var data_password           = $(`${resource}`).find('.data-password').val(); 

                if (IndexView.Config.isEmail(data_email) == null) { 
                    if (data_email == '') { 
                        required_data.push('Email is required.'); onPushData = false 
                    }else{
                        required_data.push('Email is invalid.'); onPushData = false 
                    }
                }
                if (data_password == '') { required_data.push('Password is required.'); onPushData = false }

                if (onPushData) {
                    fd.append('data_email', data_email);
                    fd.append('data_password', data_password);  
                    return fd;
                }else{ 
                    var required_noti = ``;
                    $(`${resource} .js-errors`).remove()
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = IndexView.Auth.Login.getVal();
                        if (data) callback(resource, data); 
                    }
                });
            },
            init(){
                $(document).on('keypress', `.data-phone`, function(event) {
                    return IndexView.Config.onNumberKey(event);
                });
            }
        },
        Forgot: {
            resource: "#forgotPassword",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                var data_email              = $(`${resource}`).find('.data-email').val(); 
                if (IndexView.Config.isEmail(data_email) == null || data_email == '')  onPushData = false;  
                if (onPushData) {
                    fd.append('data_email', data_email); 
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = IndexView.Auth.Forgot.getVal();
                        if (data) callback(data); 
                    }
                });
            },
        },
        Reset: {
            resource: "#forgotPassword",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                var data_email              = $(`${resource}`).find('.data-email').val(); 
                var data_password              = $(`${resource}`).find('.data-password').val();
                var data_code              = $(`${resource}`).find('.data-code').val();
                if (IndexView.Config.isEmail(data_email) == null || data_email == '')  onPushData = false;  
                if (data_password == "")  onPushData = false; 
                if (data_code == "")  onPushData = false; 

                if (onPushData) {
                    fd.append('data_email', data_email); 
                    fd.append('data_password', data_password); 
                    fd.append('data_code', data_code); 
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = IndexView.Auth.Reset.getVal();
                        if (data) callback(data); 
                    }
                });
            },
        },
        response: { 
            success(resource, message){
                $(resource).find(".js-validate .js-response").remove();
                $(resource).find(".js-validate").prepend(`<div class="js-response js-success"><li>${message}</li></div>`)
            },
            error(resource, message){
                $(resource).find(".js-validate .js-response").remove();
                $(resource).find(".js-validate").prepend(`<div class="js-response js-errors"><li>${message}</li></div>`)
            },                  
        },
        init(){
            IndexView.Auth.Register.init()
        }
    }, 
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
            var container = $(".tg-searchbox");
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
    function highlight(text, inputText) {
        var index = inputText.toLowerCase().indexOf(text.toLowerCase());
        inputText = inputText.substring(0,index) + "<span class='highlight'>" + inputText.substring(index,index+text.length) + "</span>" + inputText.substring(index + text.length);
        return inputText 
    } 
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
    async function redirect_logined(url, time) {
        await delay(time);
        window.location.replace(url);
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    }
    IndexView.Auth.Login.onPush("Login", (resource, fd) => {
        Api.Auth.Login(fd)
            .done(res => {  
                if (res.status == 500) {
                    IndexView.Auth.response.error(resource, res.message); 
                }else{
                    IndexView.Auth.response.success(resource, res.message) ;
                    redirect_logined(res.data, 1000)
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
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