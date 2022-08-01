const View = {
    Auth: {
        Register: {
            resource: "#signup",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var regexp = /[\u{3000}-\u{301C}\u{30A1}-\u{30F6}\u{30FB}-\u{30FE}]/mu;
  
                var data_name         = $(`${resource}`).find('.data-name').val(); 
                var data_address       = $(`${resource}`).find('.data-address').val(); 
                var data_telephone      = $(`${resource}`).find('.data-telephone').val();  
                var data_email              = $(`${resource}`).find('.data-email').val();  
                var data_password           = $(`${resource}`).find('.data-password').val();   
 
                if (data_name == '') { required_data.push('Name is required.'); onPushData = false }
                if (data_address == '') { required_data.push('Address City is required.'); onPushData = false }
                if (data_telephone == '') { required_data.push('Telephone is required.'); onPushData = false } 
                if (data_password == '') { required_data.push('Password is required.'); onPushData = false } 
                if (IndexView.Config.isEmail(data_email) == null) { 
                    if (data_email == '') { 
                        required_data.push('Email is required.'); onPushData = false 
                    }else{
                        required_data.push('Email is invalid.'); onPushData = false 
                    }
                } 

                if (onPushData) {
                    fd.append('data_name', IndexView.Config.toNoTag(data_name));
                    fd.append('data_address', IndexView.Config.toNoTag(data_address));
                    fd.append('data_telephone', IndexView.Config.toNoTag(data_telephone));
                    fd.append('data_password', IndexView.Config.toNoTag(data_password));
                    fd.append('data_email', IndexView.Config.toNoTag(data_email)); 

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
                        var data = View.Auth.Register.getVal();
                        if (data) callback(resource, data); 
                    }
                });
            },
            init(){
                $(document).on('keypress', `.data-phone`, function(event) {
                    return View.Config.onNumberKey(event);
                });
            }
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
            View.Auth.Register.init()
        }
    }, 
    init(){ 

    }
};
(() => {
    View.init()
    function init(){  

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
    View.Auth.Register.onPush("Register", (resource, fd) => {
        $(".js-validate .js-response").remove();
        
        Api.Auth.Register(fd)
            .done(res => {   
                if (res.status == 500) {   
                    View.Auth.response.error(resource, res.message); 
                }else{
                    View.Auth.response.success(resource, res.message) 
                    redirect_logined(res.data, 1000)
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
    init()
})();
