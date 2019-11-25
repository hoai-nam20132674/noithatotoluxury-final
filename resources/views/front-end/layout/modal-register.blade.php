<div class="modal fade" id="dangky" tabindex="-1" role="dialog">
	<div class="modal-dialog wrap-modal-login" role="document">
		<div class="text-xs-center">
			<div >
				<div class="row row-noGutter">
					<div class="col-sm-12">
						<div class="content a-center">
							<h5 class="title-modal"><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#dangnhap">Đăng nhập tài khoản</a> <a href="#" class="active">Đăng ký tài khoản mới</a></h5>
							
							<form accept-charset="UTF-8" action="{{URL::route('postAddUserClient')}}" id="customer_register" method="POST">
								{{ csrf_field() }}
								
								<div class="form-signup" >
									
								</div>
								<div class="form-signup a-left clearfix">
									<fieldset class="form-group">
										<label> Họ tên<span class="required">*</span></label>
										<input type="text" class="form-control form-control-lg" value="" name="name" id="firstName"  placeholder="Họ tên*" required >
									</fieldset>
									<fieldset class="form-group">
										<label> Email <span class="required">*</span></label>
										<input type="email" class="form-control form-control-lg" value="" name="email" id="email"  placeholder="Email" required>
									</fieldset>
									<fieldset class="form-group">
										<label> Số điện thoại <span class="required">*</span></label>
										<input type="phone" class="form-control form-control-lg" value="" name="phone" id="phone"  placeholder="Email" required>
									</fieldset>
									<fieldset class="form-group">
										<label> Mật khẩu <span class="required">*</span></label>
										<input type="password" class="form-control form-control-lg password-register" value="" name="password" id="password" placeholder="Mật khẩu*" required >
									</fieldset>
									<fieldset class="form-group">
										<label> Xác thực mật khẩu <span class="required">*</span></label>
										<input type="password" class="form-control form-control-lg cf-password-register" value="" name="confirm-password" id="password" placeholder="Mật khẩu*" required >
									</fieldset>

									<fieldset class="form-group">
										<button type="submit" value="Đăng ký" class="btn btn-primary btn-full check-register">Đăng ký</button>
									</fieldset>


								</div>
							</form>
						
							<div class="link-popup"><p>
								Đã có tài khoản đăng nhập 
								<a href="#" class="margin-top-20" data-dismiss="modal" data-toggle="modal" data-target="#dangnhap">Tại đây</a>
								</p></div>
						</div>
					</div>
					
				</div>

			</div>
		</div>
	</div>
</div>