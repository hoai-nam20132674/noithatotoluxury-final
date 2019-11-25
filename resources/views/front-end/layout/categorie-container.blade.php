<div class="container">
	<div class="row">					
		<section class="main_container collection col-lg-12 col-md-12">
			<div class="box-heading relative">
				<h1 class="title-head page_title"> Tất cả sản phẩm</h1>
			</div>
			<div class="category-products products">
				<section class="products-view products-view-grid">
					<div class="row">
						@foreach($products as $pr)
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
							@include('front-end.layout.product-box')		
						</div>
						@endforeach
					</div>
					<div class="text-xs-right">
		
						<nav class="clearfix">
							<ul class="pagination clearfix f-right">
							     
								<li class="page-item disabled"><a class="page-link" href="#">«</a></li>





								<li class="active page-item disabled"><a class="page-link" href="javascript:;">1</a></li>




								<li class="page-item"><a class="page-link" onclick="doSearch(2)" href="javascript:;">2</a></li>



								<li class="page-item"><a class="page-link" onclick="doSearch(3)" href="javascript:;">3</a></li>



								<li class="page-item"><a class="page-link" onclick="doSearch(4)" href="javascript:;">4</a></li>




								<li class="page-item"><a class="page-link" onclick="doSearch(2)" href="javascript:;">
								<i class="fa  fa-caret-right hidden-lg hidden-md"></i>
								<span class="hidden-xs hidden-sm">Trang tiếp</span>
								</a></li>
							  
							</ul>
						</nav>
						
					</div>
				</section>
			</div>
		</section>
		
		<div id="open-filters" class="open-filters hidden-lg hidden-md">
			<i class="fa fa-filter"></i>
			<span>Lọc</span>
		</div>
	</div>
</div>