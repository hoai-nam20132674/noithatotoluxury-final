<div class="product-small col has-hover post-7084 product type-product status-publish has-post-thumbnail first instock sale shipping-taxable purchasable product-type-simple">
	<div class="col-inner">

		<div class="badge-container absolute left top z-1">
			<div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
		</div>
		<div class="product-small box ">
			<div class="box-image">
				<div class="image-zoom">
					<a href="/{{$product->url}}">
						<img width="250" height="250" src="{{asset('uploads/images/products/avatar/'.$product->avatar)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail avatar" data-id="{{$product->products_detail_id}}" alt="{{$product->name}}" sizes="(max-width: 250px) 100vw, 250px" />
					</a>
				</div>
				<div class="image-tools is-small top right show-on-hover"></div>
				<div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
				<div style="display: none;" class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
					<a class="quick-view" data-prod="7084" href="#quick-view">Xem nhanh</a>
				</div>
			</div><!-- box-image -->

			<div class="box-text box-text-products">
				<div class="title-wrapper">
					<p class="name product-title title-head" data-id="{{$product->products_detail_id}}" title="{{$product->name}}"><a href="/{{$product->url}}">{!! \Illuminate\Support\Str::words($product->name, 8,'...')  !!}</a></p>
				</div>
				<div class="price-wrapper">
					<div class="container-rating">
						<div class="star-rating">
							<span style="width:100%">Được xếp hạng <strong class="rating">5.00</strong> 5 sao</span>
						</div>
						<div class="count-rating">(2)</div>
					</div>
					<span class="price">
						<del><span class="woocommerce-Price-amount amount">1.499.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
						<ins><span class="woocommerce-Price-amount amount price-detail" data-id="{{$product->products_detail_id}}" price="{{$product->price}}">{!!number_format($product->price)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
					</span>
					<input type="number" name="quantity" data-id="{{$product->products_detail_id}}" class="qty" value="1" style="display: none;">
				</div>
				<div class="add-to-cart-button">
					<a id="add-to-cart" url="/{{$product->url}}" products_detail_id="{{$product->products_detail_id}}" products_id="{{$product->id}}" class="ajax_add_to_cart add_to_cart_button product_type_simple button primary is-flat mb-0 is-small">Thêm vào giỏ</a>
				</div>
			</div><!-- box-text -->
		</div><!-- box -->
	</div><!-- .col-inner -->
</div><!-- col -->