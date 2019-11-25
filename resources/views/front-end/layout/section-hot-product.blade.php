@if($system->id != 1)
	<section class="awe-section-2">	
		<div class="section section_tab_product section_giatothomnay products-view-grid">
			<div class="container">
				<div class="section-title">
					<h2>
						SẢN PHẨM NỔI BẬT
					</h2>
				</div>
				<div class="e-tabs not-dqtab ajax-tab-1"  data-section="ajax-tab-1">
					<div class="row row-noGutter">
						<div class="col-sm-12">
							<div class="content">
								<div>
									<ul class="tabs tabs-title tab-mobile clearfix hidden-sm hidden-md hidden-lg">
										<li class="prev"><i class="fa fa-angle-left"></i></li>
										<li class="tab-link tab-title hidden-sm hidden-md hidden-lg current tab-titlexs" data-tab="tab-1">
											@foreach($cate_highlights as $cate_highlight)
												<span>{{$cate_highlight->name}}</span>
												@break
											@endforeach
											
										</li>
										<li class="next"><i class="fa fa-angle-right"></i></li>
									</ul>

									<ul class="tabs tabs-title ajax clearfix hidden-xs" >
										<?php $i=1; ?>
										@foreach($cate_highlights as $cate_highlight)
										<li class="tab-link has-content" data-tab="tab-{{$i}}" data-url="">
											<span>{{$cate_highlight->name}}</span>
											<?php $i++; ?>
										</li>
										@endforeach
										
									</ul>
									<?php $j=1;?>
									@foreach($products_highlights as $products_highlight)
										
										<div class="tab-{{$j}} tab-content">
										
											<div class="products products-view-grid owl-carousel" data-lg-items='5' data-md-items='5' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-margin='30' data-nav="true">
												@foreach($products_highlight as $pr)
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
										<?php $j++; ?>

										
									@endforeach
									

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@else
	<section class="awe-section-2">	
		<div class="section section_tab_product section_giatothomnay products-view-grid">
			<div class="container">
				<div class="section-title">
					<h2>
						SẢN PHẨM NỔI BẬT
					</h2>
				</div>
				<div class="e-tabs not-dqtab ajax-tab-1"  data-section="ajax-tab-1">
					<div class="row row-noGutter">
						<div class="col-sm-12">
							<div class="content">
								<div>
									<ul class="tabs tabs-title tab-mobile clearfix hidden-sm hidden-md hidden-lg">
										<li class="prev"><i class="fa fa-angle-left"></i></li>
										<li class="tab-link tab-title hidden-sm hidden-md hidden-lg current tab-titlexs" data-tab="tab-1">
											@foreach($systems_highlights as $systems_highlight)
												<span>{{$systems_highlight->name}}</span>
												@break
											@endforeach
											
										</li>
										<li class="next"><i class="fa fa-angle-right"></i></li>
									</ul>

									<ul class="tabs tabs-title ajax clearfix hidden-xs" >
										<?php $i=1; ?>
										@foreach($systems_highlights as $systems_highlight)
										<li class="tab-link has-content" data-tab="tab-{{$i}}" data-url="">
											<span>{{$systems_highlight->name}}</span>
											<?php $i++; ?>
										</li>
										@endforeach
										
									</ul>
									<?php $j=1;?>
									@foreach($products_highlights as $products_highlight)
										
										<div class="tab-{{$j}} tab-content">
										
											<div class="products products-view-grid owl-carousel" data-lg-items='5' data-md-items='5' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-margin='30' data-nav="true">
												@foreach($products_highlight as $pr)
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
										<?php $j++; ?>

										
									@endforeach
									

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endif
