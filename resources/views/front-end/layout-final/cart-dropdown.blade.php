
<ul class="nav-dropdown nav-dropdown-default">
    <li class="html widget_shopping_cart">
	    <div class="widget_shopping_cart_content">
			<ul class="woocommerce-mini-cart cart_list product_list_widget list-item-cart">
				@foreach($content as $item)
				  	@php
					    $products_properties = App\ProductsProperties::where('products_detail_id',$item->id)->get();
					    $properties_id = App\Http\Controllers\AuthClient\ClientController::arrayColumn($products_properties,$col='properties_id');
					    $properties = App\Properties::join('properties_type','properties.properties_type_id','=','properties_type.id')->whereIn('properties.id',$properties_id)->select('properties.*','properties_type.name')->get();
				    
					@endphp
					<li class="woocommerce-mini-cart-item mini_cart_item item product-cart" data-id="{{$item->id}}">
						<a href="" data-id="{{$item->id}}" class="remove remove_from_cart_button remove-item-cart" aria-label="Xóa sản phẩm này" price="{{$item->price*$item->quantity}}">&times;</a>
						<a href="{{$item->attributes->url}}">
							<img width="250" height="250" src="{{asset('uploads/images/products/avatar/'.$item->attributes->img)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{$item->name}}" sizes="(max-width: 250px) 100vw, 250px" />{{$item->name}} @foreach($properties as $pp) {{$pp->name}} {{$pp->value}},@endforeach</a>
						<span data-id="{{$item->id}}" value="{{$item->quantity}}" class="quantity">{{$item->quantity}}<span class="woocommerce-Price-amount amount"> &times; {!!number_format($item->price)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
					</li>
				@endforeach
			</ul>

			<p class="woocommerce-mini-cart__total total">
				<strong>Tổng phụ:</strong>
				<span class="woocommerce-Price-amount amount price totalPrice" price="{{Cart::getTotal()}}">{!!number_format(Cart::getTotal())!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
			</p>
			<p class="woocommerce-mini-cart__buttons buttons">
				<a href="cart" class="button wc-forward">Xem giỏ hàng</a>
				<a href="checkout" class="button checkout wc-forward">Thanh toán</a>
			</p>
		</div>
    </li>
</ul><!-- .nav-dropdown -->