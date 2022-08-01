const View = {
    Product: [], 
    table: {
        __generateDTRow(data){ 

            return [
                `<div class="id-order">${data.id}</div>`,
                data.name, 
                `<img src="/${data.image}" alt="" style="width: 100px">`, 
                IndexView.Config.formatPrices(data.prices) + " đ",
                IndexView.Config.formatPrices(data.discount) + " %",
                ` <div class="view-data modal-control" style="cursor: pointer" atr="Delete" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`
            ]
        },
        init(){
            var row_table = [
                    {
                        title: 'ID',
                        name: 'id',
                        orderable: true,
                        width: '5%',
                    },
                    {
                        title: 'Tên',
                        name: 'name',
                        orderable: true,
                        width: '10%',
                    }, 
                    {
                        title: 'Hình ảnh',
                        name: 'name',
                        orderable: true, 
                    }, 
                    {
                        title: 'Đơn giá',
                        name: 'name',
                        orderable: true, 
                    },
                    {
                        title: 'Giảm giá',
                        name: 'name',
                        orderable: true, 
                    },
                    {
                        title: 'Hành động',
                        name: 'Action',
                        orderable: true,
                        width: '10%',
                    },
                ];
            IndexView.table.init("#data-table", row_table);
        }
    }, 
    SideModal: {
        Create: {
            resource: '#side-modal-create',
            setDefaul(){ this.init();  },
            setVal(data){ 
                var resource = this.resource;
                $(resource).find(".product-list option").remove() 
                View.Product.map(v => {
                    $(resource)
                        .find(".product-list")
                        .append(`<option value="${v.id}">${v.name}</option>`)
                }) 
                
            },
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
 
                var data_product           = $(`${resource}`).find('.data-product').val();   
                var data_discount       = $(`${resource}`).find('.data-discount').val();  
 
                if (data_product == '') { required_data.push('Hãy nhập tên.'); onPushData = false } 
                if (data_discount == '') { required_data.push('Hãy nhập giảm giá.'); onPushData = false }  

                if (onPushData) { 
                    fd.append('data_product', data_product);   
                    fd.append('data_discount', data_discount);   

                    return fd;
                }else{
                    $(`${resource}`).find('.error-log .js-errors').remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = View.SideModal.Create.getVal();
                        if (data) callback(data);
                    }
                });
            },
            init(){
                var modalTitleHTML  = `Tạo mới`;
                var modalBodyHTML   = Template.Discount.Create();
                var modalFooterHTML = ['Đóng', 'Tạo mới'];

                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
                IndexView.summerNote.init(".data-detail", "Mô tả đầy đủ", 400);
            }
        },
        Update: {
            resource: '#side-modal-update',
            setDefaul(){ this.init();  },
            setVal(data){ 
                var resource = this.resource; 
                $(resource).find(".category-list option").remove()
                $(resource).find(".author-list option").remove()
                View.Category.map(v => {
                    $(resource)
                        .find(".category-list")
                        .append(`<option value="${v.id}">${v.name}</option>`)
                })
                View.Author.map(v => {
                    $(resource)
                        .find(".author-list")
                        .append(`<option value="${v.id}">${v.name}</option>`)
                })
                $(`${resource} .data-id`).val(data[0].id) 
                $(`${resource}`).find('.data-name').val(data[0].name);  
                $(`${resource}`).find('.data-prices').val(data[0].prices);  
                $(`${resource} .data-category`).val(data[0].category_id);
                $(`${resource} .data-author`).val(data[0].author_id); 
                $(`${resource}`).find('.data-description').val(data[0].description);  
                IndexView.summerNote.update(`${resource} .data-detail`, data[0].detail);
                $(this.resource).find('.form-preview').css({
                    'background-image': `url('/${data[0].image ?? 'icon/noimage.png'}')`
                })
                View.Metadata.setVal(data[0].metadata, resource)
            },
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_id      = $(`${resource}`).find('.data-id').val();
 
                var data_name           = $(`${resource}`).find('.data-name').val();   
                var data_category       = $(`${resource}`).find('.data-category').val(); 
                var data_author         = $(`${resource}`).find('.data-author').val(); 
                var data_prices         = $(`${resource}`).find('.data-prices').val(); 
                var data_description    = $(`${resource}`).find('.data-description').val();
                var data_detail         = $(`${resource}`).find('.data-detail').val();
                var data_image          = $(`${resource}`).find(".data-image")[0].files;  
                var data_meta           = View.Metadata.getVal(resource);

                if (data_name == '') { required_data.push('Hãy nhập tên.'); onPushData = false } 
                if (data_prices == '') { required_data.push('Hãy nhập đơn giá.'); onPushData = false } 
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false } 
                if (data_detail == '') { required_data.push('Nhập mô tả đầy đủ.'); onPushData = false }  

                if (onPushData) { 
                    fd.append('data_id', data_id);  
                    fd.append('data_name', data_name);   
                    fd.append('data_category', data_category);  
                    fd.append('data_author', data_author);  
                    fd.append('data_prices', data_prices);  
                    fd.append('data_description', data_description); 
                    fd.append('data_detail', data_detail); 
                    fd.append('data_image', data_image[0] ?? "null");
                    fd.append('data_meta', data_meta);   

                    return fd;
                }else{
                    $(`${resource}`).find('.error-log .js-errors').remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() { 
                    if($(this).attr('atr').trim() == name) {
                        var data = View.SideModal.Update.getVal();
                        if (data) callback(data);
                    }
                });
            },
            init(){
                var modalTitleHTML  = `Cập nhật`;
                var modalBodyHTML   = Template.Discount.Create();
                var modalFooterHTML = ['Đóng', 'Cập nhật'];

                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
                IndexView.summerNote.init(".data-detail", "Mô tả đầy đủ", 400);
            }
        },
        Delete: {
            resource: '#side-modal-delete',
            setDefaul(){ this.init(); },
            textDefaul(){ },
            setVal(data){ },
            getVal(){
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() {
                    if($(this).attr('atr').trim() == name) {
                        callback($(this).attr('data-id'));
                    }
                });
            },
            init() {
                var modalTitleHTML = `Xóa`;
                var modalBodyHTML  = Template.Discount.Delete();
                var modalFooterHTML = ['Đóng', 'Xóa'];
                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
            }
        },
        init(){
            View.SideModal.Create.init(); 
            View.SideModal.Update.init(); 
            View.SideModal.Delete.init(); 
        }
    },
    init(){
        View.table.init();
        View.SideModal.init();  
    }
};
(() => {
    View.init();


    IndexView.SideModal.onControl("Create", () => {
        var resource = View.SideModal.Create.resource;
        View.SideModal.Create.setDefaul();
        IndexView.SideModal.onShow(resource);
        View.SideModal.Create.setVal();
        View.SideModal.Create.onPush("Push", (fd) => {
            IndexView.helper.showToastProcessing('Processing', 'Đang tạo!');
            IndexView.SideModal.onHide(resource)
            Api.Discount.Store(fd)
                .done(res => {
                    IndexView.helper.showToastSuccess('Success', 'Tạo thành công !');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
            View.SideModal.Create.setDefaul();
        })
    })  

    IndexView.SideModal.onControl("Delete", (id) => {
        var resource = View.SideModal.Delete.resource;
        IndexView.SideModal.onShow(resource);
        View.SideModal.Delete.onPush("Push", () => {
            IndexView.helper.showToastProcessing('Processing', 'Đang xóa!');
            Api.Discount.Delete(id)
                .done(res => {
                    IndexView.helper.showToastSuccess('Success', 'Xóa thành công !');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
                IndexView.SideModal.onHide(resource)
                IndexView.SideModal.Delete.setDefaul();
        })
    }) 

    function init(){
        getData();
    }

    function getData(){
        Api.Discount.GetAll()
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
        Api.Discount.GetNotDiscount()
            .done(res => {
                View.Product = res.data;
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { }); 
    }
    function debounce(f, timeout) {
        let isLock = false;
        let timeoutID = null;
        return function(item) {
            if(!isLock) {
                f(item);
                isLock = true;
            }
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function() {
                isLock = false;
            }, timeout);
        }
    }
    init();
})();
