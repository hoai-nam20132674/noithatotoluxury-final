jQuery(document).ready(function () {
	jQuery(".register-form").hide();
	jQuery(".hide-login").click(function(){
	    jQuery(".login-form").hide();
	    jQuery(".register-form").fadeIn(1000);
	});
	jQuery(".hide-register").click(function(){
	    jQuery(".register-form").hide();
	    jQuery(".login-form").fadeIn(1000);
	});

});
jQuery(document).on('click', '.remove-item-cart', function(event) {
	event.preventDefault();
	var data_id = jQuery(this).attr('data-id');
	var price_minus = jQuery(this).attr('price');
	totalPrice = jQuery(".totalPrice");
	var price = totalPrice.attr('price');
	price = price - price_minus;
	item = jQuery(".product-cart[data-id="+data_id+"]");
	input = jQuery(".quantity[data-id="+data_id+"]").attr('value');
	item.remove();
	totalPrice.empty();
	totalPrice.attr('price',price);
	price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+'&#8363;';
	totalPrice.append(price);
	cartCount = jQuery(".cartCount").attr('cart-count');
	// jQuery(".cartCount").empty();
	// jQuery(".cartCount").append(cartCount - input);
	jQuery(".cartCount").attr('data-icon-label',cartCount - input);
	jQuery(".cartCount").attr('cart-count',cartCount - input);
	console.log(input);
	url = '/remove-cart-item/'+data_id;
	jQuery.ajax({
		type: 'GET',
		url: url,
		dataType: 'html',
		success: function(data) {
			
		}
		
	});

});


// thêm sản phẩm vào giỏ hàng
jQuery(document).on('click', '#update-cart', function(event) {
	event.preventDefault();
	var items = jQuery(".cart_item").length;
	var i =0;
	var j=0;
	for(i;i<items;i++){
		item =jQuery(".product-cart[item-number="+i+"]");
		var data_id = item.attr('data-id');
		selector = jQuery("input[data-id="+data_id+"]");
		var new_value = parseInt(selector.parent().children(".quantity").attr('value'));
		var old_value = parseInt(selector.parent().children(".quantity").attr('old-value'));
		var quantity = new_value - old_value;
		if(new_value==0){
			
			jQuery.ajax({
				type: 'GET',
				url: '/add-to-cart/'+data_id+'-0',
				dataType: 'html',
				success: function(data) {
					j++;
					if(j==items){
						window.location='/cart';
					}
				}
			});
			
		}
		else if(quantity==0){
			j++;
			if(j==items){
				window.location='/cart';
			}
		}
		else {

			jQuery.ajax({
				type: 'GET',
				url: '/check-product-detail/'+data_id+'-'+new_value,
				dataType: 'html',
				success: function(data) {
					
					if(data=='đủ hàng'){
						
						var url ='/add-to-cart/'+data_id+'-'+quantity;
						jQuery.ajax({
							type: 'GET',
							url: url,
							dataType: 'html',
							success: function(data) {
								j++;
								if(j==items){
									window.location='/cart';
								}
							}
						});
						
					}
					else {
						console.log('cập nhật không thành công');
						console.log('--------------');
					}
					console.log(data);
					console.log(items);
				}
			});

			
		}		
	}
	
	
});
// End thêm sản phẩm vào giỏ hàng
// --------------------------------
// cập nhật quantity item cart
// jQuery(document).on('click', '#plus', function(event) {
// 	event.preventDefault();
// 	var data_id = jQuery(this).attr('data-id');
// 	var currentVal = parseInt(jQuery(this).parent().children(".quantity").attr('new-value'));
// 	jQuery(this).parent().children(".quantity").attr('new-value',currentVal + 1);
// 	console.log(jQuery(this).parent().children(".quantity").attr('value'));
// });
// jQuery(document).on('click', '#minus', function(event) {
// 	event.preventDefault();
// 	var data_id = jQuery(this).attr('data-id');
// 	var currentVal = parseInt(jQuery(this).parent().children(".quantity").attr('new-value'));
// 	if(currentVal!=0){
// 		jQuery(this).parent().children(".quantity").attr('new-value',currentVal - 1);
// 	}
// });
// end cập nhật quantity item cart
// cập nhật giỏ hàng
jQuery(document).on('click', '#add-to-cart', function(event) {
	event.preventDefault();
	var count_properties = 0;
	check = jQuery(".check[check=1]").length;
	var products_detail_id = jQuery(this).attr('products_detail_id');
	var products_id = jQuery(this).attr('products_id');
	var product_url = jQuery(this).attr('url');
	jQuery.ajax({
		type: 'GET',
		url: '/check-count-properties/'+products_detail_id,
		dataType: 'html',
		success: function(data) {
			if(check!=data){
				swal("Không thành công", "Vui lòng chọn thuộc tính cho sản phẩm", "warning");
			}
			else{
				var properties_select = '';
				var text = '';
				for(var i=0;i<count_properties;i++){
					var selector = jQuery(".swatch[id="+i+"]");
					properties_select = properties_select+'-'+selector.children(".check[check=1]").attr('properties_id');
					text = text+' '+selector.children(".check[check=1]").attr('properties_type')+' '+selector.children(".check[check=1]").attr('data-value');

				}
				var quantity = jQuery(".qty[data-id="+products_detail_id+"]").val();
				var url = '/check-add-to-cart/'+products_id+'-'+quantity+''+properties_select;
				jQuery.ajax({
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
							// for(var i=0;i<data.length;i++){
							// 	if(data[i] == ':'){
							// 		var products_detail_id = data.substring(0,i);
							// 	}
							// }
							
							
							url = '/add-to-cart/'+products_detail_id+'-'+quantity;
							jQuery.ajax({
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
									  	cartCount = jQuery(".cartCount").attr('cart-count');
									  	cartCount = parseInt(cartCount);
									  	quantity = parseInt(quantity);
										jQuery(".cartCount").attr('data-icon-label',cartCount+quantity);
										jQuery(".cartCount").attr('cart-count',cartCount+quantity);
										//end
										// --------------
										// cập nhật item giỏ hàng
										var element = jQuery(".product-cart[data-id="+products_detail_id+"]");
										//kiểm tra sản phẩm đã có trong giỏ hàng chưa
									    if( element.length ==0){ //chưa có
									    	
									    	var title = jQuery(".title-head[data-id="+products_detail_id+"]").attr('title');
									    	var avatar = jQuery("img.avatar[data-id="+products_detail_id+"]").attr('src');
									    	var price = jQuery(".price-detail[data-id="+products_detail_id+"]").attr('price');
									    	var totalPrice = price*quantity;
									    	var priceTg = price;
									    	price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
									    	// var html = '<li class="item product-cart" data-id="'+products_detail_id+'"><div class="border_list"><a class="product-image" href="'+product_url+'" title="'+title+'"><img alt="'+title+'" src="'+avatar+'" width="100"></a><div class="detail-item"><div class="product-details"><p class="product-name"><a href="'+product_url+'" title="'+title+'">'+title+' '+text+'</a></p></div><div class="product-details-bottom"><span class="price pricechange">Giá: '+price+'</span><a data-id="'+products_detail_id+'" title="Xóa" class="remove-item-cart fa fa-trash-o" price="'+totalPrice+'">&nbsp;</a><div class="quantity-select qty_drop_cart"><p data-id="'+products_detail_id+'" value="'+quantity+'">Số Lượng: '+quantity+'</p></div></div></div></div></li>';
									    	var html ='<li class="woocommerce-mini-cart-item mini_cart_item item product-cart" data-id="'+products_detail_id+'"><a href="'+product_url+'" data-id="'+products_detail_id+'" class="remove remove_from_cart_button remove-item-cart" aria-label="Xóa sản phẩm này" price="'+priceTg+'">&times;</a><a href="'+product_url+'"><img width="250" height="250" src="'+avatar+'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="'+title+'" sizes="(max-width: 250px) 100vw, 250px" />'+title+' '+text+'</a><span data-id="'+products_detail_id+'" value="'+quantity+'" class="quantity">'+quantity+'<span class="woocommerce-Price-amount amount"> &times; '+price+'<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span></li>'
									    	jQuery(".list-item-cart").append(html);
									    	var price_plus = parseInt(totalPrice);
											var old_total_price = parseInt(jQuery(".totalPrice").attr('price'));
											var new_total_price = old_total_price + price_plus;
											jQuery(".totalPrice").empty();
											jQuery(".totalPrice").attr('price',new_total_price);
											new_total_price = new_total_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+'&#8363;';
											jQuery(".totalPrice").append(new_total_price);
									    }

									    else{ //có sản phẩm trong giỏ hàng
									    	var old_quantity = parseInt(jQuery(".quantity[data-id="+products_detail_id+"]").attr('value'));
									    	var new_quantity = old_quantity + quantity;
									    	var price = jQuery(".price-detail[data-id="+products_detail_id+"]").attr('price');
									    	var priceTg = price;
									    	price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
									    	jQuery(".quantity[data-id="+products_detail_id+"]").attr('value',new_quantity);
									    	jQuery(".quantity[data-id="+products_detail_id+"]").empty();
									    	jQuery(".quantity[data-id="+products_detail_id+"]").append(new_quantity+'<span class="woocommerce-Price-amount amount"> &times; '+price+'<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>');
									    	var price = jQuery(".price-detail[data-id="+products_detail_id+"]").attr('price');
									    	var price_plus = parseInt(price*quantity);
									    	var old_total_price = parseInt(jQuery(".totalPrice").attr('price'));
									    	var new_total_price = old_total_price + price_plus;
									    	var old_total_price_item_cart = parseInt(jQuery(".remove-item-cart[data-id="+products_detail_id+"]").attr('price'));
									    	var new_total_price_item_cart =old_total_price_item_cart + price_plus;
									    	jQuery(".totalPrice").empty();
											jQuery(".totalPrice").attr('price',new_total_price);
											jQuery(".remove-item-cart[data-id="+products_detail_id+"]").attr('price',new_total_price_item_cart);
											new_total_price = new_total_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+'&#8363;';
											jQuery(".totalPrice").append(new_total_price);

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
		}
		
	});
	// console.log(check);
	console.log(count_properties);
	
});