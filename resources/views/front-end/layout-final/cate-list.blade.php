<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1529849673827 vc_row-has-fill">
	<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_border_width_4 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_black vc_custom_1529849288194  vc_custom_1529849288194" >
		
	</div>
	<h2 style="font-size: 40px;color: #fff;text-align: center" class="vc_custom_heading vc_custom_1529849305229" >DANH MỤC</h2>
	<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_border_width_4 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_black vc_custom_1529849288194  vc_custom_1529849288194" >
		<span class="vc_sep_holder vc_sep_holder_l">
			<span style="border-color: #fff;" class="vc_sep_line"></span>
		</span>
		<span class="vc_sep_holder vc_sep_holder_r">
			<span  class="vc_sep_line"></span>
		</span>
	</div>
	<div style="margin: 0px auto;" class="row large-columns-3 medium-columns- small-columns-1 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : true}'>
		@foreach($cates_highlight as $cate_hl)
			<div class="product-small col has-hover post-7084 product type-product status-publish has-post-thumbnail first instock sale shipping-taxable purchasable product-type-simple">
				<div class="vc_column-inner">
					<div class="wpb_wrapper">
						<div  class="wpb_single_image wpb_content_element vc_align_center   zoom">
							
							<figure class="wpb_wrapper vc_figure">
								<a href="{{$cate_hl->url}}" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img width="100%" src="{{asset('uploads/images/categories/avatar/'.$cate_hl->avatar)}}" class="vc_single_image-img attachment-full" alt="" sizes="(max-width: 720px) 100vw, 720px" /></a>
							</figure>
						</div>

						
					</div>
				</div>
			</div>
		@endforeach
	</div>	
</div>