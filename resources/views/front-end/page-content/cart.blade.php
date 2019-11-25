@extends('front-end.layout-final.default')

@section('content')
		<main id="main" class="">


			
		<div class="checkout-page-title page-title">
			<div class="page-title-inner flex-row medium-flex-wrap container">
			  <div class="flex-col flex-grow medium-text-center">
		  	 	 <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
		    	   <a href="" class="current">Chọn sản phẩm</a>
		    	   <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
		    	   <a href="" class="hide-for-small">Thông tin thanh toán</a>
		    	   <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
		    	   <a href="#" class="no-click hide-for-small">Hoàn thành</a>
				 </nav>
			  </div><!-- .flex-left -->
			</div><!-- flex-row -->
		</div><!-- .page-title -->
		<div class="cart-container container page-wrapper page-checkout"><div class="woocommerce"><div class="woocommerce-notices-wrapper"></div><div class="woocommerce row row-large row-divided">
		<div class="col large-7 pb-0 ">


		<form class="woocommerce-cart-form" >
		<div class="cart-wrapper sm-touch-scroll">

			
			<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<thead>
					<tr>
						<th class="product-name" colspan="3">Sản phẩm</th>
						<th class="product-price">Giá</th>
						<th class="product-quantity">Số lượng</th>
						<th class="product-subtotal">Tổng</th>
					</tr>
				</thead>
				<tbody>
					@php
	                  $totalQuantity = Cart::getTotalQuantity();
	                  $content = Cart::getContent();
	                  $i=0;
	                @endphp
	                @foreach($content as $item)
		                @php
						    $products_properties = App\ProductsProperties::where('products_detail_id',$item->id)->get();
						    $properties_id = App\Http\Controllers\AuthClient\ClientController::arrayColumn($products_properties,$col='properties_id');
						    $properties = App\Properties::join('properties_type','properties.properties_type_id','=','properties_type.id')->whereIn('properties.id',$properties_id)->select('properties.*','properties_type.name')->get();
						    $product_detail = App\ProductsDetail::where('id',$item->id)->get()->first();
						@endphp
						<tr class="woocommerce-cart-form__cart-item cart_item product-cart" item-number="{{$i}}" data-id="{{$item->id}}">
							<td class="product-remove">
								<a href="" data-id="{{$item->id}}" class="remove remove-item-cart" aria-label="Xóa sản phẩm này" price="{{$item->price*$item->quantity}}">&times;</a>
							</td>

							<td class="product-thumbnail">
								<a href="{{$item->attributes->url}}"><img width="100%" src="{{asset('uploads/images/products/avatar/'.$item->attributes->img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 250px) 100vw, 250px"></a>
							</td>

							<td class="product-name" data-title="Sản phẩm">
								<a href="{{$item->attributes->url}}">{!! \Illuminate\Support\Str::words($item->name, 4,'...')  !!} @foreach($properties as $pp) {{$pp->name}} {{$pp->value}},@endforeach</a>
								<p class="show-for-small mobile-product-price">
									<span class="mobile-product-price__qty">{{$item->quantity}}</span><span>&times;</span>
									<span class="woocommerce-Price-amount amount">{!!number_format($item->price)!!}<span class="woocommerce-Price-currencySymbol">₫</span></span>
								</p>
							</td>

							<td class="product-price" data-title="Giá">
								<span class="woocommerce-Price-amount amount">{!!number_format($item->price)!!}<span class="woocommerce-Price-currencySymbol">₫</span></span>
							</td>

							<td class="product-quantity" data-title="Số lượng">
								<div class="quantity buttons_added">
									<input type="button" data-id="{{$item->id}}" value="-" id="minus" class="minus button is-form">
									<label class="screen-reader-text" for="quantity_5dbd598f143fc">Số lượng</label>
									<input type="number" data-id="{{$item->id}}" class="input-text qty text quantity" step="1" min="1" max="{{$product_detail->amount}}" old-value ="{{$item->quantity}}"value="{{$item->quantity}}" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" >
									<input type="button" data-id="{{$item->id}}" value="+" id="plus" class="plus button is-form">

								</div>
							</td>

							<td class="product-subtotal" data-title="Tổng">
								<?php
									$total_line = $item->quantity * $item->price;
								?>
								<span class="woocommerce-Price-amount amount">{!!number_format($total_line)!!}<span class="woocommerce-Price-currencySymbol">₫</span></span>
							</td>
						</tr>
						<?php
							$i++;
						?>
					@endforeach

					<tr>
						<td colspan="6" class="actions clear">

							<div class="continue-shopping pull-left text-left">
								<a class="button-continue-shopping button primary is-outline" href="https://mdbuddy.vn/shop/">← Tiếp tục xem sản phẩm</a>
							</div>

							<button id="update-cart" type="button" class="button primary mt-0 pull-left small" name="update_cart" value="Cập nhật giỏ hàng">Cập nhật giỏ hàng</button>

							<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="74214fba4d"><input type="hidden" name="_wp_http_referer" value="/cart/">
						</td>
					</tr>

				</tbody>
			</table>
			</div>
		</form>
		</div>

		<div class="cart-collaterals large-5 col pb-0">
			
			<div class="cart-sidebar col-inner ">
				<div class="cart_totals ">

			          <table cellspacing="0">
		          <thead>
		              <tr>
		                  <th class="product-name" colspan="2" style="border-width:3px;">Tổng số lượng</th>
		              </tr>
		          </thead>
		          </table>
		  
			<h2>Tổng số lượng</h2>

			<table cellspacing="0" class="shop_table shop_table_responsive">

				<tbody><tr class="cart-subtotal">
					<th>Tổng phụ</th>
					<td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount totalPrice">{!!number_format(Cart::getTotal())!!}<span class="woocommerce-Price-currencySymbol">₫</span></span></td>
				</tr>

				
				
				
				
				
				<tr class="order-total">
					<th>Tổng</th>
					<td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount totalPrice">{!!number_format(Cart::getTotal())!!}<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
				</tr>

				
			</tbody></table>

			<div class="wc-proceed-to-checkout">
				
		<a href="checkout" class="checkout-button button alt wc-forward">
			Tiến hành thanh toán</a>
			</div>

			
		</div>
						<form class="checkout_coupon mb-0" method="post">
					<div class="coupon">
						<h3 class="widget-title"><i class="icon-tag"></i> Phiếu ưu đãi</h3><input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi"> <input type="submit" class="is-form expand" name="apply_coupon" value="Áp dụng">
									</div>
				</form>
						<div class="cart-sidebar-content relative"></div>	</div>
		</div>
		</div>

		<div class="cart-footer-content after-cart-content relative"></div></div>
		</div>


		</main>
@endsection