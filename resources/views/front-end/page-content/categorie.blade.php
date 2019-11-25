@extends('front-end.layout-final.default')
@section('content')
<div class="shop-page-title category-page-title page-title ">
	<div class="page-title-inner flex-row  medium-flex-wrap container">
	  	<div class="flex-col flex-grow medium-text-center">
	  	 	<h1 class="shop-page-title is-xlarge">Sản phẩm</h1>
			<div class="is-small">
				<nav class="woocommerce-breadcrumb breadcrumbs"><a href="https://mdbuddy.vn">Trang chủ</a> <span class="divider">&#47;</span> Sản phẩm</nav>
			</div>
			<div class="category-filtering category-filter-row show-for-medium">
				<a href="#" data-open="#shop-sidebar" data-visible-after="true" data-pos="left" class="filter-button uppercase plain"><i class="icon-menu"></i><strong>Lọc</strong></a>
				<div class="inline-block"></div>
			</div>
	  	</div><!-- .flex-left -->
	  
	   	<div class="flex-col medium-text-center"></div><!-- .flex-right -->
	</div><!-- flex-row -->
</div><!-- .page-title -->

<main id="main" class="">
<div class="row category-page-row">

		<div class="col large-3 hide-for-medium ">
			<div id="shop-sidebar" class="sidebar-inner col-inner">
				<aside id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
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
				</aside>
				<aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
					<span class="widget-title shop-sidebar">DANH MỤC</span>
					<div class="is-divider small"></div>
					<ul class="product-categories">
						<li class="cat-item cat-item-15 cat-parent">
							<a href="https://mdbuddy.vn/product-category/phu-kien-ho-tro1/">PHỤ KIỆN &amp; HỖ TRỢ</a>
							<ul class='children'>
								<li class="cat-item cat-item-547"><a href="https://mdbuddy.vn/product-category/phu-kien-ho-tro1/phu-kien-bao-ho/">Phụ kiện bảo hộ</a></li>
								<li class="cat-item cat-item-548"><a href="https://mdbuddy.vn/product-category/phu-kien-ho-tro1/phu-kien-ho-tro/">Phụ kiện hỗ trợ</a></li>
							</ul>
						</li>
						<li class="cat-item cat-item-1038 cat-parent"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/">DỤNG CỤ TẬP CÁ NHÂN</a>
							<ul class='children'>
								<li class="cat-item cat-item-1041"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/bong-power-ball/">Bóng Power Ball</a></li>
								<li class="cat-item cat-item-1039"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/con-lan-tap-bung/">Con lăn tập bụng</a></li>
								<li class="cat-item cat-item-915"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/day-nhay-the-duc/">Dây nhảy thể dục</a></li>
								<li class="cat-item cat-item-926"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/day-tap-dan-hoi/">Dây tập đàn hồi</a></li>
								<li class="cat-item cat-item-927"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/day-tap-khang-luc/">Dây tập kháng lực</a></li>
								<li class="cat-item cat-item-1040"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/dia-xoay-thang-bang/">Đĩa xoay thăng bằng</a></li>
								<li class="cat-item cat-item-918"><a href="https://mdbuddy.vn/product-category/dung-cu-tap-ca-nhan/dung-cu-ca-nhan-khac/">Dụng cụ cá nhân khác</a></li>
							</ul>
						</li>
					</ul>
				</aside>
				<aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
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
				</aside>
				<aside id="woocommerce_top_rated_products-2" class="widget woocommerce widget_top_rated_products">
					<span class="widget-title shop-sidebar">SẢN PHẨM NỔI BẬT</span>
					<div class="is-divider small"></div>
					<ul class="product_list_widget">
						<li>
							<a href="https://mdbuddy.vn/product/bo-day-tap-the-duc-dan-hoi-resistance-loops-md1319/">
								<img width="250" height="250" src="https://mdbuddy.vn/home/wp-content/uploads/2018/07/MDbuddy-MD1319-1-250x250.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="https://mdbuddy.vn/home/wp-content/uploads/2018/07/MDbuddy-MD1319-1-250x250.jpg 250w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/MDbuddy-MD1319-1-150x150.jpg 150w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/MDbuddy-MD1319-1-300x300.jpg 300w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/MDbuddy-MD1319-1-510x510.jpg 510w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/MDbuddy-MD1319-1-100x100.jpg 100w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/MDbuddy-MD1319-1.jpg 750w" sizes="(max-width: 250px) 100vw, 250px" />
								<span class="product-title">Bộ 4 dây tập thể dục đàn hồi Resistance Loops MD1319</span>
							</a>
							<div class="container-rating">
								<div class="star-rating">
									<span style="width:100%">Được xếp hạng <strong class="rating">5.00</strong> 5 sao</span>
								</div>
								<div class="count-rating">(1)</div>
							</div>	
							<del><span class="woocommerce-Price-amount amount">399.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
							<ins><span class="woocommerce-Price-amount amount">229.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
						</li>
					</ul>
				</aside>
			</div><!-- .sidebar-inner -->
		</div><!-- #shop-sidebar -->

		<div class="col large-9">
			<div class="shop-container">
				<div class="flex-col medium-text-center woocommerce-order">
					<p class="woocommerce-result-count hide-for-medium">
						Hiển thị 1&ndash;12 trong 76 kết quả</p>
					<form class="woocommerce-ordering" method="get">
						<select name="orderby" class="orderby">
							<option value="menu_order"  selected='selected'>Thứ tự mặc định</option>
							<option value="popularity" >Thứ tự theo mức độ phổ biến</option>
							<option value="rating" >Thứ tự theo điểm đánh giá</option>
							<option value="date" >Mới nhất</option>
							<option value="price" >Thứ tự theo giá: thấp đến cao</option>
							<option value="price-desc" >Thứ tự theo giá: cao xuống thấp</option>
						</select>
						<input type="hidden" name="paged" value="1" />
					</form>
	   			</div><!-- .flex-right -->
	   			<div class="woocommerce-notices-wrapper"></div>
	   			<div class="products row row-small large-columns-3 medium-columns-3 small-columns-2 has-equal-box-heights">
	   				@foreach($products as $product)
	   					@include('front-end.layout-final.product-box')
	   				@endforeach
	   			</div><!-- row -->
	   			<div class="container">
	   				<nav class="woocommerce-pagination">
	   					<ul class="page-numbers nav-pagination links text-center">
	   						@if( $products->currentPage() != 1)
						  		<li class="page-item">
									<a class="next page-number" href="{{$products->url($products->currentPage()-1)}}"><i class="icon-angle-left"></i></a>
								</li>
						  	@endif
						  	@for($i =1; $i<=$products->lastPage();$i++)
						  		<li class="{{($products->currentPage()==$i) ? 'current' : ''}} page-item"><a class="page-number page-link" href="{{$products->url($i)}}">{{$i}}</a></li>
						  	@endfor
						  	@if( $products->currentPage() != $products->lastPage())
							  	<li class="page-item">
									<a class="next page-number" href="{{$products->url($products->currentPage()+1)}}"><i class="icon-angle-right"></i></a>
								</li>
							@endif
	   						<!-- <li>
	   							<span aria-current='page' class='page-number current'>1</span>
	   						</li>
	   						<li>
	   							<a class='page-number' href='https://mdbuddy.vn/shop/page/2/'>2</a>
	   						</li>
	   						<li>
	   							<a class='page-number' href='https://mdbuddy.vn/shop/page/3/'>3</a>
	   						</li>
	   						<li>
	   							<a class='page-number' href='https://mdbuddy.vn/shop/page/4/'>4</a>
	   						</li>
	   						<li>
	   							<a class='page-number' href='https://mdbuddy.vn/shop/page/5/'>5</a>
	   						</li>
	   						<li>
	   							<a class='page-number' href='https://mdbuddy.vn/shop/page/6/'>6</a>
	   						</li>
	   						<li>
	   							<a class='page-number' href='https://mdbuddy.vn/shop/page/7/'>7</a>
	   						</li>
	   						<li>
	   							<a class="next page-number" href="https://mdbuddy.vn/shop/page/2/"><i class="icon-angle-right"></i></a>
	   						</li> -->
	   					</ul>
	   				</nav>
	   			</div>
			</div><!-- shop container -->
		</div>
	</div>
</main><!-- #main -->
@endsection