
$(document).on('click', '.remove-item-cart', function(event) {
	event.preventDefault();
	var data_id = $(this).attr('data-id');
	var price_minus = $(this).attr('price');
	totalPrice = $(".totalPrice");
	var price = totalPrice.attr('price');
	price = price - price_minus;
	item = $(".product-cart[data-id="+data_id+"]");
	input = $("p[data-id="+data_id+"]").attr('value');
	item.remove();
	totalPrice.empty();
	totalPrice.attr('price',price);
	price = price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' Đ';
	totalPrice.append(price);
	cartCount = $(".cartCount").attr('cart-count');
	$(".cartCount").empty();
	$(".cartCount").append(cartCount - input);
	$(".cartCount").attr('cart-count',cartCount - input);
	url = '/remove-cart-item/'+data_id;
	$.ajax({
		type: 'GET',
		url: url,
		dataType: 'html',
		success: function(data) {
			
		}
		
	});

});
