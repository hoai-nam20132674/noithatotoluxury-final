@extends('front-end.layout.default')

@section('content')
	@include('front-end.layout.categorie-list')

	@include('front-end.layout.breadcrumb')
	<section class="signup search-main">
		<div class="container">
			<div class="row">
				     
				        
				
				<div class="col-xs-12">
					<?php $count = count($products) ?>
					<h1 class="title-head">Có {{$count}} kết quả tìm kiếm phù hợp</h1>

				</div>

				<div class="col-xs-12">
					<div class="products-view-grid products clearfix clear-left">
						<div class="row">
							@foreach($products as $pr)
							<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
								
									@include('front-end.layout.product-box')
								
							</div>
							@endforeach
						</div>
					</div>
				</div>

				
				
				<div class="col-xs-12 text-xs-center">
					<nav class="clearfix">
					  	<ul class="pagination clearfix f-right">
					     
						  	<li class="page-item disabled"><a class="page-link" href="#">«</a></li>
						  	<li class="active page-item disabled"><a class="page-link" href="#">1</a></li>
						  	<li class="page-item"><a class="page-link" href="/search?q=gi%E1%BA%A7y&page=2">2</a></li>
						  	<li class="page-item">
						  		<a class="page-link" href="/search?q=gi%E1%BA%A7y&page=2">
								    <i class="fa  fa-caret-right hidden-lg hidden-md"></i>
								    <span class="hidden-xs hidden-sm">Trang tiếp</span>
								</a>
							</li>
						  
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
	
	
@endsection

