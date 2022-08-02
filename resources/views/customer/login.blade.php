@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')  

	<div class="main-content main-content-login">
		<div class="container"> 
			<div class="row">
				<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main"> 
						<div class="customer_login">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="login-item" id="login">
										<h5 class="title-login">Đăng nhập</h5>
										<div class="login js-validate"> 
											<p class="form-row form-row-wide">
												<label class="text">Email</label>
												<input title="username" type="text" class="input-text data-email">
											</p>
											<p class="form-row form-row-wide">
												<label class="text">Mật khẩu</label>
												<input title="password" type="password" class="input-text data-password">
											</p>
											<p class="lost_password"> 
												<a href="#" class="forgot-pw">Quên mật khẩu</a>
											</p>
											<p class="form-row">
												<button type="button" class="button-submit form-submit" atr="Login">Đăng nhập</button>  
												<a href="{{ route("customer.view.register") }}" type="button" class="btn-auth-action register-button" atr="Login">Đăng kí</a>  
											</p>
										</div>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()

@section('sub_layout')

@endsection()


@section('js')

@endsection()