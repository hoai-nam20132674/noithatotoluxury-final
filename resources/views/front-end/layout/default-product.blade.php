<!DOCTYPE html>
<html lang="vi">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">				
		<title>{{$products->title}}</title>
		<!-- ================= Page description ================== -->
		
		<meta name="description" content="{{$products->seo_description}}">
		
		<!-- ================= Meta ================== -->
		<meta name="keywords" content="{{$products->seo_keyword}}"/>		
		<link rel="canonical" href="/{{$system->website}}"/>
		<meta name='revisit-after' content='1 days' />
		<meta name="robots" content="noodp,index,follow" />
		<!-- ================= Favicon ================== -->
		
		<link rel="icon" href="{{asset('uploads/images/icon/'.$system->shortcut_logo)}}" type="image/x-icon" />
		
		<!-- Facebook Open Graph meta tags -->
		

		<meta property="og:type" content="website">
		<meta property="og:title" content="{{$products->title}}">
		<meta property="og:image" content="{{asset('uploads/images/products/image_share/'.$products->share_image)}}">

		<meta property="og:description" content="{{$products->seo_description}}">
		@if($system->id ==1)
			<meta property="og:url" content="/{{$products->url}}">
		@else
			<meta property="og:url" content="/{{$system->website}}/{{$products->url}}">
		@endif
		<meta property="og:site_name" content="BKMART">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@">

		<!-- Header JS -->
		<script src="{{asset('js/jquery-2.2.3.min.js')}}" type="text/javascript"></script>

		<!-- Bizweb javascript customer -->
		
		<!-- ================= Google Fonts ================== -->
		
		
		
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet" type="text/css" />
		
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&amp;subset=vietnamese" rel="stylesheet">

		<!-- Plugin CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		<link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
		<!-- Build Main CSS -->
		<link href="{{asset('css/base.scss.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/style.scss.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/module.scss.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/responsive.scss.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/fix.scss.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/iwish.css')}}" rel="stylesheet" type="text/css" />
		<style>
			.tagdacbiet{
				padding: 0 15px;
				line-height: 24px;
				color: #fff;
				bottom: 0;
				background: $main-color;
				font-size: 10px;
				font-weight: 600;
				text-transform: inherit;
				font-family: Arial;
				text-align: center;
				white-space: nowrap;
				text-overflow: ellipsis;
				width: 100%;
				overflow: hidden;		
				/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f22060+0,f7793c+100,f7793c+100 */
				background: lighten(#f21f60,5%); /* Old browsers */
				background: -moz-linear-gradient(top, lighten(#f21f60,5%) 0%, darken(#f7793c,10%) 100%, darken(#f7793c,10%) 100%); /* FF3.6-15 */
				background: -webkit-linear-gradient(top, lighten(#f21f60,5%) 0%,darken(#f7793c,10%) 100%,darken(#f7793c,10%) 100%); /* Chrome10-25,Safari5.1-6 */
				background: linear-gradient(to right, lighten(#f21f60,5%) 0%,darken(#f7793c,10%) 100%,darken(#f7793c,10%) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='lighten($main-color,10%)', endColorstr='darken($main-color2,10%)',GradientType=0 ); /* IE6-9 */

			}
		</style>

		<!-- <script src="{{asset('js/iwishheader.js')}}" type="text/javascript"></script> -->

		<!-- Bizweb conter for header -->

		@yield('css-js-header')

	</head>
	<body>
		
		@include('front-end.layout.header')
		<!-- Main content -->		
		<h1 class="hidden">Zomart</h1>

		@yield('section-slide')

		@yield('content')

		@include('front-end.layout.section-policy')

		@include('front-end.layout.footer')
		<!-- Modal Đăng nhập -->
		@include('front-end.layout.modal-login')
		<!-- Modal Đăng ký-->
		@include('front-end.layout.modal-register')


		
		<div class="error-popup awe-popup">
			<div class="overlay no-background"></div>
			<div class="popup-inner content">
				<div class="error-message"></div>
			</div>
		</div>
		


		
		<div id="myModal" class="modal fade" role="dialog"></div>
		
		

	
		<script src="{{asset('js/cs.script.js')}}" type="text/javascript"></script>
		<!-- Quick view -->
		
		<!-- <script src="{{asset('js/quickview.js')}}" type="text/javascript"></script> -->


		<!-- <script src="{{asset('js/option-selectors.js')}}" type="text/javascript"></script> -->
		<script src="{{asset('js/update-cart.js')}}" type="text/javascript"></script>
		<!-- Plugin JS -->
		<script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>	
		<script src="{{asset('js/bootstrap.min.js')}}"></script>

		<script src="{{asset('js/iwish.js')}}" type="text/javascript"></script>
		<!-- Main JS -->
		<script src="{{asset('js/main.js')}}" type="text/javascript"></script>
		<!-- Product detail JS,CSS -->
		<!-- search js-->
		<script src="{{asset('js/search.js')}}" type="text/javascript"></script>
		<!-- end search -->
		<script type="text/javascript">
			function showRecoverPasswordForm() {
				document.getElementById('recover-password').style.display = 'block';
				document.getElementById('login').style.display='none';
			}

			function hideRecoverPasswordForm() {
				document.getElementById('recover-password').style.display = 'none';
				document.getElementById('login').style.display = 'block';
			}

			if (window.location.hash == '#recover') { showRecoverPasswordForm() }
		</script>
		<script type="text/javascript">
	    	$("div.alert").delay(5000).slideUp();
	    </script>

		@yield('css-js-footer')
		

	</body>
</html>