<section class="awe-section-1">	
	<div class="section section-category ">
		<div class="cate-overlay"></div>
		<div class="container">
			<div class="row row-noGutter">
				
				<div class="col-lg-12 col-md-12">
					<div class="cate-banner">
						<div id="slider" class="home-slider owl-carousel" data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-xss-items="1" data-margin='0' data-nav="true">
							@php
								$slides = App\Slides::where('systems_id',$system->id)->get();
							@endphp
							@foreach($slides as $sl)
								<div class="item">
									<a href="{{$sl->url}}" class="clearfix">
										<img width="100%" src="{{asset('uploads/images/systems/slides/'.$sl->url_image)}}" alt="Alt">
									</a>	
								</div>
							@endforeach

						</div><!-- /.products -->
						<!-- <div class="row row-noGutter hidden-sm hidden-xs">
							<div class="col-sm-6">
								<a href="#">
									<img src="https://bizweb.dktcdn.net/100/266/879/themes/720483/assets/slider-banner1.png?1558087405072" alt="Zomart" />
								</a>
							</div>
							<div class="col-sm-6">
								<a href="#">
									<img src="https://bizweb.dktcdn.net/100/266/879/themes/720483/assets/slider-banner2.png?1558087405072" alt="Zomart" />
								</a>
							</div>
						</div> -->
						
					</div>
					<!-- <div class="banner-product  hidden-sm hidden-xs hidden-md">
						<a href="#">
							<img src="https://bizweb.dktcdn.net/100/266/879/themes/720483/assets/slider-banner3.png?1558087405072" alt="Zomart" />
						</a>
					</div> -->

				</div>
			</div>

		</div>
	</div>
</section>