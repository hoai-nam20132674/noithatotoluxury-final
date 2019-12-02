<div class="vc_row wpb_row vc_row-fluid">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<h2 style="font-size: 40px;color: #000000;text-align: center" class="vc_custom_heading vc_custom_1529849305229" >SẢN PHẨM NỔI BẬT</h2>
				<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_10 vc_sep_border_width_4 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_black vc_custom_1529849288194  vc_custom_1529849288194" >
					<span class="vc_sep_holder vc_sep_holder_l">
						<span  class="vc_sep_line"></span>
					</span>
					<span class="vc_sep_holder vc_sep_holder_r">
						<span  class="vc_sep_line"></span>
					</span>
				</div>
				<div class="woocommerce columns-4 ">
					<div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights">
						<div style="margin: 0px auto;" class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : true}'>
							@foreach($products_highlight as $product)	
								@include('front-end.layout-final.product-box')
							@endforeach
						</div>
					</div><!-- row -->
				</div>
			</div>
		</div>
	</div>
</div>