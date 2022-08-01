const Api = {
    Author: {},



    Category: {},
    Product: {},
    Image: {},
    Warehouse: {},
    Order: {},
    Statistic: {},
    
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
        url: `/apip/author/get`,
        method: 'GET',
    }); 
    Api.Author.Store = (data) => $.ajax({
        url: `/apip/author/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Author.getOne = (id) => $.ajax({
        url: `/apip/author/get-one/${id}`,
        method: 'GET',
    });
    Api.Author.Update = (data) => $.ajax({
        url: `/apip/author/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Author.Delete = (id) => $.ajax({
        url: `/apip/author/delete/${id}`,
        method: 'GET',
    });
})();

//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/apip/category/get`,
        method: 'GET',
    }); 
    Api.Category.Store = (data) => $.ajax({
        url: `/apip/category/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.getOne = (id) => $.ajax({
        url: `/apip/category/get-one/${id}`,
        method: 'GET',
    });
    Api.Category.Update = (data) => $.ajax({
        url: `/apip/category/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.Delete = (id) => $.ajax({
        url: `/apip/category/delete/${id}`,
        method: 'GET',
    });
})();


//Product
(() => {
    Api.Product.GetAll = () => $.ajax({
        url: `/apip/product/get`,
        method: 'GET',
    });
    Api.Product.Store = (data) => $.ajax({
        url: `/apip/product/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    
    Api.Product.getOne = (id) => $.ajax({
        url: `/apip/product/get-one/${id}`,
        method: 'GET',
    });
    Api.Product.Update = (data) => $.ajax({
        url: `/apip/product/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.Delete = (id) => $.ajax({
        url: `/apip/product/delete/${id}`,
        method: 'GET',
    });
    Api.Product.Trending = (id) => $.ajax({
        url: `/apip/product/update-trending`,
        method: 'PUT',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    }); 
})();




//Order
(() => {
    Api.Order.GetAll = (id) => $.ajax({
        url: `/apip/order/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.GetOne = (id) => $.ajax({
        url: `/apip/order/get-one`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.Update = (data) => $.ajax({
        url: `/apip/order/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();
 
// Statistic
(() => {
    Api.Statistic.getTotal = () => $.ajax({
        url: `/apip/statistic/get-total`,
        method: 'GET',
    });
    Api.Statistic.getBestSale = () => $.ajax({
        url: `/apip/statistic/get-best-sale`,
        method: 'GET',
    });
    Api.Statistic.getCustomerBuy = () => $.ajax({
        url: `/apip/statistic/get-customer`,
        method: 'GET',
    });
})();


// Image
(() => {
    Api.Image.Create = (data) => $.ajax({
        url: `/apip/post-image`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();
