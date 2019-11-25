<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1529849673827 vc_row-has-fill">
	@foreach($cates_highlight as $cate_hl)
		<div class="wpb_column vc_column_container vc_col-sm-4">
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