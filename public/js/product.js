$(document).on('click', '.check', function(event) {
	// event.preventDefault();
	var swatch = $(this).parent();
	swatch.children(".check").attr('check',0);
	$(this).attr('check',1);
	count_properties = $(".swatch").length;
	check = $(".check[check=1]").length;
	var products_id = $("#add-to-cart").attr('products_id');
	var properties_select = '';
	for(var i=0;i<count_properties;i++){
		var selector = $(".swatch[id="+i+"]");
		properties_select = properties_select+'-'+selector.children(".check[check=1]").attr('properties_id');
	}
	var url = '/get-price-product-detail/'+products_id+''+properties_select;
	if(check == count_properties){
		$.ajax({
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
		    $(".price-detail").attr('price',price);
		    price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' đ';
		    $(".price-detail").empty();
		    $(".price-detail").append(price);
		    $(".count-product-detail").empty();
		    $(".count-product-detail").append(quantity);
		  }
		});
	}
	
});
$(document).on('click', '#add-to-cart', function(event) {
	event.preventDefault();
	count_properties = $(".swatch").length;
	check = $(".check[check=1]").length;
	if(check!=count_properties){
		swal("Không thành công", "Vui lòng chọn thuộc tính cho sản phẩm", "warning");
	}
	else{
		var properties_select = '';
		var text = '';
		for(var i=0;i<count_properties;i++){
			var selector = $(".swatch[id="+i+"]");
			properties_select = properties_select+'-'+selector.children(".check[check=1]").attr('properties_id');
			text = text+' '+selector.children(".check[check=1]").attr('properties_type')+' '+selector.children(".check[check=1]").attr('data-value');

		}
		var products_id = $(this).attr('products_id');
		var quantity = $(this).parent().children().children("input").val();
		var url = '/check-add-to-cart/'+products_id+'-'+quantity+''+properties_select;
		$.ajax({
			type: 'GET',
			url: url,
			dataType: 'html',
			success: function(data) {
				if(data=='hết hàng'){
					swal(text+" đã hết hàng", "Vui lòng chọn thuộc tính khác cho sản phẩm này", "warning");
				}
				else if(data=='không đủ hàng'){
					swal(text+" không đủ ", "Vui lòng chọn số lượng it hơn " +quantity+  " sản phẩm", "warning");
				}
				else{
					for(var i=0;i<data.length;i++){
						if(data[i] == ':'){
							var products_detail_id = data.substring(0,i);
						}
					}
					url = '/add-to-cart/'+products_detail_id+'-'+quantity;
					$.ajax({
						type: 'GET',
						url: url,
						dataType: 'html',
						success: function(data) {
							swal({
							  title: "Thêm vào giỏ hàng thành công",
							  text: "",
							  icon: "success",
							  buttons: true,
							  buttons: ["Giỏ hàng", true],
							})
							.then((willDelete) => {
							  if (willDelete) {
							  	//cập nhật số lượng sản phẩm giỏ hàng
							  	cartCount = $(".cartCount").attr('cart-count');
							  	cartCount = parseInt(cartCount);
							  	quantity = parseInt(quantity);
								$(".cartCount").empty();
								$(".cartCount").append(cartCount+quantity);
								$(".cartCount").attr('cart-count',cartCount+quantity);
								//end
								// --------------
								// cập nhật item giỏ hàng
								var element = $(".product-cart[data-id="+products_detail_id+"]");
								//kiểm tra sản phẩm đã có trong giỏ hàng chưa
							    if( element.length ==0){ //chưa có
							    	var product_url = location.href;
							    	var title = $(".title-head").attr('title');
							    	var avatar = $("img.avatar").attr('src');
							    	var price = $(".price-detail").attr('price');
							    	var totalPrice = price*quantity;
							    	price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' đ';
							    	var html = '<li class="item product-cart" data-id="'+products_detail_id+'"><div class="border_list"><a class="product-image" href="'+product_url+'" title="'+title+'"><img alt="'+title+'" src="'+avatar+'" width="100"></a><div class="detail-item"><div class="product-details"><p class="product-name"><a href="'+product_url+'" title="'+title+'">'+title+' '+text+'</a></p></div><div class="product-details-bottom"><span class="price pricechange">Giá: '+price+'</span><a data-id="'+products_detail_id+'" title="Xóa" class="remove-item-cart fa fa-trash-o" price="'+totalPrice+'">&nbsp;</a><div class="quantity-select qty_drop_cart"><p data-id="'+products_detail_id+'" value="'+quantity+'">Số Lượng: '+quantity+'</p></div></div></div></div></li>';
							    	$(".list-item-cart").append(html);
							    	var price_plus = parseInt(totalPrice);
									var old_total_price = parseInt($(".totalPrice").attr('price'));
									var new_total_price = old_total_price + price_plus;
									$(".totalPrice").empty();
									$(".totalPrice").attr('price',new_total_price);
									new_total_price = new_total_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' đ';
									$(".totalPrice").append(new_total_price);
							    }

							    else{ //chưa có sản phẩm trong giỏ hàng
							    	var old_quantity = parseInt($("p[data-id="+products_detail_id+"]").attr('value'));
							    	var new_quantity = old_quantity + quantity;
							    	$("p[data-id="+products_detail_id+"]").attr('value',new_quantity);
							    	$("p[data-id="+products_detail_id+"]").empty();
							    	$("p[data-id="+products_detail_id+"]").append('Số lượng: '+new_quantity);
							    	var price = $(".price-detail").attr('price');
							    	var price_plus = parseInt(price*quantity);
							    	var old_total_price = parseInt($(".totalPrice").attr('price'));
							    	var new_total_price = old_total_price + price_plus;
							    	$(".totalPrice").empty();
									$(".totalPrice").attr('price',new_total_price);
									$(".remove-item-cart[data-id="+products_detail_id+"]").attr('price',new_total_price);
									new_total_price = new_total_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' đ';
									$(".totalPrice").append(new_total_price);

							    }

							  } else {
							    window.location='/cart';
							  }
							});
						}
						
					});

				}
				
			}
			
		});
		
	}
});
$(document).on('click', '.follow-system', function(event) {
	var system_id = $(this).attr('system-id');
	var user_id = $(this).attr('user-id');
	if(user_id == ''){
		swal( "", "Vui lòng đăng nhập để theo dõi gian hàng", "warning");
	}
	else{
		url = '/follow-system/'+system_id+'-'+user_id;
		$.ajax({
			type: 'GET',
			url: url,
			dataType: 'html',
			success: function(data) {
				
				swal( "", "Đã theo dõi gian hàng", "success");
				
			}
			
		});
	}

});
$(document).on('click', '.open-feedback', function(event) {
	event.preventDefault();
	var user_id = $(this).attr('user-id');
	var product_id =$(this).attr('product-id');
	if(user_id ==''){
		swal( "", "Vui lòng đăng nhập để đánh giá sản phẩm", "warning");
	}
	else{
		url = '/check-feedback/'+product_id+'-'+user_id;
		$.ajax({
			type: 'GET',
			url: url,
			dataType: 'html',
			success: function(data) {
				if(data=='đã mua hàng'){
					$(".feedback").css('display','block');
					
				}
				else{
					swal( "", "Bạn chưa mua sản phẩm này nên không thể đánh giá ", "warning");
				}
				
			}
			
		});
		
	}

});
$(document).on('click', '.close-feedback', function(event) {
	event.preventDefault();
	$(".feedback").css('display','none');

});
$(document).on('click', '.star', function(event) {
	event.preventDefault();
	var data_alt = $(this).attr('data-alt');
	for(var i=1;i<=data_alt;i++){
		$(".star[data-alt="+i+"]").removeClass("star-off-png");
		$(".star[data-alt="+i+"]").addClass("star-on-png");
	}
	var j = data_alt;
	j++;
	for(j;j<6;j++){
		$(".star[data-alt="+j+"]").removeClass("star-on-png");
		$(".star[data-alt="+j+"]").addClass("star-off-png");
	}
	$("input[name=rate]").attr('value',data_alt);

});