@extends('front-end.layout-final.default')
@section('content')
	<main id="main" class="">


	
<div class="checkout-page-title page-title">
	<div class="page-title-inner flex-row medium-flex-wrap container">
	  <div class="flex-col flex-grow medium-text-center">
  	 	 <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
    	   <a href="https://mdbuddy.vn/cart/" class="hide-for-small">Chọn sản phẩm</a>
    	   <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
    	   <a href="https://mdbuddy.vn/checkout/" class="current">Thông tin thanh toán</a>
    	   <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
    	   <a href="#" class="no-click hide-for-small">Hoàn thành</a>
		 </nav>
	  </div><!-- .flex-left -->
	</div><!-- flex-row -->
</div><!-- .page-title -->
<div class="cart-container container page-wrapper page-checkout"><div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>
<div class="woocommerce-form-coupon-toggle">
	
	<div class="woocommerce-info message-wrapper">
     <div class="message-container container medium-text-center">
  	   Bạn có mã ưu đãi? <a href="#" class="showcoupon">Ấn vào đây để nhập mã</a>     </div>
	</div>
</div>
@if( count($errors) > 0)
	<div id="alert-error" class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif
@if( Session::has('flash_message'))
    <div style="display: none;" id="alert-success" class="alert alert-{{ Session::get('flash_level')}}">
        {{ Session::get('flash_message')}}
    </div>
@endif
<form class="checkout_coupon woocommerce-form-coupon has-border is-dashed" method="post" style="display:none">

	<p>Nếu bạn có mã giảm giá, vui lòng điền vào phía bên dưới.</p>
	<div class="coupon">
		<div class="flex-row medium-flex-wrap">
			<div class="flex-col flex-grow">
				<input type="text" name="coupon_code" class="input-text" placeholder="Mã ưu đãi" id="coupon_code" value="">
			</div>
			<div class="flex-col">
				<button type="submit" class="button expand" name="apply_coupon" value="Áp dụng">Áp dụng</button>
			</div>
		</div><!-- row -->
	</div><!-- coupon -->
</form>
<div class="woocommerce-notices-wrapper"></div>

<form name="checkout" method="post" class="checkout woocommerce-checkout " action="{{URL::route('postAddOrder')}}" enctype="multipart/form-data" novalidate="novalidate">
	<input type="hidden" name="_token" value="{{ csrf_token()}}">

	<div class="row pt-0 ">
  	<div class="large-7 col  ">
    
  		
  		<div id="customer_details">
  			<div class="clear">
  				<div class="woocommerce-billing-fields">
	
		<h3>Thanh toán và giao hàng</h3>

	
	
		<div class="woocommerce-billing-fields__field-wrapper">
			<p class="form-row form-row-wide validate-required" id="billing_first_name_field" data-priority="10">
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="name" id="billing_first_name" placeholder="Họ và tên" required value="" autocomplete="given-name">
				</span>
			</p>
			<p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="20">
				<span class="woocommerce-input-wrapper">
					<input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="Số điện thoại" required value="" autocomplete="tel">
				</span>
			</p>
			<p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="30">
				<span class="woocommerce-input-wrapper">
					<input type="email" class="input-text " name="email" id="billing_email" placeholder="Địa chỉ email" value="" required autocomplete="email username">
				</span>
			</p>
			<p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="30">
				<span class="woocommerce-input-wrapper">
					<input type="email" class="input-text " name="address" id="billing_email" placeholder="Địa chỉ giao hàng" value="" autocomplete="email username">
				</span>
			</p>
		</div>

	</div>

  			</div>
  			<div class="clear">
  				<div class="woocommerce-shipping-fields">
	</div>
<div class="woocommerce-additional-fields">
	
	
		
			<h3>Thông tin bổ sung</h3>

		
		<div class="woocommerce-additional-fields__field-wrapper">
							<p class="form-row notes" id="order_comments_field" data-priority="10"><label for="order_comments" class="">Ghi chú đơn hàng&nbsp;<span class="optional">(tuỳ chọn)</span></label><span class="woocommerce-input-wrapper"><textarea name="messages" class="input-text " id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." rows="2" cols="5"></textarea></span></p>					</div>

	
	</div>
  			</div>
  		</div>

  		
  	  	</div><!-- large-7 -->

  	<div class="large-5 col">
      
  		<div class="col-inner has-border">
  			<div class="checkout-sidebar sm-touch-scroll">
  				<h3 id="order_review_heading">Đơn hàng của bạn</h3>
  				
  				<div id="order_review" class="woocommerce-checkout-review-order">
  					<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name">Sản phẩm</th>
			<th class="product-total">Tổng</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $item)
			<tr class="cart_item">
				<td class="product-name">{{$item->name}}<strong class="product-quantity"> x {{$item->quantity}}</strong>
				</td>
				<td class="product-total">
					<?php
						$total_line = $item->quantity * $item->price;
					?>
					<span class="woocommerce-Price-amount amount">{!!number_format($total_line)!!}<span class="woocommerce-Price-currencySymbol">₫</span></span>
				</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th>Tổng phụ</th>
			<td><span class="woocommerce-Price-amount amount">{!!number_format(Cart::getTotal())!!}<span class="woocommerce-Price-currencySymbol">₫</span></span></td>
		</tr>

		
		
			
			<tr class="woocommerce-shipping-totals shipping">
	<th>Giao hàng</th>
	<td data-title="Giao hàng">
					<ul id="shipping_method" class="woocommerce-shipping-methods">
									<li>
						<input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_wbs7519c0ba_ph_v_n_chuy_n" value="wbs:7519c0ba_ph_v_n_chuy_n" class="shipping_method"><label for="shipping_method_0_wbs7519c0ba_ph_v_n_chuy_n">Phí vận chuyển: <span class="woocommerce-Price-amount amount">0.000<span class="woocommerce-Price-currencySymbol">₫</span></span></label>					</li>
							</ul>
					
		
			</td>
</tr>

			
		
		
		
		
		<tr class="order-total">
			<th>Tổng</th>
			<td><strong><span class="woocommerce-Price-amount amount">{!!number_format(Cart::getTotal())!!}<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
		</tr>

		
	</tfoot>
</table>

<div id="payment" class="woocommerce-checkout-payment">
			<ul class="wc_payment_methods payment_methods methods">
			<li class="wc_payment_method payment_method_cod">
	<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="" style="display: none;">

	<label for="payment_method_cod">
		Trả tiền mặt khi nhận hàng 	</label>
			<div class="payment_box payment_method_cod">
			<p>Trả tiền mặt khi giao hàng</p>
		</div>
	</li>
		</ul>
		<div class="form-row place-order">
		<noscript>
			Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Cập nhật tổng">Cập nhật tổng</button>
		</noscript>

			<div class="woocommerce-terms-and-conditions-wrapper">
		
			</div>
	
		
		<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng">Đặt hàng</button>
		
		<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="b147ccc6bf"><input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">	</div>
</div>

  				</div>
  				<div class="woocommerce-privacy-policy-text"></div>  			</div>
  		</div>

        	</div><!-- large-5 -->

	</div><!-- row -->
</form>

</div>
</div>


</main>
<script type="text/javascript">
	jQuery(document).ready(function () {
		var alert = jQuery("#alert-success").length;
		if(alert != 0){
			swal({
			  title: "Đặt hàng thành công!",
			  text: "Đơn hàng của quý khách sẽ được xử lý trong thời gian sớm nhất",
			  icon: "success",
			  button: "OK",
			});
			setTimeout(function(){ 
				window.location='/';
			}, 4000);
			
		}


	});
</script>
@endsection