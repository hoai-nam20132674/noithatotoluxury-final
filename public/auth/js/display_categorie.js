$(document).ready(function(){
  
  $(".enable_categorie").click(function(){
  	var id = $(this).attr('value');
  	$.ajax({
	      type:'GET',
	      url:'http://slux.vn/admin/enable-categorie/'+id,
	      cache:true,
	      data:{"id":id},  
	   });
  });
  $(".disable_categorie").click(function(){
    var id = $(this).attr('value');
    $.ajax({
        type:'GET',
        url:'http://slux.vn/admin/disable-categorie/'+id,
        cache:true,
        data:{"id":id},  
     });
  });
});