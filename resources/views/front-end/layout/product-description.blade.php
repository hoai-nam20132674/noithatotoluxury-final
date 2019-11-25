<div class="col-xs-12">
	<div class="row margin-top-30 xs-margin-top-15">
		
		<div class="col-xs-12">
			<!-- Nav tabs -->									
			<div class="product-tab e-tabs">
				<ul class="tabs tabs-title clearfix">	
					
					<li class="tab-link" data-tab="tab-1">
						<h3><span>Mô tả</span></h3>
					</li>																	
					
					
					
					<li class="tab-link" data-tab="tab-3">
						<h3><span>Đánh giá(APP)</span></h3>
					</li>																	
					
				</ul>																									

				
				<div id="tab-1" class="tab-content">
					{!!$products->content!!}
				</div>	
				
				
				
				<div id="tab-3" class="tab-content">
					<div id="bizweb-product-reviews" class="bizweb-product-reviews" data-id="8829397">
						<div><div class="title-bl">
						    <h4>Đánh giá sản phẩm</h4>
						</div>
						<div id="bizweb-product-reviews-sub">
						    <div id="bizweb-product-reviews-summary" class="bizweb-product-reviews-summary">
						        <!--<div itemtype="http://schema.org/Product" itemscope>-->
						        <div>
						            <div itemscope="" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" class="bpr-summary">
						                <meta content="5" itemprop="bestRating">
						                <meta content="1" itemprop="worstRating">
										@php
								    		$feedback = App\Feedbacks::where('products_id',$products->id)->get();
								    		$countRate = App\Http\Controllers\AuthClient\ClientController::countRate($feedback);
								    		if(count($feedback)==0){
								    			$rate=0;
								    		}
								    		else{
												$rate = $countRate/count($feedback);
								    		}
								    		
								    	@endphp
						                <span class="bpr-summary-average" itemprop="ratingValue">{{$rate}}</span>
						                <div data-number="5" data-score="0" class="bizweb-product-reviews-star" id="bizweb-prv-summary-star" title="Not rated yet!" style="color: rgb(255, 190, 0);">

											@if($rate == 0)
								    				
						    					<i data-alt="1" class="star-off-png" title="good"></i>&nbsp;<i data-alt="2" class="star-off-png" title="good"></i>&nbsp;<i data-alt="3" class="star-off-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">

						                	@elseif($rate == 1)
								    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-off-png" title="good"></i>&nbsp;<i data-alt="3" class="star-off-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">

						    				@elseif($rate > 1 && $rate < 2)
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-half-png" title="good"></i>&nbsp;<i data-alt="3" class="star-off-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">
							    				
							    			@elseif($rate == 2)
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-off-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">
							    			
							    			@elseif($rate > 2 && $rate < 3)
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-half-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">
							    				
							    			@elseif($rate == 3)
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">
							    			
							    			@elseif($rate > 3 && $rate < 4)
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-half-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">
							    					
							    			@elseif($rate == 4)
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-on-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">

							    			@elseif($rate > 4 && $rate < 5)
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-on-png" title="good"></i>&nbsp;<i data-alt="5" class="star-half-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">
							    				
							    			@else
							    				
						    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-on-png" title="good"></i>&nbsp;<i data-alt="5" class="star-on-png" title="good"></i>
						    					<input name="score" type="hidden" value="4" readonly="">
							    				
							    			@endif
						            	</div>
						                <div class="bpr-summary-caption">
						                    <div></div>
						                    <div>
						                        <div><p itemprop="ratingCount">{{count($feedback)}}</p></div>
						                        <div><img height="15" width="16" src="https://productreviews.bizwebapps.vn/assets/images/user.png"></div>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>
						    <span class="product-reviews-summary-actions">
						    	@if(Auth::guard('users_client')->user())
						        	<input type="button" class="open-feedback" user-id="{{Auth::guard('users_client')->user()->id}}" product-id="{{$products->id}}" id="btnnewreview" value="Viết đánh giá">
						        @else
						        	<input type="button" class="open-feedback" user-id="" product-id="{{$products->id}}" id="btnnewreview" value="Viết đánh giá">
						        @endif
						    </span>
						    
						    <div id="bpr-list" class="bizweb-product-reviews-list">
						    	@php
						    		$feedback = App\Feedbacks::where('products_id',$products->id)->get();
						    	@endphp
						    	@foreach($feedback as $item)
							    	<div id="bizweb-review-{{$item->id}}" class="bizweb-review" itemscope="" itemtype="http://schema.org/Review" itemprop="review">
							    		<div class="bizweb-review-header">
							    			<div>
							    				<div class="bizweb-review-header-img">
							    					<img src="https://productreviews.bizwebapps.vn//assets/images/user.png" width="16" height="15">
							    				</div>
							    			</div>
							    			<div>
							    				@php
										    		$user = App\UsersClient::where('id',$item->id)->get()->first();
										    	@endphp
							    				<span class="bizweb-review-header-byline" itemprop="author">{{$user->name}}</span>
							    				@if($item->rate == 1)
								    				<div class="bizweb-product-reviews-star" data-score="1" data-number="5" title="bad" style="color: rgb(255, 190, 0);">
								    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-off-png" title="good"></i>&nbsp;<i data-alt="3" class="star-off-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
								    					<input name="score" type="hidden" value="4" readonly="">
								    				</div>
								    			@elseif($item->rate == 2)
								    				<div class="bizweb-product-reviews-star" data-score="1" data-number="5" title="bad" style="color: rgb(255, 190, 0);">
								    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-off-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
								    					<input name="score" type="hidden" value="4" readonly="">
								    				</div>
								    			@elseif($item->rate == 3)
								    				<div class="bizweb-product-reviews-star" data-score="1" data-number="5" title="bad" style="color: rgb(255, 190, 0);">
								    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-off-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
								    					<input name="score" type="hidden" value="4" readonly="">
								    				</div>
								    			@elseif($item->rate == 4)
								    				<div class="bizweb-product-reviews-star" data-score="1" data-number="5" title="bad" style="color: rgb(255, 190, 0);">
								    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-on-png" title="good"></i>&nbsp;<i data-alt="5" class="star-off-png" title="good"></i>
								    					<input name="score" type="hidden" value="4" readonly="">
								    				</div>
								    			@else
								    				<div class="bizweb-product-reviews-star" data-score="1" data-number="5" title="bad" style="color: rgb(255, 190, 0);">
								    					<i data-alt="1" class="star-on-png" title="good"></i>&nbsp;<i data-alt="2" class="star-on-png" title="good"></i>&nbsp;<i data-alt="3" class="star-on-png" title="good"></i>&nbsp;<i data-alt="4" class="star-on-png" title="good"></i>&nbsp;<i data-alt="5" class="star-on-png" title="good"></i>
								    					<input name="score" type="hidden" value="4" readonly="">
								    				</div>
								    			@endif
							    				<span class="bizweb-review-header-time" itemprop="datePublished">{{ \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans()}}</span>
							    			</div>
							    			
							    			
							    		</div>
							    		<div class="bizweb-review-content">
							    			<p class="bizweb-review-content-body" itemprop="description">{{$item->messages}}</p>
							    		</div>
							    		<div class="bizweb-review-footer"></div>
							    		<div style="display:none;" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating"><span itemprop="ratingValue">4</span>
							    		</div>
							    	</div>
							    @endforeach
						    </div>
						    <div id="bpr-more-reviews"></div>
						</div></div>
					</div>
				</div>	
				
			</div>


		</div>
		

	</div>
</div>