
<!DOCTYPE html>
<html lang="vi-VN" prefix="og: http://ogp.me/ns#" class="loading-site no-js">
<head>
	{!!$system->script!!}
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	@yield('meta')
	
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
		.woocommerce form .form-row .required { visibility: visible; }
		.bg{opacity: 0; transition: opacity 1s; -webkit-transition: opacity 1s;} .bg-loaded{opacity: 1;}
	</style>
	<link rel='stylesheet' id='wp-block-library-css'  href="{{asset('noithatotoluxury/css/style.min.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='rs-plugin-settings-css'  href="{{asset('noithatotoluxury/css/settings.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='flatsome-icons-css'  href="{{asset('noithatotoluxury/css/fl-icons.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='js_composer_front-css'  href="{{asset('noithatotoluxury/css/js_composer.min.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='flatsome-main-css'  href="{{asset('noithatotoluxury/css/flatsome.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='flatsome-shop-css'  href="{{asset('noithatotoluxury/css/flatsome-shop.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='flatsome-style-css'  href="{{asset('noithatotoluxury/css/style.css')}}" type='text/css' media='all' />

	<link rel='stylesheet' id='font-awesome-css'  href="{{asset('noithatotoluxury/css/font-awesome.min.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='prettyphoto-css'  href="{{asset('noithatotoluxury/css/prettyPhoto.min.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='vc_pageable_owl-carousel-css-css'  href="{{asset('noithatotoluxury/css/owl.min.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' id='animate-css-css'  href="{{asset('noithatotoluxury/css/animate.min.css')}}" type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="{{asset('noithatotoluxury/css/photoswipe.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('noithatotoluxury/css/default-skin.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<script type='text/javascript' src="{{asset('noithatotoluxury/js/jquery.js')}}"></script>
	<script type='text/javascript' src="{{asset('noithatotoluxury/js/jquery-migrate.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('noithatotoluxury/js/jquery.themepunch.tools.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('noithatotoluxury/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('noithatotoluxury/js/jquery.blockUI.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('noithatotoluxury/js/add-to-cart.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('noithatotoluxury/js/woocommerce-add-to-cart.js')}}"></script>

	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>


	<link rel="icon" href="{{asset('uploads/images/systems/logo/'.$system->shortcut_logo)}}" sizes="32x32" />
	<link rel="apple-touch-icon-precomposed" href="https://mdbuddy.vn/home/wp-content/uploads/2018/06/cropped-ICON-1-180x180.png" />
	<meta name="msapplication-TileImage" content="https://mdbuddy.vn/home/wp-content/uploads/2018/06/cropped-ICON-1-270x270.png" />
	<script type="text/javascript">function setREVStartSize(e){									
		try{ e.c=jQuery(e.c);var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
			if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})					
		}catch(d){console.log("Failure at Presize of Slider:"+d)}						
	};</script>
<style id="custom-css" type="text/css">:root {--primary-color: #000000;}/* Site Width */.full-width .ubermenu-nav, .container, .row{max-width: 1170px}.row.row-collapse{max-width: 1140px}.row.row-small{max-width: 1162.5px}.row.row-large{max-width: 1200px}.header-main{height: 100px}#logo img{max-height: 100px}#logo{width:200px;}.header-bottom{min-height: 55px}.header-top{min-height: 30px}.has-transparent + .page-title:first-of-type,.has-transparent + #main > .page-title,.has-transparent + #main > div > .page-title,.has-transparent + #main .page-header-wrapper:first-of-type .page-title{padding-top: 100px;}.header.show-on-scroll,.stuck .header-main{height:70px!important}.stuck #logo img{max-height: 70px!important}.header-bg-color, .header-wrapper {background-color: rgba(0,0,0,0.9)}.header-bottom {background-color: #f1f1f1}.header-main .nav > li > a{line-height: 75px }.stuck .header-main .nav > li > a{line-height: 50px }.header-bottom-nav > li > a{line-height: 16px }@media (max-width: 549px) {.header-main{height: 70px}#logo img{max-height: 70px}}.nav-dropdown{font-size:100%}.nav-dropdown-has-arrow li.has-dropdown:after{border-bottom-color: #f9f9f9;}.nav .nav-dropdown{background-color: #f9f9f9}/* Color */.accordion-title.active, .has-icon-bg .icon .icon-inner,.logo a, .primary.is-underline, .primary.is-link, .badge-outline .badge-inner, .nav-outline > li.active> a,.nav-outline >li.active > a, .cart-icon strong,[data-color='primary'], .is-outline.primary{color: #000000;}/* Color !important */[data-text-color="primary"]{color: #000000!important;}/* Background */.scroll-to-bullets a,.featured-title, .label-new.menu-item > a:after, .nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,button[type="submit"], .button.wc-forward:not(.checkout):not(.checkout-button), .button.submit-button, .button.primary:not(.is-outline),.featured-table .title,.is-outline:hover, .has-icon:hover .icon-label,.nav-dropdown-bold .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold > li > a:hover, .nav-dropdown-bold.dark .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold.dark > li > a:hover, .is-outline:hover, .tagcloud a:hover,.grid-tools a, input[type='submit']:not(.is-form), .box-badge:hover .box-text, input.button.alt,.nav-box > li > a:hover,.nav-box > li.active > a,.nav-pills > li.active > a ,.current-dropdown .cart-icon strong, .cart-icon:hover strong, .nav-line-bottom > li > a:before, .nav-line-grow > li > a:before, .nav-line > li > a:before,.banner, .header-top, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover, .button.primary:not(.is-outline), input[type='submit'].primary, input[type='submit'].primary, input[type='reset'].button, input[type='button'].primary, .badge-inner{background-color: #000000;}/* Border */.nav-vertical.nav-tabs > li.active > a,.scroll-to-bullets a.active,.nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,.accordion-title.active,.featured-table,.is-outline:hover, .tagcloud a:hover,blockquote, .has-border, .cart-icon strong:after,.cart-icon strong,.blockUI:before, .processing:before,.loading-spin, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover{border-color: #000000}.nav-tabs > li.active > a{border-top-color: #000000}.widget_shopping_cart_content .blockUI.blockOverlay:before { border-left-color: #000000 }.woocommerce-checkout-review-order .blockUI.blockOverlay:before { border-left-color: #000000 }/* Fill */.slider .flickity-prev-next-button:hover svg,.slider .flickity-prev-next-button:hover .arrow{fill: #000000;}/* Background Color */[data-icon-label]:after, .secondary.is-underline:hover,.secondary.is-outline:hover,.icon-label,.button.secondary:not(.is-outline),.button.alt:not(.is-outline), .badge-inner.on-sale, .button.checkout, .single_add_to_cart_button{ background-color:#000000; }/* Color */.secondary.is-underline,.secondary.is-link, .secondary.is-outline,.stars a.active, .star-rating:before, .woocommerce-page .star-rating:before,.star-rating span:before, .color-secondary{color: #000000}/* Color !important */[data-text-color="secondary"]{color: #000000!important;}/* Border */.secondary.is-outline:hover{border-color:#000000}body{font-size: 98%;}@media screen and (max-width: 549px){body{font-size: 97%;}}body{font-family:"Roboto Condensed", sans-serif}body{font-weight: 0}body{color: #262626}.nav > li > a {font-family:"Roboto Condensed", sans-serif;}.nav > li > a {font-weight: 700;}h1,h2,h3,h4,h5,h6,.heading-font, .off-canvas-center .nav-sidebar.nav-vertical > li > a{font-family: "Roboto Condensed", sans-serif;}h1,h2,h3,h4,h5,h6,.heading-font,.banner h1,.banner h2{font-weight: 700;}h1,h2,h3,h4,h5,h6,.heading-font{color: #262626;}.alt-font{font-family: "Dancing Script", sans-serif;}.header:not(.transparent) .header-nav.nav > li > a {color: #ffffff;}a{color: #262626;}a:hover{color: #262626;}.tagcloud a:hover{border-color: #262626;background-color: #262626;}.products.has-equal-box-heights .box-image {padding-top: 100%;}@media screen and (min-width: 550px){.products .box-vertical .box-image{min-width: 250px!important;width: 250px!important;}}.footer-2{background-color: #000000}.absolute-footer, html{background-color: #000000}/* Custom CSS *//* LAYOUT *//* HEADER */.nav-dropdown>li.nav-dropdown-col, .nav-dropdown>li.image-column {width: 150px;min-width: 150px;}.nav-line-bottom > li > a:before {background-color: #c8ff0b;width: 50%;left: 26%;bottom: 20px;}.nav-spacing-xlarge>li {margin: 0 15px;}.nav-dropdown {box-shadow: none;border: 0px;border-top: 2px solid #c8ff0b;}.has-dropdown .icon-angle-down {display: none;}/* BODY */#main, .shop-page-title {background-image: url();background-repeat: no-repeat;}.woocommerce-page #main{background: none;}.shop-page-title h1{font-size: 70px;text-transform: uppercase;text-align: left;padding: 30px 0px;width: 70%;float: left;}.shop-page-title .woocommerce-breadcrumb {display: none;}.add-to-cart-button .button {width: 100%;}input[type='email'], input[type='date'], input[type='search'], input[type='number'], input[type='text'], input[type='tel'], input[type='url'], input[type='password'], textarea, select, .select2-container .select2-choice, .select2-container .select2-selection {box-sizing: border-box;border: 1px solid #000;padding: 0 .75em;height: 2.507em;font-size: .97em;border-radius: 0;max-width: 100%;width: 100%;vertical-align: middle;background-color: #fff;color: #333;box-shadow:none;transition: color .3s, border .3s, background .3s, opacity .3s;}input[type='search'] {border-right: 0px;}.searchform .submit-button {border: 1px solid #000;border-left: 0px;color: #000;background-color: #fff !important;}.widget .is-divider {visibility: hidden;}#shop-sidebar .widget {margin-bottom:3.0em;}.entry-header .entry-title {font-size: 70px;text-transform: uppercase;text-align: left;padding: 30px 0px;}.entry-header .is-divider {display: none;}/* FOOTER */.absolute-footer .container {border-top: 1px solid #2b2b2b;padding: 17px 0;}.footer-2 .widget .textwidget, .footer-2 .widget .textwidget p{color: #828282;}.footer span.widget-title {font-size: 17px;font-weight: 700;}.footer {font-size: 90%;}/* WOOCOMMERCE */.woocommerce-ordering, .woocommerce-ordering select {margin: 0;float: right;}.woocommerce-order {margin-bottom: 35px;padding: 0 10px;}.woocommerce-result-count {margin-top: 5px;}.box-image, .woocommerce-product-gallery {background: #000;}.box-image img, .woocommerce-product-gallery .product-gallery-slider {opacity: 0.98;}.badge-container {display: none;}.row-small>.flickity-viewport>.flickity-slider>.col, .row-small>.col {padding: 0px 20px 30px;}.box-text {font-size: 1.0em;text-transform: uppercase;font-weight: 600;}.add-to-cart-button {font-size: 1.2em;}.box-image .quick-view {color: #000;background-color: #c8ff0b;padding: 20px;font-size: 1.0em;}.box-image a:hover.quick-view {color: #000;}.product-thumbnails a {background-color: #ddd;}.product-tabs .nav>li>a {font-size: 1.0em;}.product-title {text-transform: none;font-weight: 400;}.secondary.is-underline, .secondary.is-link, .secondary.is-outline, .stars a.active, .star-rating:before, .woocommerce-page .star-rating:before, .star-rating span:before, .color-secondary {color: #ffc120;}.add-to-cart-button .button{margin-right: 0;}.button-continue-shopping {}.woocommerce-order-received .woocommerce-customer-details, .woocommerce-order-received .large-7 p, .woocommerce-order-received .custom-fields {display: none;}.buyer-verify {padding: 1px 0 1px 25px;background: url(https://mdbuddy.vn/home/wp-content/uploads/2018/12/buyer-check.png) no-repeat;background-size: contain;font-size: 14px;color: #22b345;}.comment-text p { margin-bottom: 5px;}.star-rating {display: inline-block;}.count-rating {display: inline-block;line-height: 1em;position: absolute;margin-top: 0.5em;font-size: 12px;font-weight: normal;text-transform: none;}.hidden-field {display: none;}.container .message-container, .woocommerce-billing-fields .optional {display: none;}/* Custom CSS Tablet */@media (max-width: 849px){.woocommerce-ordering, .woocommerce-ordering select {float: none;}.shop-page-title h1 {font-size: 1.5em;text-transform: uppercase;text-align: center;padding: 0px;width: 100%;float: none;}}.label-new.menu-item > a:after{content:"New";}.label-hot.menu-item > a:after{content:"Hot";}.label-sale.menu-item > a:after{content:"Sale";}.label-popular.menu-item > a:after{content:"Popular";}</style><style type="text/css" data-type="vc_custom-css">.zoom:hover {
    transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    transition: transform .3s; /* Animation */
}
</style>
	<style type="text/css" data-type="vc_shortcodes-custom-css">
		.vc_custom_1529747461899{margin-top: -30px !important;padding-top: 0px !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1529849673827{padding-bottom: 40px !important;background-color: #303030 !important;}.vc_custom_1529850345806{padding-top: 20px !important;padding-bottom: 50px !important;}.vc_custom_1530871875824{margin-bottom: -60px !important;padding-top: 30px !important;padding-bottom: 30px !important;background-image: url(https://mdbuddy.vn/home/wp-content/uploads/2017/10/shop-simple-parallax-1.jpg?id=1092) !important;background-position: 0 0;background-repeat:-repeat;}.vc_custom_1508151473244{padding-top: 0px !important;}.vc_custom_1529849305229{margin-bottom: 10px !important;}.vc_custom_1529849288194{margin-bottom: 50px !important;}.vc_custom_1529928845270{margin-bottom: 10px !important;}.vc_custom_1529849288194{margin-bottom: 50px !important;}.vc_custom_1529848133455{margin-bottom: 10px !important;}.vc_custom_1529848182421{margin-bottom: 50px !important;}
	</style>
	<noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
</head>

<body class="home page-template-default page page-id-891 woocommerce-no-js lightbox wpb-js-composer js-comp-ver-5.6 vc_responsive">

<a class="skip-link screen-reader-text" href="#main">Skip to content</a>

<div id="wrapper">
	@include('front-end.layout-final.header')
	@yield('content')
	@include('front-end.layout-final.footer')
</div><!-- #wrapper -->



@include('front-end.layout-final.login-popup')
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

	<!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
	<div class="pswp__bg"></div>

	<!-- Slides wrapper with overflow:hidden. -->
	<div class="pswp__scroll-wrap">

		<!-- Container that holds slides.
		PhotoSwipe keeps only 3 of them in the DOM to save memory.
		Don't modify these 3 pswp__item elements, data is added later on. -->
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>

		<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
		<div class="pswp__ui pswp__ui--hidden">

			<div class="pswp__top-bar">

				<!--  Controls are self-explanatory. Order can be changed. -->

				<div class="pswp__counter"></div>

				<button class="pswp__button pswp__button--close" aria-label="Đóng (Esc)"></button>

				<button class="pswp__button pswp__button--zoom" aria-label="Phóng to/ thu nhỏ"></button>

				<div class="pswp__preloader">
					<div class="loading-spin"></div>
				</div>
			</div>

			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div>

			<button class="pswp__button--arrow--left" aria-label="Ảnh trước (mũi tên trái)"></button>

			<button class="pswp__button--arrow--right" aria-label="Ảnh tiếp (mũi tên phải)"></button>

			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>

		</div>

	</div>

</div>


<script type='text/javascript' src="{{asset('noithatotoluxury/js/js.cookie.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/home\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/woocommerce.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/home\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_234744421eb04fe453e262cc8ac465da","fragment_name":"wc_fragments_234744421eb04fe453e262cc8ac465da"};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/cart-fragments.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/flatsome-live-search.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/hoverIntent.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var flatsomeVars = {"ajaxurl":"https:\/\/mdbuddy.vn\/home\/wp-admin\/admin-ajax.php","rtl":"","sticky_height":"70","user":{"can_edit_pages":false}};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/flatsome.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/woocommerce.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/wp-embed.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/js_composer_front.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/underscore.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/home\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/wp-util.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_no_matching_variations_text":"R\u1ea5t ti\u1ebfc, kh\u00f4ng c\u00f3 s\u1ea3n ph\u1ea9m n\u00e0o ph\u00f9 h\u1ee3p v\u1edbi l\u1ef1a ch\u1ecdn c\u1ee7a b\u1ea1n. H\u00e3y ch\u1ecdn m\u1ed9t ph\u01b0\u01a1ng th\u1ee9c k\u1ebft h\u1ee3p kh\u00e1c.","i18n_make_a_selection_text":"Ch\u1ecdn c\u00e1c t\u00f9y ch\u1ecdn cho s\u1ea3n ph\u1ea9m tr\u01b0\u1edbc khi cho s\u1ea3n ph\u1ea9m v\u00e0o gi\u1ecf h\u00e0ng c\u1ee7a b\u1ea1n.","i18n_unavailable_text":"R\u1ea5t ti\u1ebfc, s\u1ea3n ph\u1ea9m n\u00e0y hi\u1ec7n kh\u00f4ng t\u1ed3n t\u1ea1i. H\u00e3y ch\u1ecdn m\u1ed9t ph\u01b0\u01a1ng th\u1ee9c k\u1ebft h\u1ee3p kh\u00e1c."};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/add-to-cart-variation.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/skrollr.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/jquery.prettyPhoto.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/owl.carousel.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/imagesloaded.pkgd.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/waypoints.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/vc_grid.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/revolution.extension.navigation.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/revolution.extension.layeranimation.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/revolution.extension.parallax.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/revolution.extension.slideanims.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _zxcvbnSettings = {"src":"https:\/\/mdbuddy.vn\/home\/wp-includes\/js\/zxcvbn.min.js"};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/zxcvbn-async.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var pwsL10n = {"unknown":"M\u1eadt kh\u1ea9u m\u1ea1nh kh\u00f4ng x\u00e1c \u0111\u1ecbnh","short":"R\u1ea5t y\u1ebfu","bad":"Y\u1ebfu","good":"Trung b\u00ecnh","strong":"M\u1ea1nh","mismatch":"M\u1eadt kh\u1ea9u kh\u00f4ng kh\u1edbp"};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/password-strength-meter.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_password_strength_meter_params = {"min_password_strength":"3","i18n_password_error":"Vui l\u00f2ng nh\u1eadp m\u1eadt kh\u1ea9u kh\u00f3 h\u01a1n.","i18n_password_hint":"G\u1ee3i \u00fd: M\u1eadt kh\u1ea9u ph\u1ea3i c\u00f3 \u00edt nh\u1ea5t 12 k\u00fd t\u1ef1. \u0110\u1ec3 n\u00e2ng cao \u0111\u1ed9 b\u1ea3o m\u1eadt, s\u1eed d\u1ee5ng ch\u1eef in hoa, in th\u01b0\u1eddng, ch\u1eef s\u1ed1 v\u00e0 c\u00e1c k\u00fd t\u1ef1 \u0111\u1eb7c bi\u1ec7t nh\u01b0 ! \" ? $ % ^ & )."};
/* ]]> */
</script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/password2-strength-meter.min.js')}}"></script>

<script type="text/javascript" src="{{asset('noithatotoluxury/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('noithatotoluxury/js/product.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/photoswipe.min.js')}}"></script>
<script type='text/javascript' src="{{asset('noithatotoluxury/js/photoswipe-ui-default.min.js')}}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_single_product_params = {"i18n_required_rating_text":"Vui l\u00f2ng ch\u1ecdn m\u1ed9t m\u1ee9c \u0111\u00e1nh gi\u00e1","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"","zoom_options":[],"photoswipe_enabled":"1","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":""};
/* ]]> */
</script>
<script type="text/javascript" src="{{asset('noithatotoluxury/js/single-product.min.js')}}"></script>
<script src="{{asset('noithatotoluxury/js/popup-video/jquery-modal-video.min.js')}}"></script>
<script>
	jQuery(".js-video-button").modalVideo({
		youtube:{
			controls:1,
			autoplay:1,
			nocookie: true
		}
	});
</script>

</body>
</html>
