$(document).ready(function(){
  
  $(".enable_product").click(function(){
  	var id = $(this).attr('value');
  	$.ajax({
	      type:'GET',
	      url:'http://slux.vn/admin/enable-product/'+id,
	      cache:true,
	      data:{"id":id},  
	   });
        console.log("thành công");
  });
  $(".disable_product").click(function(){
    var id = $(this).attr('value');
    $.ajax({
        type:'GET',
        url:'http://slux.vn/admin/disable-product/'+id,
        cache:true,
        data:{"id":id},  
     });
     console.log("thành công");
  });
});