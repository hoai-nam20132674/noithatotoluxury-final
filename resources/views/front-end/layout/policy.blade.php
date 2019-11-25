<div class="col-lg-3 hidden-md hidden-xs hidden-sm">
	<aside class="aside-item clearfix">
		<div class="right_module margin-top-10">
			<div class="module_service_details">
				<div class="wrap_module_service">
					<div class="item_service">
						<div class="wrap_item_">
							<div class="content_service">
								<p>Giao hàng tận nơi</p>
								<span>Miễn phí vận chuyển với đơn hàng trên 300.000 đ.</span>
							</div>
						</div>
					</div>
					<div class="item_service">
						<div class="wrap_item_">
							<div class="content_service">
								<p>Thanh toán khi nhận hàng</p>
								<span>Bạn thoải mái nhận &  kiểm tra hàng trước khi trả tiền.</span>
							</div>
						</div>
					</div>
					<div class="item_service">
						<div class="wrap_item_">
							<div class="content_service">
								<p>Đổi trả trong vòng 7 ngày</p>
								<span>Dễ dàng đổi trả sản phẩm trong 7 ngày đầu tiên</span>
							</div>
						</div>
					</div>
					<div class="item_service">
						<div class="wrap_item_">
							<div class="content_service">
								<p>Bảo hành chính hãng</p>
								<span>Bạn thoải mái nhận &  kiểm tra hàng trước khi trả tiền.</span>
							</div>
						</div>
					</div>
					@php
						$st = App\Categories::where('id',$products->categories_id)->get()->first();
						$st = App\Systems::where('id',$st->systems_id)->get()->first();
					@endphp
					<div class="item_service">
						<div class="wrap_item_">
							<div class="content_service">
								<p>Đặt hàng online</p>
								<span>Gọi ngay <a href='callto:{{$st->phone}}'>{{$st->phone}}</a> để mua và đặt hàng nhanh chóng</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</aside>



	<!-- <aside class="beemart-adv aside-item action-sidebar details-pro">
		<div class="content">


			<div class="aside-item aside-mini-list-product">
				<div >
					<div class="aside-title margin-top-5">
						<h2 class="title-head">
							<a href="javascript:;">Sản phẩm vừa xem</a>
						</h2>
					</div>
					<div class="aside-content related-product">
						<div class="product-mini-lists">
							<div class="products" id="recent-content">

								
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>
	</aside> -->
</div>