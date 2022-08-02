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
    Order: {
        getVal(){
            var resource = '.cart-form-data';
            var fd = new FormData();
            var required_data = [];
            var onPushData = true;

            var data_id      = $(`${resource}`).find('.data-id').val(); 
            var data_name      = $(`${resource}`).find('.data-name').val(); 
            var data_email      = $(`${resource}`).find('.data-email').val(); 
            var data_phone      = $(`${resource}`).find('.data-phone').val(); 
            var data_address      = $(`${resource}`).find('.data-address').val();   

            $(`${resource}`).find('.error-log .js-errors').remove();

            if (IndexView.Config.isEmail(data_email) == null) { 
                if (data_email == '') { 
                    required_data.push('Email is required.'); onPushData = false 
                }else{
                    required_data.push('Email is invalid.'); onPushData = false 
                }
            }
            if (data_address == '') { required_data.push('Address is required.'); onPushData = false }
            if (data_phone == '') { required_data.push('Phone is required.'); onPushData = false }
            if (data_name == '') { required_data.push('Name is required.'); onPushData = false } 
            
            if (onPushData) {
                fd.append('data_id', data_id);
                fd.append('data_name', IndexView.Config.toNoTag(data_name));
                fd.append('data_email', IndexView.Config.toNoTag(data_email));
                fd.append('data_phone', IndexView.Config.toNoTag(data_phone));
                fd.append('data_address', IndexView.Config.toNoTag(data_address)); 
                fd.append('metadata', localStorage.getItem("library-cart"));

                return fd;
            }else{
                $(`${resource}`).find('.error-log .js-errors').remove();
                var required_noti = ``;
                for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                return false;
            }
        },
        onPush(callback){
            $(document).on('click', `.button-payment`, function() {
                var data = View.Order.getVal();
                if (data) callback(data);
            });
        },
    }, 
    response: { 
        success(message){
            $(".error-log .js-response").remove();
            $(".error-log").prepend(`<div class="js-response js-success"><li>${message}</li></div>`)
            setTimeout(function () {
                $('.error-log .js-response').remove();
            }, 5000);
        },
        error(message){
            $(".error-log .js-response").remove();
            $(".error-log").prepend(`<div class="js-response js-errors"><li>${message}</li></div>`)
            setTimeout(function () {
                $('.error-log .js-response').remove();
            }, 5000);
        },                  
    },
	init(){

	}
};
(() => {
    View.init();
    function init(){   
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
    View.Order.onPush((fd) => {
        Api.Order.Checkout(fd)
            .done(res => {
                if (res.status == 200) {
                    // View.response.success(res.message)
                    // localStorage.removeItem("library-cart");
                    // localStorage.removeItem("library-cart-data");
                    // redirect_logined(res.data)
                }else if (res.status == 201) {
                    // View.response.success(res.message)
                    // localStorage.removeItem("library-cart"); 
                    // localStorage.removeItem("library-cart-data");
                    // redirect_logined("/")
                }else{
                    View.response.error(res.message)
                }
            })
            .fail(err => {  })
            .always(() => { });
    }) 
    init();
})();