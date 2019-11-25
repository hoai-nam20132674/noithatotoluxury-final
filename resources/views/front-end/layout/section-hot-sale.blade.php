<section class="awe-section-3">	
	
	<div class="section section-service">	
		<div class="container">
			<div class="section-title">
				<h2><a href="/san-pham-noi-bat">@yield('title')</a></h2>			
			</div>
			<div class="section-content">	
				
				<div class="products products-view-grid">
					<div class="top-right-owl-nav dark products products-view-grid owl-carousel owl-theme" data-lg-items="5" data-lgg-items="5"  data-md-items="4" data-sm-items="3" data-xs-items="2" data-xss-items="2" data-margin="30" data-nav="true">				
						@php
							$same_products = App\Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.categories_id',$products->categories_id)->where('products.display',1)->where('images_products.role',1)->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')->get();
							$same_products = App\Http\Controllers\AuthClient\ClientController::groupProduct($same_products);
							$same_products = App\Http\Controllers\AuthClient\ClientController::filterProduct($same_products);
						@endphp
						@foreach($same_products as $pr)         
						<div class="item">
							
							@include('front-end.layout.product-box')																
						</div>
						@endforeach	
					</div>
				</div><!-- /.products -->
			</div>
		</div>
	</div>
</section>