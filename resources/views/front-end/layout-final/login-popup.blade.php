<div id="login-form-popup" class="lightbox-content mfp-hide">
	<div class="woocommerce-notices-wrapper"></div>
	<div class="account-container lightbox-inner login-form">
		<div class="account-login-inner">
			<h3 class="uppercase">Đăng nhập</h3>
			<form class="woocommerce-form woocommerce-form-login login" action="{{URL::route('clientPostLogin')}}" method="post">
				{{ csrf_field() }}
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username">Tên tài khoản hoặc địa chỉ email&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="username" autocomplete="username" value="" />				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
				</p>

				
				<p class="form-row">
					<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="eaf786fd3b" /><input type="hidden" name="_wp_http_referer" value="/" />					<button type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập">Đăng nhập</button>
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Ghi nhớ mật khẩu</span>
					</label>
				</p>
				<p class="woocommerce-LostPassword lost_password">
					<a href="https://mdbuddy.vn/my-account/lost-password/">Quên mật khẩu?</a>
					<a href="#" class="hide-login" >Chưa có tài khoản</a>
				</p>
			</form>
		</div><!-- .login-inner -->
	</div><!-- .account-login-container -->
	<div class="account-container lightbox-inner register-form">
		<div class="account-login-inner">
			<h3 class="uppercase">Đăng ký</h3>
			<form class="woocommerce-form woocommerce-form-login login" action="{{URL::route('postAddUserClient')}}" method="post">
				{{ csrf_field() }}
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username">Họ tên&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="username" autocomplete="username" value="" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username">Email&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="username" autocomplete="username" value="" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username">Số điện thoại&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="username" autocomplete="username" value="" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password">Xác nhận mật khẩu&nbsp;<span class="required">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="confirm-password" id="password" autocomplete="current-password" />
				</p>

				
				<p class="form-row">
					<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="eaf786fd3b" /><input type="hidden" name="_wp_http_referer" value="/" />					<button type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập">ĐĂNG KÝ</button>
					
				</p>
				<p class="woocommerce-LostPassword lost_password">
					<a href="https://mdbuddy.vn/my-account/lost-password/">Quên mật khẩu?</a>
					<a href="#" class="hide-register" >Đã có tài khoản</a>
				</p>
			</form>
		</div><!-- .login-inner -->
	</div><!-- .account-login-container -->
</div>