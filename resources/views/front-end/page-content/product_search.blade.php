@extends('front-end.layout-final.default')
@section('meta')
	<title>Tìm Kiếm Sản Phẩm</title>
	
@endsection
@section('content')
<div class="shop-page-title category-page-title page-title ">
	<div class="page-title-inner flex-row  medium-flex-wrap container">
	  	<div class="flex-col flex-grow medium-text-center">
	  	 	<h1 class="shop-page-title is-xlarge">Tìm Kiếm</h1>
			<div class="is-small">
				<nav class="woocommerce-breadcrumb breadcrumbs"><a href="https://mdbuddy.vn">Trang chủ</a> <span class="divider">&#47;</span> Tìm kiếm</nav>
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

		@include('front-end.layout-final.sidebar')

		<div class="col large-9">
			<div class="shop-container">
				<div class="flex-col medium-text-center woocommerce-order">
					<p class="woocommerce-result-count hide-for-medium">
						Hiển thị 1&ndash;9 trong {{count($products)}} kết quả tìm kiếm</p>
					<!-- <form class="woocommerce-ordering" method="get">
						<select name="orderby" class="orderby">
							<option value="menu_order"  selected='selected'>Thứ tự mặc định</option>
							<option value="popularity" >Thứ tự theo mức độ phổ biến</option>
							<option value="rating" >Thứ tự theo điểm đánh giá</option>
							<option value="date" >Mới nhất</option>
							<option value="price" >Thứ tự theo giá: thấp đến cao</option>
							<option value="price-desc" >Thứ tự theo giá: cao xuống thấp</option>
						</select>
						<input type="hidden" name="paged" value="1" />
					</form> -->
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
	   						
	   					</ul>
	   				</nav>
	   			</div>
			</div><!-- shop container -->
		</div>
	</div>
</main><!-- #main -->
@endsection