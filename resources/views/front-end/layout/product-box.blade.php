@php
	$feedback = App\Feedbacks::where('products_id',$pr->id)->get();
	$countRate = App\Http\Controllers\AuthClient\ClientController::countRate($feedback);
	if(count($feedback)==0){
		$rate=0;
	}
	else{
		$rate = $countRate/count($feedback);
	}
	
@endphp
@if($system->id ==1)

	<div class="product-box" style="">	
		<div class="product-thumbnail">		
			<!-- <div class="sale-flash">Sale</div> -->
			<a href="/{{$pr->url}}" title="{{$pr->name}}">
				<img width="100%" src="{{asset('uploads/images/products/avatar/'.$pr->avatar)}}" alt="{{$pr->title}}">
			</a>
		</div>
		<div class="product-info a-left">		
			<h3 class="product-name"><a href="/{{$pr->url}}" title="{{$pr->name}}">{!! \Illuminate\Support\Str::words($pr->name, 4,'...')  !!}</a></h3>
			<div class="price-box clearfix">			
				@if($pr->price == $pr->maxPrice)
					<div class="special-price f-left">
						<span class="price product-price">{!!number_format($pr->price)!!} đ</span>
					</div>
				@else			
					<div class="special-price f-left">
						<span class="price product-price">{!!number_format($pr->price)!!} đ -</span>
					</div>
					
					<div class="special-price f-left">															 
						<span class="price product-price">{!!number_format($pr->maxPrice)!!} đ</span>
					</div>
				@endif
				<!-- <div class="price-sale-flash f-left">-24% </div> -->
							
			</div>		
			
			
			<div class="bizweb-product-reviews-badge" >
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
				</div>
			</div>
		</div>
		
		

	</div>

@else

	<div class="product-box" style="">	
		<div class="product-thumbnail">		
			<!-- <div class="sale-flash">Sale</div> -->
			<a href="/{{$system->website}}/{{$pr->url}}" title="{{$pr->name}}">
				<img width="100%" src="{{asset('uploads/images/products/avatar/'.$pr->avatar)}}" alt="{{$pr->title}}">
			</a>
		</div>
		<div class="product-info a-left">		
			<h3 class="product-name"><a href="/{{$system->website}}/{{$pr->url}}" title="{{$pr->name}}">{!! \Illuminate\Support\Str::words($pr->name, 4,'...')  !!}</a></h3>
			<div class="price-box clearfix">
				@if($pr->price == $pr->maxPrice)
					<div class="special-price f-left">
						<span class="price product-price">{!!number_format($pr->price)!!} đ</span>
					</div>
				@else			
					<div class="special-price f-left">
						<span class="price product-price">{!!number_format($pr->price)!!} đ -</span>
					</div>
					
					<div class="special-price f-left">															 
						<span class="price product-price">{!!number_format($pr->maxPrice)!!} đ</span>
					</div>
				@endif
				<!-- <div class="price-sale-flash f-left">-24% </div> -->
							
			</div>		
			
			
			<div class="bizweb-product-reviews-badge" >
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
					
				</div>
			</div>
		</div>
		
		

	</div>

@endif	