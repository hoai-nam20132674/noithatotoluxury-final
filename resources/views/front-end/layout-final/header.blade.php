<header id="header" class="header has-sticky sticky-jump">
   	<div class="header-wrapper">
		<div id="masthead" class="header-main nav-dark">
      		<div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
          		<div id="logo" class="flex-col logo">
					<a href="/" title="MDBuddy Vietnam - Fitness for all" rel="home">
					    <img width="200" height="100" src="{{asset('uploads/images/systems/logo/'.$system->logo)}}" class="header_logo header-logo" alt="MDBuddy Vietnam"/>
					    <img  width="200" height="100" src="{{asset('uploads/images/systems/logo/'.$system->logo)}}" class="header-logo-dark" alt="MDBuddy Vietnam"/>
					</a>
          		</div>

          		<!-- Mobile Left Elements -->
          		<div class="flex-col show-for-medium flex-left">
            		<ul class="mobile-nav nav nav-left ">
              			<li class="nav-icon has-icon">
  							<a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="dark" class="is-small" aria-controls="main-menu" aria-expanded="false"><i class="icon-menu" ></i></a>
  						</li>
  					</ul>
          		</div>

          		<!-- Left Elements -->
          		<div class="flex-col hide-for-medium flex-left flex-grow">
            		<ul class="header-nav header-nav-main nav nav-left  nav-line-bottom nav-size-xlarge nav-spacing-xlarge nav-uppercase" ></ul>
            	</div>

          		<!-- Right Elements -->
          		<div class="flex-col hide-for-medium flex-right">
            		<ul class="header-nav header-nav-main nav nav-right  nav-line-bottom nav-size-xlarge nav-spacing-xlarge nav-uppercase">
            			
						@foreach($menus as $menu)
            				@if($menu->type ==0)
            					<li id="menu-item-{{$menu->id}}" class="menu-item"><a href="{{$menu->url}}" class="nav-top-link">{{$menu->name}}</a></li>
            				@else
            					<li id="menu-item-{{$menu->id}}" class="menu-item menu-item-object-page menu-item-has-children has-dropdown">
            						<a href="{{$menu->url}}" class="nav-top-link">{{$menu->name}}<i class="icon-angle-down" ></i></a>
            						@php
            							$cates = App\Categories::where('parent_id',$menu->categories_id)->where('display',1)->get();
            						@endphp
            						@if(count($cates) !=0)
	            						<ul class='nav-dropdown nav-dropdown-default'>
	            							@foreach($cates as $cate)
	            								@if($cate->id != $menu->categories_id)
		            								<li id="menu-item-{{$cate->id}}" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat current-product-ancestor current-menu-parent current-product-parent menu-item-has-children nav-dropdown-col">
		            									<a href="{{$cate->url}}">{{$cate->name}}</a>
		            									@php
					            							$catess = App\Categories::where('parent_id',$cate->id)->where('display',1)->get();
					            						@endphp
					            						@if(count($catess) !=0)
						            						<ul class='nav-column nav-dropdown-default'>
						            							@foreach($catess as $ca)
						            								@if($ca->id != $cate->id)
						            									<li id="menu-item-{{$ca->id}}" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat "><a href="{{$ca->url}}">{{$ca->name}}</a></li>
						            								@endif
						            							@endforeach
						            						</ul>
						            					@endif
		            								</li>
	            								@endif
	            							@endforeach
	            						</ul>
	            					@endif

            					</li>
            				@endif
            			@endforeach
						<li class="header-search header-search-dropdown has-icon has-dropdown menu-item-has-children">
							<a href="#" class="is-small"><i class="icon-search" ></i></a>
							<ul class="nav-dropdown nav-dropdown-default">
							 	<li class="header-search-form search-form html relative has-icon">
							 		<div class="header-search-form-wrapper">
							 			<div class="searchform-wrapper ux-search-box relative form- is-normal">
							 				<form role="search" method="get" class="searchform" action="https://mdbuddy.vn/">
								 				<div class="flex-row relative">
													<div class="flex-col flex-grow">
														<input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm&hellip;" />
														<input type="hidden" name="post_type" value="product" />
													</div><!-- .flex-col -->
													<div class="flex-col">
														<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0"><i class="icon-search" ></i></button>
													</div><!-- .flex-col -->
												</div><!-- .flex-row -->
												<div class="live-search-results text-left z-top"></div>
											</form>
										</div>
									</div>
								</li>
							</ul><!-- .nav-dropdown -->
						</li>
						<li class="cart-item has-icon has-dropdown">
							@php
			                  $totalQuantity = Cart::getTotalQuantity();
			                  $content = Cart::getContent();
			                @endphp

							<a href="cart" title="Giỏ hàng" class="header-cart-link is-small">
								<span class="image-icon header-cart-icon cartCount" cart-count="{{$totalQuantity}}" data-icon-label="{{$totalQuantity}}">
							    	<img class="cart-img-icon" alt="Giỏ hàng" src="https://mdbuddy.vn/home/wp-content/uploads/2018/06/shopping-cart.png"/>
							  	</span><!-- .cart-img-inner -->
							</a>
							@include('front-end.layout-final.cart-dropdown')
						</li>
						<li class="html custom html_topbar_left">
							<a href="#" class="nav-top-link nav-top-not-logged-in" data-open="#login-form-popup">
							  	<span class="image-icon header-login-icon" data-icon-label="0">
							    	<img class="login-img-icon" alt="Đăng nhập" src="https://mdbuddy.vn/home/wp-content/uploads/2018/06/login-icon.png">
							  	</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- Mobile Right Elements -->
				<div class="flex-col show-for-medium flex-right">
					<ul class="mobile-nav nav nav-right ">
						<li class="cart-item has-icon">
							<a href="cart" class="header-cart-link off-canvas-toggle nav-top-link is-small" data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng" data-pos="right">
								<span class="image-icon header-cart-icon cartCount" cart-count="{{$totalQuantity}}" data-icon-label="{{$totalQuantity}}">
									<img class="cart-img-icon" alt="Giỏ hàng" src="https://mdbuddy.vn/home/wp-content/uploads/2018/06/shopping-cart.png"/> 
								</span><!-- .cart-img-inner -->
							</a>


							<!-- Cart Sidebar Popup -->
							<div id="cart-popup" class="mfp-hide widget_shopping_cart">
								<div class="cart-popup-inner inner-padding">
								    <div class="cart-popup-title text-center">
								        <h4 class="uppercase">Giỏ hàng</h4>
								        <div class="is-divider"></div>
								    </div>
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
											<a href="https://mdbuddy.vn/cart/" class="button wc-forward">Xem giỏ hàng</a>
											<a href="https://mdbuddy.vn/checkout/" class="button checkout wc-forward">Thanh toán</a>
										</p>
								    </div>
								    <div class="cart-sidebar-content relative"></div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div><!-- .header-inner -->
     
            <!-- Header divider -->
      		<div class="container"><div class="top-divider full-width"></div></div>
      	</div><!-- .header-main -->
		<div class="header-bg-container fill">
			<div class="header-bg-image fill"></div>
			<div class="header-bg-color fill"></div>
		</div><!-- .header-bg-container -->
	</div><!-- header-wrapper-->
</header>
@include('front-end.layout-final.menu-mobile')