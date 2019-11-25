<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog">
	<div class="modal-dialog wrap-modal-login" role="document">
		<div class="text-xs-center">
			<div id="login">
				<div class="row row-noGutter">
					<div class="col-sm-12">
						<div class="content a-center">
							<h5 class="title-modal"><a class="active" href="#">Đăng nhập tài khoản</a> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#dangky">Đăng ký tài khoản mới</a></h5>

							<form accept-charset="UTF-8" action="{{URL::route('clientPostLogin')}}" id="customer_login" method="POST">
								{{ csrf_field() }}
								<input name="FormType" type="hidden" value="customer_login" />
								<input name="utf8" type="hidden" value="true" />
								<div class="form-signup" >
									
								</div>
								<div class="form-signup a-left clearfix">
									<fieldset class="form-group">
										<label> Email <span class="required">*</span></label>
										<input type="email" class="form-control form-control-lg" value="" name="email" id="customer_email" placeholder="Nhập Email" required>
									</fieldset>
									<fieldset class="form-group">
										<label> Mật khẩu<span class="required">*</span></label>
										<input type="password" class="form-control form-control-lg" value="" name="password" id="customer_password" placeholder="Nhập mật khẩu*" required>
									</fieldset>
									<div class="a-center">
										<p class="margin-bottom-15"><a href="#" class="btn-link-style btn-link-style-active" onclick="showRecoverPasswordForm();return false;">Quên mật khẩu ?</a></p>
										<!-- <a href="/account/register" class="btn-link-style">Đăng ký tài khoản mới</a> -->
									</div>
									<fieldset class="form-group">
										<input class="btn btn-primary btn-full" type="submit" value="Đăng nhập" />
									</fieldset>	


								</div>

								<div id="social_login_widget"></div>
								<div class="link-popup"><p>
									Chưa có tài khoản đăng ký 
									<a href="#" class="margin-top-20" data-dismiss="modal" data-toggle="modal" data-target="#dangky">Tại đây</a>
									</p>
								</div>
							</form>
						</div>

					</div>

				</div>

			</div>

			<div id="recover-password" class="form-signup" style="display: none">
				<div class="row row-noGutter">
					<div class="col-sm-12">
						<div class="content a-center">

							<h5 class="title-modal"><a class="active" href="#">Lấy lại mật khẩu</a></h5>
							<p>Chúng tôi sẽ gửi thông tin lấy lại mật khẩu vào email đăng ký tài khoản của bạn</p>

							<form accept-charset="UTF-8" action="/account/recover" id="recover_customer_password" method="post">
								<input name="FormType" type="hidden" value="recover_customer_password" />
								<input name="utf8" type="hidden" value="true" />
								<div class="form-signup" >
									
								</div>
								<div class="form-signup clearfix">
									<fieldset class="form-group">
										<input type="email" class="form-control form-control-lg" value="" name="Email" id="recover-email" placeholder="Email*" required>
									</fieldset>
								</div>
								<div class="action_bottom">
									<input class="btn btn-primary btn-full" type="submit" value="Gửi" />
									<a href="#" class="margin-top-10 btn  btn-full btn-dark btn-style-active btn-recover-cancel" onclick="hideRecoverPasswordForm();return false;">Hủy</a>
								</div>
							</form>
							<div ><p>Chào mừng bạn đến với <a href="/">BKMART</a></p></div>
						</div>
					</div>

				</div>

			</div>

			

		</div>
	</div>
</div>