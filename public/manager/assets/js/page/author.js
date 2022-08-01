const View = {
    Category: [],
    table: {
        __generateDTRow(data){ 

            return [
                `<div class="id-order">${data.id}</div>`,
                data.name,
                `<img src="/${data.avatar}" alt="" style="width: 100px">`,
                data.description, 
                `<div class="view-data modal-control" style="cursor: pointer" atr="View" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>
                <div class="view-data modal-control" style="cursor: pointer" atr="Delete" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`
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
                        width: '20%',
                    }, 
                    {
                        title: 'Mô tả ngắn',
                        name: 'icon',
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
            setVal(data){   },
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
 
                var data_name           = $(`${resource}`).find('.data-name').val();    
                var data_description    = $(`${resource}`).find('.data-description').val();  
                var data_image          = $(`${resource}`).find(".data-image")[0].files;
 
                if (data_name == '') { required_data.push('Hãy nhập tên.'); onPushData = false } 
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }  
                if (data_image.length <= 0) { required_data.push('Hãy chọn ảnh.'); onPushData = false } 

                if (onPushData) { 
                    fd.append('data_name', data_name);    
                    fd.append('data_description', data_description); 
                    fd.append('data_image', data_image[0]);
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
                var modalBodyHTML   = Template.Author.Create();
                var modalFooterHTML = ['Đóng', 'Tạo mới']; 
                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML); 
            }
        },
        Update: {
            resource: '#side-modal-update',
            setDefaul(){ this.init();  },
            setVal(data){  
                var resource = this.resource;  
                $(`${resource}`).find('.data-id').val(data[0].id); 
                $(`${resource}`).find('.data-name').val(data[0].name); 
                $(`${resource}`).find('.data-description').val(data[0].description); 
                $(this.resource).find('.form-preview').css({
                    'background-image': `url('/${data[0].avatar ?? 'icon/noimage.png'}')`
                })
            },
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_id      = $(`${resource}`).find('.data-id').val();
 
                var data_name           = $(`${resource}`).find('.data-name').val();    
                var data_description    = $(`${resource}`).find('.data-description').val(); 
                var data_image          = $(`${resource}`).find(".data-image")[0].files;
 
                if (data_name == '') { required_data.push('Hãy nhập tên.'); onPushData = false } 
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }   

                if (onPushData) {
                    fd.append('data_id', data_id);  
                    fd.append('data_name', data_name);    
                    fd.append('data_description', data_description); 
                    fd.append('data_image', data_image[0] ?? "null");
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
                var modalBodyHTML   = Template.Author.Create();
                var modalFooterHTML = ['Đóng', 'Cập nhật'];

                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML); 
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
                var modalBodyHTML  = Template.Author.Delete();
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

        View.SideModal.Create.onPush("Push", (fd) => {
            IndexView.helper.showToastProcessing('Processing', 'Đang tạo!');
            IndexView.SideModal.onHide(resource)
            Api.Author.Store(fd)
                .done(res => {
                    IndexView.helper.showToastSuccess('Success', 'Tạo thành công !');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
            View.SideModal.Create.setDefaul();
        })
    }) 
    IndexView.SideModal.onControl("View", (id) => {
        var resource = View.SideModal.Update.resource; 
        Api.Author.getOne(id)
            .done(res => { 
                View.SideModal.Update.setVal(res.data); 
                IndexView.SideModal.onShow(resource);
                View.SideModal.Update.onPush("Push", (fd) => {
                    IndexView.helper.showToastProcessing('Processing', 'Đang cập nhật!');
                    Api.Author.Update(fd)
                        .done(res => {
                            IndexView.helper.showToastSuccess('Success', 'Cập nhật thành công !');
                            getData();
                        })
                        .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                        .always(() => { });
                        IndexView.SideModal.onHide(resource)
                        View.SideModal.Update.setDefaul();
                })
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { }); 
    }) 
    IndexView.SideModal.onControl("Delete", (id) => {
        var resource = View.SideModal.Delete.resource;
        IndexView.SideModal.onShow(resource);
        View.SideModal.Delete.onPush("Push", () => {
            IndexView.helper.showToastProcessing('Processing', 'Đang xóa!');
            Api.Author.Delete(id)
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
        IndexView.helper.showToastProcessing('Process', 'Đang lấy dữ liệu');
        Api.Author.GetAll()
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
                IndexView.helper.showToastSuccess('Success', 'Lấy dữ liệu thành công');
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { }); 
    } 
    init();
})();
