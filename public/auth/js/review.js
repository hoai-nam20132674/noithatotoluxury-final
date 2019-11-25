$(document).ready(function(){
	$(".review").click(function(){
	  	var id = $(this).attr('id');
	  	$.ajax({
		      type:'GET',
		      url:'http://slux.vn/admin/review/'+id,
		      cache:true,
		      data:{"id":id},  
		});
	});
	$(".unreview").click(function(){
	  	var id = $(this).attr('id');
	  	$.ajax({
		      type:'GET',
		      url:'http://slux.vn/admin/unreview/'+id,
		      cache:true,
		      data:{"id":id},  
		});
	});
});