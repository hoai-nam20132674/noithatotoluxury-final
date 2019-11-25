jQuery(function($) {

		 $('.selector-wrapper:eq(0)').prepend('<label>Title</label>');
		  

		  // Hide selectors if we only have 1 variant and its title contains 'Default'.
		  
		  $('.selector-wrapper').hide();
		    
		   $('.selector-wrapper').css({
			   'text-align':'left',
			   'margin-bottom':'15px'
		   });
		   });

		   jQuery('.swatch :radio').change(function() {
			   var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
			   var optionValue = jQuery(this).val();
			   jQuery(this)
				   .closest('form')
				   .find('.single-option-selector')
				   .eq(optionIndex)
				   .val(optionValue)
				   .trigger('change');
		   });

		   $(document).ready(function() {
			   if($(window).width()>1200){
				   setTimeout(function(){
					   $('#zoom_01').elevateZoom({
						   gallery:'gallery_01', 
						   zoomWindowWidth:420,
						   zoomWindowHeight:500,
						   zoomWindowOffetx: 10,
						   easing : true,
						   scrollZoom : true,
						   cursor: 'pointer', 
						   galleryActiveClass: 'active', 
						   imageCrossfade: true

					   });
				   },500);
			   }



		   });
		   $(window).on("load resize",function(e){

			   $('.thumb-link').click(function(e){
				   e.preventDefault();
				   var hr = $(this).attr('data-zoom-image');
				   $('#zoom_01').attr('src',hr);
			   })
		   });
		   $('#gallery_01 img, .swatch-element label').click(function(e){
			   $('.checkurl').attr('href',$(this).attr('src'));
			   setTimeout(function(){
				   if($(window).width() > 1200){
					   $('.zoomContainer').remove();				
					   $('#zoom_01').elevateZoom({
						   gallery:'gallery_01', 
						   zoomWindowWidth:420,
						   zoomWindowHeight:500,
						   zoomWindowOffetx: 10,
						   easing : true,
						   scrollZoom : true,
						   cursor: 'pointer', 
						   galleryActiveClass: 'active', 
						   imageCrossfade: true

					   });
				   }



			   },400);

			   setTimeout(function(){
				   if($(window).width() > 1200){
					   $('#zoom_01').elevateZoom({
						   gallery:'gallery_01', 
						   zoomWindowWidth:420,
						   zoomWindowHeight:500,
						   zoomWindowOffetx: 10,
						   easing : true,
						   scrollZoom : true,
						   cursor: 'pointer', 
						   galleryActiveClass: 'active', 
						   imageCrossfade: true

					   });
				   }				  

			   },1000);

		   })
		   function scrollToxx() {
			   $('html, body').animate({ scrollTop: $('.product-tab.e-tabs').offset().top }, 'slow');
			   $('.product-tab .tab-link').removeClass('current');
			   $('.product-tab .tab-link[data-tab=tab-3]').addClass('current');
			   $('.product-tab .tab-content').removeClass('current');
			   $('.product-tab .tab-content#tab-3').addClass('current');

			   return false;
		   }

		   var getLimit = 3;