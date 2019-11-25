<section class="awe-section-8">	
	<div class="section section_tab_product products-view-grid">
		<div class="container">
			<div class="section-title">
				<h2>
					Có thể bạn quan tâm
				</h2>
			</div>
			<div class="e-tabs not-dqtab ajax-tab-5"  data-section="ajax-tab-5">
				<div class="row row-noGutter">
					<div class="col-sm-12">
						<div class="content">
							<div>
								<ul class="tabs tabs-title tab-mobile clearfix hidden-sm hidden-md hidden-lg">
									<li class="prev"><i class="fa fa-angle-left"></i></li>
									@foreach($system_follow as $sys)
										<li class="tab-link tab-title hidden-sm hidden-md hidden-lg current tab-titlexs" data-tab="tab-1">
											
											<span>{{$sys->name}}</span>
											
										</li>
										@break
									@endforeach
									<li class="next"><i class="fa fa-angle-right"></i></li>
								</ul>
								<ul class="tabs tabs-title ajax clearfix hidden-xs">
									@php
										$i=1;
									@endphp
									@foreach($system_follow as $sys)
									<li class="tab-link has-content" data-tab="tab-{{$i}}" data-url="/smartphone">
										<span>{{$sys->name}}</span>
									</li>
									@php
										$i++;
									@endphp
									@endforeach
								</ul>
								
								<?php $j=1;?>
								@foreach($products_recommend as $pro)
									
									<div class="tab-{{$j}} tab-content">
									
										<div class="products products-view-grid owl-carousel" data-lg-items='5' data-md-items='5' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-margin='30' data-nav="true">
											@foreach($pro as $pr)
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