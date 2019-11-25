$(document).ready(function(){
  
  $(".enable_blog").click(function(){
  	var id = $(this).attr('value');
  	$.ajax({
	      type:'GET',
	      url:'http://slux.vn/admin/enable-blog/'+id,
	      cache:true,
	      data:{"id":id},  
	   });
  });
  $(".disable_blog").click(function(){
    var id = $(this).attr('value');
    $.ajax({
        type:'GET',
        url:'http://slux.vn/admin/disable-blog/'+id,
        cache:true,
        data:{"id":id},  
     });
  });
});