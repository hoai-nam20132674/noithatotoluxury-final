jQuery(document).on('click', '.check', function(event) {
	// event.preventDefault();
	var swatch = jQuery(this).parent();
	swatch.children(".check").attr('check',0);
	jQuery(this).attr('check',1);
	count_properties = jQuery(".swatch").length;
	check = jQuery(".check[check=1]").length;
	var products_id = jQuery("#add-to-cart").attr('products_id');
	var properties_select = '';
	for(var i=0;i<count_properties;i++){
		var selector = jQuery(".swatch[id="+i+"]");
		properties_select = properties_select+'-'+selector.children(".check[check=1]").attr('properties_id');
	}
	var url = '/get-price-product-detail/'+products_id+''+properties_select;
	if(check == count_properties){
		jQuery.ajax({
		  type: "GET",
		  url: url,
		  dataType: 'html',
		  success: function(data){
		  	for(var i=0;i<data.length;i++){
				if(data[i] == ':'){
					var price = data.substring(0,i);
					var j = i;
					j++;
					var length = data.length;
					length++;
					var quantity = data.substring(j,length);
				}
			}
		    jQuery(".price-detail").attr('price',price);
		    price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
		    jQuery(".price-detail").empty();
		    jQuery(".price-detail").append(price);
		    jQuery(".count-product-detail").empty();
		    jQuery(".count-product-detail").append(quantity);
		  }
		});
	}
	
});



jQuery(document).on('click', '.follow-system', function(event) {
	var system_id = jQuery(this).attr('system-id');
	var user_id = jQuery(this).attr('user-id');
	if(user_id == ''){
		swal( "", "Vui lòng đăng nhập để theo dõi gian hàng", "warning");
	}
	else{
		url = '/follow-system/'+system_id+'-'+user_id;
		jQuery.ajax({
			type: 'GET',
			url: url,
			dataType: 'html',
			success: function(data) {
				
				swal( "", "Đã theo dõi gian hàng", "success");
				
			}
			
		});
	}

});
jQuery(document).on('click', '.open-feedback', function(event) {
	event.preventDefault();
	var user_id = jQuery(this).attr('user-id');
	var product_id =jQuery(this).attr('product-id');
	if(user_id ==''){
		swal( "", "Vui lòng đăng nhập để đánh giá sản phẩm", "warning");
	}
	else{
		url = '/check-feedback/'+product_id+'-'+user_id;
		jQuery.ajax({
			type: 'GET',
			url: url,
			dataType: 'html',
			success: function(data) {
				if(data=='đã mua hàng'){
					jQuery(".feedback").css('display','block');
					
				}
				else{
					swal( "", "Bạn chưa mua sản phẩm này nên không thể đánh giá ", "warning");
				}
				
			}
			
		});
		
	}

});
jQuery(document).on('click', '.close-feedback', function(event) {
	event.preventDefault();
	jQuery(".feedback").css('display','none');

});
jQuery(document).on('click', '.star', function(event) {
	event.preventDefault();
	var data_alt = jQuery(this).attr('data-alt');
	for(var i=1;i<=data_alt;i++){
		jQuery(".star[data-alt="+i+"]").removeClass("star-off-png");
		jQuery(".star[data-alt="+i+"]").addClass("star-on-png");
	}
	var j = data_alt;
	j++;
	for(j;j<6;j++){
		jQuery(".star[data-alt="+j+"]").removeClass("star-on-png");
		jQuery(".star[data-alt="+j+"]").addClass("star-off-png");
	}
	jQuery("input[name=rate]").attr('value',data_alt);

});