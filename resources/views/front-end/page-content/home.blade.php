@extends('front-end.layout-final.default')
@section('content')
	

	<main id="main" class="">
		<div id="content" class="content-area page-wrapper" role="main">
			<div class="row row-main">
				<div class="large-12 col">
					<div class="col-inner">
						@include('front-end.layout-final.slide')
																
						<div class="vc_row-full-width vc_clearfix"></div>

						@include('front-end.layout-final.product-highlight')
					
						<div class="vc_row-full-width vc_clearfix"></div>

						@include('front-end.layout-final.cate-list')

						<div class="vc_row-full-width vc_clearfix"></div>

						@include('front-end.layout-final.policy')

						<div class="vc_row-full-width vc_clearfix"></div>

						@include('front-end.layout-final.blog-new')

						<div class="vc_row-full-width vc_clearfix"></div>
					</div><!-- .col-inner -->
				</div><!-- .large-12 -->
			</div><!-- .row -->
		</div>
	</main><!-- #main -->

	
@endsection