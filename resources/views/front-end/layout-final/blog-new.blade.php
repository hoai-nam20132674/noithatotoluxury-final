<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.5" class="vc_row wpb_row vc_row-fluid vc_custom_1530871875824 vc_row-has-fill vc_general vc_parallax vc_parallax-content-moving">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<h2 style="font-size: 40px;color: #ffffff;text-align: center" class="vc_custom_heading vc_custom_1529848133455" >TIN MỚI NHẤT</h2>
				<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_border_width_4 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey vc_custom_1529848182421  vc_custom_1529848182421" >
					<span class="vc_sep_holder vc_sep_holder_l"><span  class="vc_sep_line"></span></span>
					<span class="vc_sep_holder vc_sep_holder_r"><span  class="vc_sep_line"></span></span>
				</div><!-- vc_grid start -->
				<div class="vc_grid-container-wrapper vc_clearfix" >
					<div class="vc_grid-container vc_clearfix wpb_content_element vc_basic_grid" data-initial-loading-animation="none" data-vc-grid-settings="{&quot;page_id&quot;:891,&quot;style&quot;:&quot;all&quot;,&quot;action&quot;:&quot;vc_get_vc_grid_data&quot;,&quot;shortcode_id&quot;:&quot;1570707591782-e11bfc4b603d16c9d05b94b5b6f11182-0&quot;,&quot;tag&quot;:&quot;vc_basic_grid&quot;}" data-vc-request="https://mdbuddy.vn/home/wp-admin/admin-ajax.php" data-vc-post-id="891" data-vc-public-nonce="38d47502d0">
						<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1419250758402{background-color: #353535 !important;}.vc_custom_1419250916067{padding-right: 15px !important;padding-left: 15px !important;}</style>
						<div class="vc_grid vc_row vc_grid-gutter-30px vc_pageable-wrapper vc_hook_hover" data-vc-pageable-content="true">
							<div class="vc_pageable-slide-wrapper vc_clearfix" data-vc-grid-content="true">
								@foreach($blogs as $blog)
									<div class="vc_grid-item vc_clearfix vc_col-sm-3">
										<div class="vc_grid-item-mini vc_clearfix ">
											<div class="box box-text-bottom box-blog-post has-hover">
				            					<div class="box-image">
							  						<div class="image-cover" style="padding-top:16-9;">
							  							<a href="{{$blog->url}}">
							  								<img width="100%" src="{{asset('uploads/images/blogs/'.$blog->image)}}" class="attachment-medium size-medium wp-post-image" alt="{{$blog->title}}" >
							  							</a>
							  						</div>
				  						  		</div><!-- .box-image -->
					          					<div class="box-text text-center">
													<div class="box-text-inner blog-post-inner">
														<a href="{{$blog->url}}"><h5 class="post-title is-large ">{!! \Illuminate\Support\Str::words($blog->title, 10,'...')  !!}</h5></a>
														<div class="is-divider"></div>
														
													</div><!-- .box-text-inner -->
												</div><!-- .box-text -->
											
											</div>
										</div>
										<div class="vc_clearfix"></div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div><!-- vc_grid end -->
			</div>
		</div>
	</div>
</div>