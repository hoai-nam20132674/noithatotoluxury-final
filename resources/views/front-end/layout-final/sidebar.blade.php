<div class="col large-3 hide-for-medium ">
	<div id="shop-sidebar" class="sidebar-inner col-inner">
		<aside id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
			<form role="search" method="get" class="searchform" action="search">
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
		</aside>
		<aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
			<span class="widget-title shop-sidebar">DANH MỤC</span>
			<div class="is-divider small"></div>
			<ul class="product-categories">
				@foreach($cates as $cate1)
					<li class="cat-item cat-item-15 cat-parent">
						<a style="font-weight: 700;" href="{{$cate1->url}}">{{$cate1->name}}</a>
						@php
							$catesss = App\Categories::where('parent_id',$cate1->id)->where('display',1)->get();
						@endphp

						@if(count($catesss) !=0)
							<ul class='children'>
								@foreach($catesss as $cate2)
									<li class="cat-item cat-item-{{$cate2->id}}">
										<a href="{{$cate2->url}}">{{$cate2->name}}</a>
									</li>
								@endforeach
							</ul>
						@endif
					</li>
				@endforeach
				
			</ul>
		</aside>
		<!-- <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
			<span class="widget-title shop-sidebar">LỌC THEO GIÁ</span>
			<div class="is-divider small"></div>
			<form method="get" action="https://mdbuddy.vn/shop/">
				<div class="price_slider_wrapper">
					<div class="price_slider" style="display:none;"></div>
					<div class="price_slider_amount">
						<input type="text" id="min_price" name="min_price" value="49000" data-min="49000" placeholder="Giá thấp nhất" />
						<input type="text" id="max_price" name="max_price" value="2199000" data-max="2199000" placeholder="Giá cao nhất" />
						<button type="submit" class="button">Lọc</button>
						<div class="price_label" style="display:none;">
							Giá <span class="from"></span> &mdash; <span class="to"></span>
						</div>
						
						<div class="clear"></div>
					</div>
				</div>
			</form>
		</aside> -->
		<aside style="border-top: 1px solid #d0d0d0; padding-top: 15px; " id="woocommerce_top_rated_products-2" class="widget woocommerce widget_top_rated_products">
			<span class="widget-title shop-sidebar">SẢN PHẨM NỔI BẬT</span>
			<div class="is-divider small"></div>
			<ul class="product_list_widget">
				@foreach($products_highlight as $pr)
					<li>
						<a href="{{$pr->url}}">
							<img width="250" height="250" src="{{asset('uploads/images/products/avatar/'.$pr->avatar)}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{$pr->name}}" sizes="(max-width: 250px) 100vw, 250px" />
							<span class="product-title">{{$pr->name}}</span>
						</a>
						<div class="container-rating">
							<div class="star-rating">
								<span style="width:100%">Được xếp hạng <strong class="rating">5.00</strong> 5 sao</span>
							</div>
							<div class="count-rating">(1)</div>
						</div>	
						<del><span class="woocommerce-Price-amount amount">{!!number_format($pr->price)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
						<ins><span class="woocommerce-Price-amount amount">{!!number_format($pr->sale)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
					</li>
				@endforeach
			</ul>
		</aside>
	</div><!-- .sidebar-inner -->
</div><!-- #shop-sidebar -->