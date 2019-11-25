@if($system->id !=1 )	
	<?php $i=0; ?>
	@foreach($cate_highlights as $cate)
	<section class="awe-section-5">	
		<div class="section section-collection section-collection-1">
			<div class="container">

				<div class="collection-border">

					<div class="collection-main">
						<div class="row ">

							<div class="col-lg-12 col-sm-12">
								
								<div class="e-tabs not-dqtab ajax-tab-2"  data-section="ajax-tab-2">
									<div class="row row-noGutter">
										<div class="col-sm-12">
											<div class="content">
												<div class="section-title">
													<h2>
														{{$cate->name}}
													</h2>
												</div>
												<div>
													<ul class="tabs tabs-title tab-mobile clearfix hidden-sm hidden-md hidden-lg">
														<li class="prev"><i class="fa fa-angle-left"></i></li>
														<li class="tab-link tab-title hidden-sm hidden-md hidden-lg current tab-titlexs" data-tab="tab-1">
															
															<span>Thời trang nam</span>
															
														</li>
														<li class="next"><i class="fa fa-angle-right"></i></li>
													</ul>
													<ul class="tabs tabs-title ajax clearfix hidden-xs">
														<?php $j=1; ?>
														@if(count($cate_news)!=0)
															@foreach($cate_news[$i] as $cate_new)
															
																<li class="tab-link has-content" data-tab="tab-{{$j}}" data-url="/thoi-trang-nam">
																	<span> {{$cate_new->name}} </span>
																</li>
																<?php $j++; ?>
															@endforeach
														@else
														@endif
														
														
													</ul>
													<?php $k=1; ?>
													@foreach($products_news[$i] as $products_new)
														<div class="tab-{{$k}} tab-content">
															
															<div class="products products-view-grid owl-carousel" data-lgg-items="5" data-lg-items='5' data-md-items='4' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-margin='14' data-nav="true">
																@foreach($products_new as $pr)
																	@if($pr == null)
																		<div class="container">
																			<span>không có sản phẩm nổi bật nào trong danh mục này</span>
																			
																		</div>
																	@else
																		<div class="item">
																			@include('front-end.layout.product-box')
																		</div>
																	@endif
																@endforeach

															</div><!-- /.products -->
															
															
														</div>
														<?php $k++; ?>
													@endforeach
													
													
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<?php $i++; ?>
	@endforeach
@else
	<section class="awe-section-5">	
		<div class="section section-collection section-collection-1">
			<div class="container">
				<div class="row">

					<div class="col-xs-12">
						<div class="products-view-grid products clearfix clear-left">
							<div class="row">
								@foreach($products_news as $pr)
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
						     
							  	
							  	@if( $products_news->currentPage() != 1)
							  		<li class="page-item">
								  		<a class="page-link" href="{{$products_news->url($products_news->currentPage()-1)}}">
										    <i class="fa  fa-caret-left hidden-lg hidden-md"></i>
										    <span class="hidden-xs hidden-sm">Trang trước</span>
										</a>
									</li>
							  	@endif
							  	@for($i =1; $i<=$products_news->lastPage();$i++)
							  		<li class="{{($products_news->currentPage()==$i) ? 'active' : ''}} page-item"><a class="page-link" href="{{$products_news->url($i)}}">{{$i}}</a></li>
							  	@endfor
							  	@if( $products_news->currentPage() != $products_news->lastPage())
								  	<li class="page-item">
								  		<a class="page-link" href="{{$products_news->url($products_news->currentPage()+1)}}">
										    <i class="fa  fa-caret-right hidden-lg hidden-md"></i>
										    <span class="hidden-xs hidden-sm">Trang tiếp</span>
										</a>
									</li>
								@endif
							  
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
@endif