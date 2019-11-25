
<div class="col-xs-12 details-product">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
			<div class="relative product-image-block ">
				<div class="large-image">

					<a href="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" data-rel="prettyPhoto[product-gallery]">
						<img width="100%" id="zoom_01" src="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" alt="{{$products->title}}">
					</a>							
					<div class="hidden">
						
						@foreach($images as $image)
						<div class="item">
							<a href="{{asset('uploads/images/products/detail/'.$image->url)}}" data-image="{{asset('uploads/images/products/detail/'.$products->avatar)}}" data-zoom-image="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" data-rel="prettyPhoto[product-gallery]">										
							</a>
						</div>
						@endforeach
						
					</div>
				</div>						
				
				<div id="gallery_01" class="owl-carousel owl-theme thumbnail-product margin-top-15" data-md-items="4" data-sm-items="4" data-xs-items="4" data-xss-items="3" data-margin="20" data-nav="true">
					

					<div class="item">
						<a class="thumb-link" href="javascript:void(0);" data-image="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" data-zoom-image="{{asset('uploads/images/products/avatar/'.$products->avatar)}}">
							<img class="avatar" src="{{asset('uploads/images/products/avatar/'.$products->avatar)}}" alt="{{$products->title}}">
						</a>
					</div>
					
					@foreach($images as $image)
						<div class="item">
							<a class="thumb-link" href="javascript:void(0);" data-image="{{asset('uploads/images/products/detail/'.$image->url)}}" data-zoom-image="{{asset('uploads/images/products/detail/'.$image->url)}}">
								<img  src="{{asset('uploads/images/products/detail/'.$image->url)}}" alt="{{$products->title}}">
							</a>
						</div>
					@endforeach
				</div>
				
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 details-pro a-left">
			<h1 class="title-head" title="{{$products->name}}">{{$products->name}}</h1>
			<div class="review hidden">
				<div class="bizweb-product-reviews-badge" data-id="8829397"></div>
				<span class="line"> | </span>
				<span id="comment" onclick="scrollToxx();">Viết nhận xét</span>
			</div>
			<div class="detail-header-info">
				Thương hiệu:
				@php
					$st = App\Categories::where('id',$products->categories_id)->get()->first();
					$st = App\Systems::where('id',$st->systems_id)->get()->first();

					$feedback = App\Feedbacks::where('products_id',$products->id)->get();
					$countRate = App\Http\Controllers\AuthClient\ClientController::countRate($feedback);
					if(count($feedback)==0){
						$rate=0;
					}
					else{
						$rate = $countRate/count($feedback);
					}
					
				
				@endphp
				<a href="/{{$st->website}}"><span class="vendor" style="background-color:#fe3232; color: #fff; padding: 2px 5px; border-radius: 4px;">{{$st->name}}</span></a>
				<span class="line">|</span>Mã SP:<span class="masp">{{$products->id}}</span>
				<span class="line">|</span>
				<span class="inline-block">
					<div class="bizweb-product-reviews-badge" data-id="8829397">
						<div class="bizweb-product-reviews-star" data-score="0" data-number="5" title="Not rated yet!" style="color: rgb(255, 190, 0);">
							@if($rate == 0)				
		    					<i data-alt="1" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
		                	@elseif($rate == 1)
				    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">

		    				@elseif($rate > 1 && $rate < 2)
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-half-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
			    				
			    			@elseif($rate == 2)
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
			    			
			    			@elseif($rate > 2 && $rate < 3)
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-half-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
			    				
			    			@elseif($rate == 3)
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-off-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
			    			
			    			@elseif($rate > 3 && $rate < 4)
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-half-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
			    					
			    			@elseif($rate == 4)
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-off-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">

			    			@elseif($rate > 4 && $rate < 5)
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-half-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
			    				
			    			@else
			    				
		    					<i data-alt="1" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="2" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="3" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="4" class="star-on-png" title="Not rated yet!">
								</i>&nbsp;<i data-alt="5" class="star-on-png" title="Not rated yet!">
								</i><input name="score" type="hidden" readonly="">
			    				
			    			@endif
							<input name="score" type="hidden" readonly=""></div><div><p>{{count($feedback)}}</p></div><div><img src="https://productreviews.bizwebapps.vn//assets/images/user.png" width="18" height="17"></div>
					</div>
				</span>
				<span class="line">|</span>
				@if(Auth::guard('users_client')->user())
					<a href="#" class="follow-system" system-id="{{$st->id}}" user-id="{{Auth::guard('users_client')->user()->id}}"><span class="vendor" style="background-color:#00b3b3; color: #fff; padding: 2px 5px; border-radius: 4px;"><i class="fa fa-user-plus font-some" aria-hidden="true"></i>Theo dõi gian hàng</span></a>
				@else
					<a href="#" class="follow-system" system-id="{{$st->id}}" user-id=""><span class="vendor" style="background-color:#00b3b3; color: #fff; padding: 2px 5px; border-radius: 4px;"><i class="fa fa-user-plus font-some" aria-hidden="true"></i>Theo dõi gian hàng</span></a>
				@endif
			</div>


			<div class="price-box">
				@if($products->price != $products->maxPrice)
					<span class="special-price"><span class="price price-detail product-price" price="">{!!number_format($products->price)!!} ₫ - {!!number_format($products->maxPrice)!!}₫</span> <span style="font-size: 20px; padding: 0px 10px;">Số Lượng: <span class="count-product-detail">{{$products->amount}}</span></span> <!-- Giá Khuyến mại -->

				@else
					<span class="special-price"><span class="price price-detail product-price" price="{{$products->price}}">{!!number_format($products->price)!!} ₫</span> <span style="font-size: 20px; padding: 0px 10px;">Số Lượng: <span class="count-product-detail">{{$products->amount}}</span></span>  <!-- Giá gốc -->
				@endif
			</div>

			
			

			<div class="form-product">
				<form class="form-inline margin-bottom-10 dqdt-form">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					@include('front-end.layout.swatch')
					
					
					<div class="form-group form-groupx form-detail-action clearfix">
						<div class="">
							<label class="hidden">Số lượng: </label>
							<div class="custom custom-btn-number">																			
								<span class="qtyminus" data-field="quantity">-</span>
								<input type="text" class="input-text qty" data-field='quantity' title="Số lượng" value="1" maxlength="12" id="qty" name="quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onChange="if(this.value == '')this.value=1;">									
								<span class="qtyplus" data-field="quantity">+</span>										
							</div>

																
							<button id="add-to-cart" products_id="{{$products->id}}" url="check-add-to-cart/{{$products->id}}" class="btn btn-lg btn-primary " title="Cho vào giỏ hàng">
								<span>Thêm vào giỏ hàng</span>
							</button>									
							
						</div>
						
						
					</div>	


				</form>

				<!-- <div class="thongtinkhuyenmai">
					<h2>Khuyến mãi cực lớn</h2>
					<div class="content rte rte-summary">
						
						<ul>
							<li>Giảm mụn, cải tiện sắc tố da, cho làn da tươi sáng, đều màu.</li>
							<li>Phù hợp với làn da nhờn mụn và nhạy cảm.</li>
							<li>Chỉ số chống nắng SPF 30 giúp ngăn ngừa tác nhân gây hại từ ánh nắng mặt trời.</li>
							<li>Dùng được cho cả trẻ em từ 3-7 tuổi.</li>
						</ul>
					</div>
				</div> -->
				
				
				
				<div class="contact">Gọi <a href="tel:{{$st->phone}}">{{$st->phone}}</a> để được tư vấn miễn phí</div>

				
				
			</div>

		</div>
	</div>				
</div>

