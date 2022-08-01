const Api = {
    Auth: {},
    Author: {}, 
    Category: {},
    Product: {}, 

};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();


//Author
(() => {
    Api.Author.GetAll = () => $.ajax({
        url: `/customer/apip/author/get`,
        method: 'GET',
    });  
})();

//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/customer/apip/category/get`,
        method: 'GET',
    });  
})();


//Product
(() => {
    Api.Product.GetNew = () => $.ajax({
        url: `/customer/apip/product/get-new`,
        method: 'GET',
    }); 
    Api.Product.getTrending = () => $.ajax({
        url: `/customer/apip/product/get-trending`,
        method: 'GET',
    }); 
    Api.Product.getAuthor = () => $.ajax({
        url: `/customer/apip/product/get-author`,
        method: 'GET',
    }); 
})();

 
//Auth
(() => {
    Api.Auth.Register = (data) => $.ajax({
        url: `/customer/apip/auth/register`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Login = (data) => $.ajax({
        url: `/customer/apip/auth/login`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Forgot = (data) => $.ajax({
        url: `/customer/apip/auth/forgot`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Reset = (data) => $.ajax({
        url: `/customer/apip/auth/reset`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Code = () => $.ajax({
        url: `/customer/apip/auth/code`,
        method: 'POST',
        contentType: false,
        processData: false,
    });
    Api.Auth.Change = (data) => $.ajax({
        url: `/customer/apip/auth/change`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Update = (data) => $.ajax({
        url: `/customer/apip/auth/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.GetProfile = (id) => $.ajax({
        url: `/customer/apip/auth/get-profile`,
        method: 'GET',
    });

})();