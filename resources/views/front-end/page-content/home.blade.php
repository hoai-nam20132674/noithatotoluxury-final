@extends('front-end.layout-final.default')
@section('meta')
	<title>{{$system->title}}</title>
	<meta name="description" content="{{$system->seo_description}}"/>
	<meta name="keywords" content="{{$system->seo_keyword}}"/>
	<link rel="canonical" href="{{$system->website}}" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="{{$system->title}}" />
	<meta property="og:description" content="{{$system->seo_description}}" />
	<meta property="og:url" content="{{$system->website}}" />
	<meta property="og:image" content="{{asset('uploads/images/systems/share_image/'.$system->share_image)}}" />
	<meta property="og:site_name" content="{{$system->name}}" />
	<meta name="twitter:description" content="{{$system->seo_description}}" />
	<meta name="twitter:title" content="{{$system->title}}" />
@endsection
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