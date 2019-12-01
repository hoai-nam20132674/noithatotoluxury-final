@extends('front-end.layout-final.default')
@section('meta')
  <title>{{$products->title}}</title>
  <meta name="description" content="{{$products->seo_description}}"/>
  <meta name="keywords" content="{{$products->seo_keyword}}"/>
  <link rel="canonical" href="{{$products->url}}" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{$products->title}}" />
  <meta property="og:description" content="{{$products->seo_description}}" />
  <meta property="og:url" content="{{$products->url}}" />
  <meta property="og:image" content="{{asset('uploads/images/products/share_image/'.$products->share_image)}}" />
  <!-- <meta property="og:site_name" content="{{$products->name}}" /> -->
  <meta name="twitter:description" content="{{$products->seo_description}}" />
  <meta name="twitter:title" content="{{$products->title}}" />
  <link rel="stylesheet" href="{{asset('noithatotoluxury/css/popup-video/modal-video.min.css')}}">
@endsection
@section('content')
  <main id="main" class="">

  	<div class="shop-container">
  	   <div class="flex-col medium-text-center woocommerce-order">
  	  	 		   </div><!-- .flex-right -->

  		
  			<div class="container">
  	<div class="woocommerce-notices-wrapper"></div></div><!-- /.container -->
  <div id="product-7084" class="product type-product status-publish has-post-thumbnail first instock sale shipping-taxable purchasable product-type-simple">
  	<div class="product-container">

  <div class="product-main">
  	<div class="row content-row mb-0">

      <div class="product-gallery col large-6">
      		
        <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">

          <div class="badge-container is-larger absolute left top z-1">
        		<div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
          </div>
          <div class="image-tools absolute top show-on-hover right z-3"></div>

          <figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half"
                data-flickity-options='{
                        "cellAlign": "center",
                        "wrapAround": true,
                        "autoPlay": false,
                        "prevNextButtons":true,
                        "adaptiveHeight": true,
                        "imagesLoaded": true,
                        "lazyLoad": 1,
                        "dragThreshold" : 15,
                        "pageDots": false,
                        "rightToLeft": false}'>
            <div data-thumb="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" class="woocommerce-product-gallery__image slide first">
              <a href="{{asset('uploads/images/products/avatar/'.$products->avatar)}}">
                <img width="510" height="510" src="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" class="wp-post-image" alt="{{$products->name}}" title="{{$products->name}}" data-caption="{{$products->name}}" data-src="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" data-large_image="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" data-large_image_width="900" data-large_image_height="900"/>
              </a>
            </div>
            @foreach($images as $image)
              <div data-thumb="{{asset('uploads/images/products/detail/'.$image->url)}}" class="woocommerce-product-gallery__image slide">
                <a href="{{asset('uploads/images/products/detail/'.$image->url)}}">
                  <img width="510" height="510" src="{{asset('uploads/images/products/detail/'.$image->url)}}" class="wp-post-image" alt="{{$products->name}}" title="{{$products->name}}" data-caption="{{$products->name}}" data-src="{{asset('uploads/images/products/detail/'.$image->url)}}" data-large_image="{{asset('uploads/images/products/detail/'.$image->url)}}" data-large_image_width="900" data-large_image_height="900"/>
                </a>
              </div>
            @endforeach
            
          </figure>

          <div class="image-tools absolute bottom left z-3">
                <a href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small" title="Zoom">
              <i class="icon-expand" ></i>    </a>
           </div>
        </div>
        <div class="row">
          <!-- <div class="col first is-selected is-nav-selected large-3 video-thumbnails">
            <a>
              <img width="100%" src="https://www.iconninja.com/files/208/79/696/youtube-video-web-media-play-player-icon.svg">
            </a>
          </div> -->
          <div class="col large-12">
            <div class="col video-thumbnails" style="width: 25%; float: left;">
              <!-- <button class="js-video-button" data-video-id='L61p2uyiMSo'>Youtube</button> -->
              <a class="js-video-button" data-video-id='{{$products->video}}'>
                <img width="100%" src="https://www.bhamcityschools.org/cms/lib/AL01001646/Centricity/Domain/3685/video%20icon.gif">
              </a>
            </div>
            <div style="width: 75%;float: right;" class="product-thumbnails thumbnails slider row row-small row-slider slider-nav-small small-columns-3"
              data-flickity-options='{
                        "cellAlign": "left",
                        "wrapAround": false,
                        "autoPlay": false,
                        "prevNextButtons": true,
                        "asNavFor": ".product-gallery-slider",
                        "percentPosition": true,
                        "imagesLoaded": true,
                        "pageDots": false,
                        "rightToLeft": false,
                        "contain": true
                    }'
              >
              <div class="col is-nav-selected first">
                  <a><img src="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" width="250" height="250" class="attachment-woocommerce_thumbnail avatar" data-id="{{$products->products_detail_id}}"/></a>
              </div>
              @foreach($images as $image)
                <div class="col">
                  <a><img src="{{asset('uploads/images/products/detail/'.$image->url)}}" width="250" height="250"  class="attachment-woocommerce_thumbnail" /></a>
                </div>
              @endforeach
              
            </div><!-- .product-thumbnails -->
          </div>
        </div>
      </div>

  		<div class="product-info summary col-fit col entry-summary product-summary">
  			<nav class="woocommerce-breadcrumb breadcrumbs">
          <a href="/">Trang chủ</a> <span class="divider">&#47;</span> 
          <a href="{{$cate_parent->url}}">{{$cate_parent->name}}</a><span class="divider">&#47;</span> 
          <a title="{{$products->name}}">{!! \Illuminate\Support\Str::words($products->name, 4,'...')  !!}</a>
        </nav>
        <h1 class="product-title entry-title title-head" data-id="{{$products->products_detail_id}}" title="{{$products->name}}">{{$products->name}}</h1>

  	<div class="is-divider small"></div>
    <!-- <ul class="next-prev-thumbs is-small show-for-medium">
        <li class="prod-dropdown has-dropdown">
             <a href="https://mdbuddy.vn/product/dung-cu-tap-co-bap-chan-tai-nha-mdbuddy-md1477/"  rel="next" class="button icon is-outline circle">
                <i class="icon-angle-left" ></i>              </a>
            <div class="nav-dropdown">
              <a title="Dụng cụ tập cơ bắp chân tại nhà MDBuddy MD1477" href="https://mdbuddy.vn/product/dung-cu-tap-co-bap-chan-tai-nha-mdbuddy-md1477/">
              <img width="100" height="100" src="https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-100x100.jpg 100w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-150x150.jpg 150w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-300x300.jpg 300w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-250x250.jpg 250w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-510x510.jpg 510w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9.jpg 720w" sizes="(max-width: 100px) 100vw, 100px" /></a>
            </div>
        </li>
             <li class="prod-dropdown has-dropdown">
             <a href="https://mdbuddy.vn/product/day-thang-tap-luyen-bo-phap-mdbuddy-md1340-4m/" rel="next" class="button icon is-outline circle">
                <i class="icon-angle-right" ></i>              </a>
            <div class="nav-dropdown">
                <a title="Dây thang tập luyện bộ pháp MDBuddy MD1340" href="https://mdbuddy.vn/product/day-thang-tap-luyen-bo-phap-mdbuddy-md1340-4m/">
                <img width="100" height="100" src="https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-100x100.jpg 100w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-150x150.jpg 150w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-300x300.jpg 300w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-250x250.jpg 250w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-510x510.jpg 510w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1.jpg 720w" sizes="(max-width: 100px) 100vw, 100px" /></a>
            </div>
        </li>
    </ul> -->
    <!-- đánh giá sao -->
  	<!-- <div class="woocommerce-product-rating">
  		<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><div class="star-rating"><span style="width:100%"><strong class="rating">5.00</strong> trên 5 dựa trên <span class="rating">2</span> đánh giá</span></div></a></div> -->
    <!--end đánh giá sao -->

  <div class="price-wrapper">
  	<p class="price product-page-price price-on-sale">
      <del><span class="woocommerce-Price-amount amount">{!!number_format($products->price)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del>
      <ins><span class="woocommerce-Price-amount amount price-detail" data-id="{{$products->products_detail_id}}" price="{{$products->sale}}">{!!number_format($products->sale)!!}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins>
    </p>
  </div>
  <!-- mô tả ngắn -->
  <div class="product-short-description">
  	{!!$products->short_description!!}
  </div>
  <!--End mô tả ngắn -->
  	
  	<form class="cart" >
  		
  		<div class="quantity buttons_added">
    		<input type="button" value="-" class="minus button is-form">
        <label class="screen-reader-text" for="quantity_5dbbb52113bd0">Số lượng</label>
    		<input
          data-id="{{$products->products_detail_id}}"
    			type="number"
    			id="quantity_5dbbb52113bd0"
    			class="input-text qty text"
    			step="1"
    			min="1"
    			max="9999"
    			name="quantity"
    			value="1"
    			title="SL"
    			size="4"
    			pattern="[0-9]*"
    			inputmode="numeric"
    			aria-labelledby="Bộ 5 dây tập thể dục đàn hồi chính hãng MDBuddy MD1366 số lượng" />
    		<input type="button" value="+" class="plus button is-form">
      </div>
  	
  		<button type="button" name="add-to-cart" id="add-to-cart" url="/{{$products->url}}" products_detail_id="{{$products->products_detail_id}}" products_id="{{$products->id}}" class="single_add_to_cart_button button alt">Thêm vào giỏ</button>

  	</form>

  	
  <div class="product_meta">

  	
  	
  		<span class="sku_wrapper">Mã: <span class="sku">{{$products->code}}</span></span>

  	
  	<span class="posted_in">Danh mục: <a href="{{$cate_parent->url}}" rel="tag">{{$cate_parent->name}}</a></span>
  	
  	
  </div>

  <div class="social-icons share-icons share-row relative icon-style-outline " >
    <a href="whatsapp://send?text=B%E1%BB%99%205%20d%C3%A2y%20t%E1%BA%ADp%20th%E1%BB%83%20d%E1%BB%A5c%20%C4%91%C3%A0n%20h%E1%BB%93i%20ch%C3%ADnh%20h%C3%A3ng%20MDBuddy%20MD1366 - https://mdbuddy.vn/product/bo-5-day-tap-the-duc-dan-hoi-chinh-hang-mdbuddy-md1366/" data-action="share/whatsapp/share" class="icon button circle is-outline tooltip whatsapp show-for-medium" title="Share on WhatsApp"><i class="icon-phone"></i></a>
    <a href="//www.facebook.com/sharer.php?u=http://cafebip.com/chi-tiet/diem-trung-tuyen-dai-hoc-ha-noi-he-chinh-quy-nam-2019" data-label="Facebook" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip facebook" title="Share on Facebook"><i class="icon-facebook" ></i></a>
    <a href="//twitter.com/share?url=http://cafebip.com/chi-tiet/diem-trung-tuyen-dai-hoc-ha-noi-he-chinh-quy-nam-2019" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip twitter" title="Share on Twitter"><i class="icon-twitter" ></i></a>
    <a href="mailto:enteryour@addresshere.com?subject=B%E1%BB%99%205%20d%C3%A2y%20t%E1%BA%ADp%20th%E1%BB%83%20d%E1%BB%A5c%20%C4%91%C3%A0n%20h%E1%BB%93i%20ch%C3%ADnh%20h%C3%A3ng%20MDBuddy%20MD1366&amp;body=Check%20this%20out:%20http://cafebip.com/chi-tiet/diem-trung-tuyen-dai-hoc-ha-noi-he-chinh-quy-nam-2019" rel="nofollow" class="icon button circle is-outline tooltip email" title="Email to a Friend"><i class="icon-envelop" ></i></a>
    <a href="//pinterest.com/pin/create/button/?url=http://cafebip.com/chi-tiet/diem-trung-tuyen-dai-hoc-ha-noi-he-chinh-quy-nam-2019&amp;media=https://mdbuddy.vn/home/wp-content/uploads/2018/09/bo-5-day-tap-the-duc-dan-hoi-12.jpg&amp;description=B%E1%BB%99%205%20d%C3%A2y%20t%E1%BA%ADp%20th%E1%BB%83%20d%E1%BB%A5c%20%C4%91%C3%A0n%20h%E1%BB%93i%20ch%C3%ADnh%20h%C3%A3ng%20MDBuddy%20MD1366" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip pinterest" title="Pin on Pinterest"><i class="icon-pinterest" ></i></a>
    <a href="//plus.google.com/share?url=http://cafebip.com/chi-tiet/diem-trung-tuyen-dai-hoc-ha-noi-he-chinh-quy-nam-2019" target="_blank" class="icon button circle is-outline tooltip google-plus" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" title="Share on Google+"><i class="icon-google-plus" ></i></a>
    <a href="//www.linkedin.com/shareArticle?mini=true&url=http://cafebip.com/chi-tiet/diem-trung-tuyen-dai-hoc-ha-noi-he-chinh-quy-nam-2019/&title=B%E1%BB%99%205%20d%C3%A2y%20t%E1%BA%ADp%20th%E1%BB%83%20d%E1%BB%A5c%20%C4%91%C3%A0n%20h%E1%BB%93i%20ch%C3%ADnh%20h%C3%A3ng%20MDBuddy%20MD1366" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="noopener noreferrer nofollow" target="_blank" class="icon button circle is-outline tooltip linkedin" title="Share on LinkedIn"><i class="icon-linkedin" ></i></a></div>
  		</div><!-- .summary -->


  		<!-- <div id="product-sidebar" class="col large-2 hide-for-medium product-sidebar-small">
  			<div class="hide-for-off-canvas" style="width:100%"><ul class="next-prev-thumbs is-small nav-right text-right">         <li class="prod-dropdown has-dropdown">
                 <a href="https://mdbuddy.vn/product/dung-cu-tap-co-bap-chan-tai-nha-mdbuddy-md1477/"  rel="next" class="button icon is-outline circle">
                    <i class="icon-angle-left" ></i>              </a>
                <div class="nav-dropdown">
                  <a title="Dụng cụ tập cơ bắp chân tại nhà MDBuddy MD1477" href="https://mdbuddy.vn/product/dung-cu-tap-co-bap-chan-tai-nha-mdbuddy-md1477/">
                  <img width="100" height="100" src="https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-100x100.jpg 100w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-150x150.jpg 150w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-300x300.jpg 300w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-250x250.jpg 250w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9-510x510.jpg 510w, https://mdbuddy.vn/home/wp-content/uploads/2018/11/dung-cu-tap-bap-chan-tai-nha-9.jpg 720w" sizes="(max-width: 100px) 100vw, 100px" /></a>
                </div>
            </li>
                 <li class="prod-dropdown has-dropdown">
                 <a href="https://mdbuddy.vn/product/day-thang-tap-luyen-bo-phap-mdbuddy-md1340-4m/" rel="next" class="button icon is-outline circle">
                    <i class="icon-angle-right" ></i>              </a>
                <div class="nav-dropdown">
                    <a title="Dây thang tập luyện bộ pháp MDBuddy MD1340" href="https://mdbuddy.vn/product/day-thang-tap-luyen-bo-phap-mdbuddy-md1340-4m/">
                    <img width="100" height="100" src="https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-100x100.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-100x100.jpg 100w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-150x150.jpg 150w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-300x300.jpg 300w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-250x250.jpg 250w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1-510x510.jpg 510w, https://mdbuddy.vn/home/wp-content/uploads/2018/07/day-thang-bo-phap-3-1.jpg 720w" sizes="(max-width: 100px) 100vw, 100px" /></a>
                </div>
            </li>
        </ul></div>		</div> -->

  	</div><!-- .row -->
  </div><!-- .product-main -->

  <div class="product-footer">
  	<div class="container">
  		
  	<div class="woocommerce-tabs container tabbed-content">
  		  <ul class="product-tabs  nav small-nav-collapse tabs nav nav-uppercase nav-line nav-left">
  				<li class="description_tab  active">
  					<a href="#tab-description">Mô tả</a>
  				</li>
  				<li class="comments_tab">
            <a href="#tab-comments">Bình luận</a>
          </li>	
  				<!-- <li class="reviews_tab  ">
  					<a href="#tab-reviews">Đánh giá (2)</a>
  				</li> -->
  			</ul>
  		<div class="tab-panels">
  		  <!-- mô tả sản phẩm -->
  			<div class="panel entry-content active" id="tab-description">
          {!!$products->content!!}
        </div>
        <div class="panel entry-content" id="tab-comments">
          nội dung coments
        </div>
  		</div><!-- .tab-panels -->
  	</div><!-- .tabbed-content -->


    <div class="related related-products-wrapper product-section">

      <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
        Sản phẩm tương tự</h3>
        <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : true}'>



          @foreach($products_same as $product) 
              @include('front-end.layout-final.product-box')
          @endforeach




        </div>
    </div>

  	</div><!-- .container -->
  </div><!-- .product-footer -->
  </div><!-- .product-container -->
  </div>

  		
  	</div><!-- shop container -->

  </main><!-- #main -->
@endsection