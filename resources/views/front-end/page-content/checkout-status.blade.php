@extends('front-end.layout-final.default')
@section('content')
	<main id="main" class="">
		@php 
		 	$order = App\Orders::select()->orderBy('id','DESC')->get()->first();
		 	$order_lines = App\OrdersDetail::where('orders_id',$order->id)->get();
		 	$totalPrice = 0;
		@endphp


	
<div class="checkout-page-title page-title">
	<div class="page-title-inner flex-row medium-flex-wrap container">
	  <div class="flex-col flex-grow medium-text-center">
  	 	 <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
    	   <a href="https://mdbuddy.vn/cart/" class="hide-for-small">Chọn sản phẩm</a>
    	   <span class="divider hide-for-small"><i class="icon-angle-right" ></i></span>
    	   <a href="https://mdbuddy.vn/checkout/" class="hide-for-small">Thông tin thanh toán</a>
    	   <span class="divider hide-for-small"><i class="icon-angle-right" ></i></span>
    	   <a href="#" class="no-click current">Hoàn thành</a>
		 </nav>
	  </div><!-- .flex-left -->
	</div><!-- flex-row -->
</div><!-- .page-title -->
<div class="cart-container container page-wrapper page-checkout"><div class="woocommerce">
<div class="row">

	
		    <div class="large-7 col">

        <p>Trả tiền mặt khi giao hàng</p>
    <section class="woocommerce-order-details">
	
	<h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name">Sản phẩm</th>
				<th class="woocommerce-table__product-table product-total">Tổng</th>
			</tr>
		</thead>

		<tbody>
			@foreach($order_lines as $ol)
				@php 
					$product_detail = App\ProductsDetail::where('id',$ol->products_detail_id)->get()->first();
					$product = App\Products::where('id',$product_detail->products_id)->get()->first();
				@endphp
				<tr class="woocommerce-table__line-item order_item">

					<td class="woocommerce-table__product-name product-name">
						<a href="/{{$product->url}}">{{$product->name}}</a> <strong class="product-quantity">&times; {{$ol->amount}}</strong>	</td>

					<td class="woocommerce-table__product-total product-total">
						<span class="woocommerce-Price-amount amount">{!!number_format($product_detail->sale*$ol->amount)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>	</td>
						@php
							$totalPrice = $totalPrice + $product_detail->sale*$ol->amount;
						@endphp

				</tr>
			@endforeach

		</tbody>

		<tfoot>
								<tr>
						<th scope="row">Tổng số phụ:</th>
						<td><span class="woocommerce-Price-amount amount">0.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
					</tr>
										<tr>
						<th scope="row">Giao nhận hàng:</th>
						<td><span class="woocommerce-Price-amount amount">0.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>&nbsp;<small class="shipped_via">qua Phí vận chuyển</small></td>
					</tr>
										<tr>
						<th scope="row">Phương thức thanh toán:</th>
						<td>Trả tiền mặt khi nhận hàng</td>
					</tr>
										<tr>
						<th scope="row">Tổng cộng:</th>
						<td><span class="woocommerce-Price-amount amount">{!!number_format($totalPrice)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
					</tr>
												<tr>
					<th>Lưu ý:</th>
					<td>{{$order->messages}}</td>
				</tr>
					</tfoot>
	</table>

	</section>

<!-- Event snippet for Hoàn tất đơn hàng conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-703475913/tetqCNGY_7EBEMnhuM8C',
      'transaction_id': ''
  });
</script>
    </div>

		<div class="large-5 col">
			<div class="is-well col-inner entry-content">
				<p class="success-color woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><strong>Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</strong></p>

				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

					<li class="woocommerce-order-overview__order order">
						Mã đơn hàng:						<strong>NTOTO{{$order->id}}</strong>
					</li>

											<li class="woocommerce-order-overview__date date">
							Ngày:							<strong>25/11/2019</strong>
						</li>

											
					<li class="woocommerce-order-overview__total total">
						Tổng cộng:						<strong><span class="woocommerce-Price-amount amount">{!!number_format($totalPrice)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong>
					</li>

											<li class="woocommerce-order-overview__payment-method method">
							Phương thức thanh toán:							<strong>Trả tiền mặt khi nhận hàng</strong>
						</li>
					
				</ul>

				<div class="clear"></div>
			</div>
		</div>

		
	
</div>
</div>
</div>


</main><!-- #main -->

@endsection