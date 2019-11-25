

			
// -------------------------------------------------------------------------------

// thêm một thuộc tính sản phẩm
$(document).on('click', '.tag-swatch[display="block"]', function(event) {

	event.preventDefault();
	var tag_id = $(this).attr("swatch-recoment");
	// $(this).css("display","none");
	$(this).attr("display","none");
	var product_detail_number = $(this).parent().parent().parent().parent().attr('id');
	var count_swatch_select = $(".swatch[product-with-swatch-select="+product_detail_number+"]").length;
	var html = $(".swatch-root[swatch-recoment=" +tag_id+ "]").html();
	var count_input_swatch_focus = $(".swatch-root[swatch-recoment=" +tag_id+ "]").children().children().children("input").length;
	var count_input = $(".swatches[product-detail="+product_detail_number+"]").children().children().children("input").length;
	$(".swatches[product-detail="+product_detail_number+"]").append(html);
	$(".swatches[product-detail="+product_detail_number+"]").children(".swatch[swatch-recoment="+tag_id+"]").attr('product-with-swatch-select',product_detail_number);
	$(".swatches[product-detail="+product_detail_number+"]").children(".swatch[swatch-recoment="+tag_id+"]").attr('id',count_swatch_select);
	$(".swatches[product-detail="+product_detail_number+"]").children(".swatch[swatch-recoment="+tag_id+"]").attr('swatch-select',count_swatch_select);
	$(".swatches[product-detail="+product_detail_number+"]").children(".swatch[swatch-recoment="+tag_id+"]").children().children("input").attr("name", "products_detail["+product_detail_number+"][" +count_swatch_select+ "]");
	var i=1;
	var j = count_input_swatch_focus;
	var k = count_input;
	k++;
	for(i;i<=j;i++){
		$(".swatches[product-detail="+product_detail_number+"]").children(".swatch[swatch-recoment="+tag_id+"]").children(".swatch-element[input-number="+i+"]").children("input").attr("id",k);
		$(".swatches[product-detail="+product_detail_number+"]").children(".swatch[swatch-recoment="+tag_id+"]").children(".swatch-element[input-number="+i+"]").children("label").attr("for",k);
		k++;

	}
	// console.log(i);

	
});
// end thêm một thuộc tính sản phẩm
// -------------------------------------------------------------------------------
// xóa một thuộc tính sản phẩm
$(document).on('click', '.close-swatch', function(event) {
// $('.swatches').on('click', '.close-swatch', function(event) {
  	event.preventDefault();
  	var product_detail_number = $(this).parent().attr('product-with-swatch-select');
  	var count_swatch_select = $(".swatch[product-with-swatch-select="+product_detail_number+"]").length;
  	var swatch_recoment_number = $(this).parent('.swatch').attr('swatch-recoment');
  	var id = $(this).parent('.swatch').attr('id');
  	var i = id;
  	var count_input_swatch_before_remove = 0;
  	for(var j =0;j<id;j++){
  		var count_input_swatch = $(".swatch[id=" +j+ "]").children().children("input").length;
  		count_input_swatch_before_remove = count_input_swatch_before_remove+count_input_swatch;
  	}
  	count_input_swatch_before_remove++;
  	for(i;i<count_swatch_select;i++){
  		id++;
  		$(this).parent('.swatch').remove();
  		var swatch = $(".swatch[id=" +id+ "]");
  		var count_input_swatch_after = swatch.children().children("input").length;
  		for(var q=1;q<=count_input_swatch_after;q++){
  			swatch.children(".swatch-element[input-number="+q+"]").children("input").attr("id",count_input_swatch_before_remove);
  			swatch.children(".swatch-element[input-number="+q+"]").children("label").attr("for",count_input_swatch_before_remove);
  			count_input_swatch_before_remove++;
  		}
  		swatch.attr('id', i);
  		swatch.attr('swatch-select', i);
  		swatch.find('input').attr("name", "products_detail["+product_detail_number+"][" +i+ "]");
  	}
  	$(".tag-swatch[swatch-recoment="+swatch_recoment_number+"]").attr('display','block');
  	
});

// end xóa một thuộc tính sản phẩm
// -------------------------------------------------------------------------------
// thêm product line

$(document).on('click', '.add-product-line', function(event) {
	event.preventDefault();
	var count_product_detail = $(".product_detail").length;
	var id=count_product_detail;
	$(".tag-swatch").css('display','none');
	$(".close-swatch").css('display','none');
	if(count_product_detail==10){

	}
	else{
		var html = $(".product_detail[id=0]").html();
		var count_input = $(".product_detail[id=0]").children().children().children().children().children().children("input").length;
		$(".product_line").append('<div class="product_detail" id="'+id+'" style="position: relative;">'+html+'</div>');
		var line = $(".product_line").children(".product_detail[id="+id+"]");
		line.children().children().children(".swatches").attr('product-detail',id);
		line.children().children().children().children(".swatch").attr('product-with-swatch-select',id);
		var count_swatch_select = $(".swatch[product-with-swatch-select="+count_product_detail+"]").length;
		var i =0;
		var j =1;
		var k =1;
		var swatches = $(".swatches[product-detail=" +count_product_detail+ "]");
		for(i;i<count_swatch_select;i++){
	  		
	  		var swatch = swatches.children(".swatch[id="+i+"]");
	  		swatch.children().children("input").attr("name", "products_detail["+count_product_detail+"][" +i+ "]");
	  		
	  	}

	  	
	  	for(j;j<=count_input;j++){
	  		$(".swatches[product-detail=" +count_product_detail+ "]").children().children().children("input[id="+j+"]").attr("id","input"+j+"for"+count_product_detail);
	  		$(".swatches[product-detail=" +count_product_detail+ "]").children().children().children("label[for="+j+"]").attr("for","input"+j+"for"+count_product_detail);
	  		
	  	}
		
		
  	}
  	// console.log(count_product_detail);
});
// end product line
// -------------------------------------------------------------------------------
// xóa product_line sản phẩm
$(document).on('click', '.close-product-detail', function(event) {
	event.preventDefault();
  	var product_detail_number = $(this).parent().attr('id');
  	var count_product_detail = $(".product_detail").length;
  	var i =product_detail_number;
  	var id = $(this).parent('.product_detail').attr('id');
  	// var count_input = $(".product_detail[id=0]").children().children().children().children().children().children("input").length;
  	if(id == 0){

  	}
  	else if(count_product_detail ==2){
  		$(".tag-swatch").css('display','');
  		$(".close-swatch").css('display','');
  		for(i;i<count_product_detail;i++){
	  		product_detail_number++;
	  		$(this).parent('.product_detail').remove();
	  		var product_detail = $(".product_detail[id=" +product_detail_number+ "]");
	  		product_detail.attr('id', i);
	  		product_detail.children().children().children(".swatches").attr("product-detail",i);
	  	}
  	}
  	else{
	  	for(i;i<count_product_detail;i++){
	  		var w = 0;
	  		product_detail_number++;
	  		$(this).parent('.product_detail').remove();
	  		var count_swatch = $(".swatches[product-detail=" +product_detail_number+ "]").children(".swatch").length;
	  		for(w;w<count_swatch;w++){
	  			var j =1;
	  			var r = w;
	  			var count_input = $(".swatches[product-detail=" +product_detail_number+ "]").children().children().children("input").length;
		  		for(j;j<=count_input;j++){
		  			var z = j;
		  			z--;
			  		$(".swatches[product-detail=" +product_detail_number+ "]").children(".swatch[swatch-select="+r+"]").children().children("input").attr("name","products_detail["+i+"]["+r+"]");
			  		$(".swatches[product-detail=" +product_detail_number+ "]").children().children().children("input[id=input"+j+"for"+product_detail_number+"]").attr("id","input"+j+"for"+i);
			  		$(".swatches[product-detail=" +product_detail_number+ "]").children().children().children("label[for=input"+j+"for"+product_detail_number+"]").attr("for","input"+j+"for"+i);
			  	}

			}
	  		var product_detail = $(".product_detail[id=" +product_detail_number+ "]");
	  		product_detail.attr('id', i);
	  		product_detail.children().children().children(".swatches").attr("product-detail",i);
	  		product_detail.children().children().children().children(".swatch").attr("product-with-swatch-select",i);
	  		
	  	}
	}
  	// console.log(product_detail_number);
  	// console.log(count_product_detail);
});
// end xóa line sản phẩm
// -------------------------------------------------------------------------------
