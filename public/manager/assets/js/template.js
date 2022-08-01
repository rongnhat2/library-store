const Template = {
	Author: {
		Create(){
			return `<div class="error-log"></div>
					<input type="hidden" class="form-control data-id" required="">
                    <div class="form-group">
                        <input type="file" class="form-control image-input data-image" id="image" name="image"  accept="image/*" >
                        <div class="form-preview image-preview"> </div>
                    </div> 
					<div class="form-group">
                        <label >Tên tác giả <span class="data-name-return"></span></label>
                        <input type="text" class="form-control data-name" placeholder="Tên tác giả">
                    </div> 
					<div class="form-group">
                        <label >Mô tả ngắn <span class="data-name-return"></span></label>
                        <textarea type="text" class="form-control data-description" placeholder="Mô tả ngắn"></textarea>
                    </div> `
		}, 
		Delete(){
			return `<div class="wrapper d-flex justify-center"><img src="/manager/images_global/funny.gif" alt=""></div>`
		}
	},
	Category: {
		Create(){
			return `<div class="error-log"></div>
					<input type="hidden" class="form-control data-id" required="">
					<div class="form-group">
                        <label >Tên danh mục <span class="data-name-return"></span></label>
                        <input type="text" class="form-control data-name" placeholder="Tên danh mục">
                    </div> `
		}, 
		Delete(){
			return `<div class="wrapper d-flex justify-center"><img src="/manager/images_global/funny.gif" alt=""></div>`
		}
	},
	Product: {
		Create(){
			return `<input type="hidden" class="form-control data-id" required="">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="error-log"></div>
                            <div class="form-group">
                                <label >Tên sản phẩm *</label>
                                <input type="text" class="form-control data-name" placeholder="Tên sản phẩm">
                            </div>    
                            <div class="form-group">
                                <label >Đơn giá *</label>
                                <input type="text" class="form-control data-prices number-type" placeholder="Đơn giá">
                            </div>    
                            <div class="form-group">
                                <label >Tác giả *</label>
                                <select name="" class="form-control author-list data-author"></select> 
                            </div>    
                            <div class="form-group">
                                <label >Danh mục *</label>
                                <select name="" class="form-control category-list data-category"></select> 
                            </div>    
                            <div class="form-group">
                                <label >Mô tả ngắn <span class="data-description-return"></span></label>
                                <textarea class="form-control data-description " name="description" placeholder="Mô tả ngắn" rows="4" required=""></textarea>
                            </div>   
                            <div class="form-group summernote">
                                <label >Mô tả đầy đủ </label>
                                <textarea class="form-control data-detail " name="detail" placeholder="Mô tả đầy đủ" rows="4" required=""></textarea>
                            </div>   
						</div> 
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 border-left">  
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">  
			                    <div class="form-group">
			                        <input type="file" class="form-control image-input data-image" id="image" name="image"  accept="image/*" >
			                        <div class="form-preview image-preview"> </div>
			                    </div> 
                            </div>  
                            <div class="form-group">
                                <label >Số trang</label>
                                <input type="text" class="form-control data-count number-type" placeholder="Số trang">
                            </div>    
                            <div class="form-group">
                                <label >Kích thước</label>
                                <input type="text" class="form-control data-size" placeholder="Kích thước">
                            </div>    
                            <div class="form-group">
                                <label >Ngày xuất bản</label>
                                <input type="date" class="form-control data-date">
                            </div>    
                            <div class="form-group">
                                <label >Ngôn ngữ</label>
                                <input type="text" class="form-control data-language" placeholder="Ngôn ngữ">
                            </div>    
						</div>
	            	</div>`
		},  
		Delete(){
			return `<div class="wrapper d-flex justify-center"><img src="/manager/images_global/funny.gif" alt=""></div>`
		}
	},
	Warehouse: {
		Create(){
			return `<div class="row warehouse-modal">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">
							<div class="card">
								<div class="card-body">
									<div class="item-list">

									</div>
									<button type="button" class="btn btn-success item-create" atr="Item Create">Tạo mới</button>
								</div>
							</div>
						</div>
	            	</div>`
		},
		Update(){
			return `<div class="row warehouse-modal">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">
							<table class="table table-bordered sub-warehouse">
							    <thead>
							      <tr>
							        <th>Tên sản phẩm</th>
							        <th>Số lượng</th>
							        <th>Đơn giá nhập</th>
							        <th>Thành tiền</th>
							      </tr>
							    </thead>
							    <tbody> 
							    </tbody>
							  </table>
						</div>
	            	</div>`
		},

	},
	Order: {
		Update(){
			return `<div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="d-md-flex align-items-center">
                                            <div class="text-center text-sm-left ">
                                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                                    <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                                <h2 class="m-b-5 customer-name"></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="d-md-block d-none border-left col-1"></div>
                                            <div class="col">
                                                <ul class="list-unstyled m-t-10">
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                            <span>Email: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold customer-email"> </p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                            <span>Điện thoại: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold customer-telephone"></p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                            <span>Địa chỉ: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold customer-address"></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body ">
										<table class="table table-bordered">
									    	<thead>
									      		<tr>
											        <th>Mã</th>
											        <th>Tên sản phẩm</th>
											        <th>Số lượng</th>
											        <th>Đơn giá</th>
											        <th>Giảm giá</th>
											        <th>Thành tiền</th>
											        <th>Kho</th>
											        <th>Yêu cầu</th>
									      		</tr>
									    	</thead>
										    <tbody class="data-list"> 
										    </tbody>
									  	</table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                    	<select name="" id="" class="form-control order-status">
                                    		<option value="0">Chờ xử lí</option>
                                    		<option value="1">Chưa hoàn thiện</option>
                                    		<option value="2">Đã hoàn thiện</option>
                                    		<option value="3">Đã giao hàng</option>
                                    		<option value="4">Hoàn trả</option>
                                    	</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
		}
	}
}