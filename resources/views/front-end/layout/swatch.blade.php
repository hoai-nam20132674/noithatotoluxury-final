<div class="swatches" >
  @php
    $i=0;
  @endphp
  @foreach($properties_type as $prt)
  	<div class="swatch clearfix " id="{{$i}}" swatch-recoment="0" style="position: relative;" product-with-swatch-select="0"swatch-select="0">
  		<div class="header">{{$prt->name}}</div>
      @foreach($properties[$i] as $pp)
  		  <div check="0" properties_id="{{$pp->id}}" properties_type="{{$prt->name}}" data-value="{{$pp->value}}" class="swatch-element plain m available check">
            <input id="{{$pp->id}}" type="radio" name="properties{{$i}}" value="{{$pp->id}}" required >
            <label for="{{$pp->id}}" >
              {{$pp->value}}
              <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886">
            </label>
      	</div>
    	@endforeach
      	
    </div>
    @php
      $i++;
    @endphp
  @endforeach
</div>