<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1529747461899 vc_row-has-fill">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner vc_custom_1508151473244">
			<div class="wpb_wrapper">
				<div class="wpb_revslider_element wpb_content_element">
					<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
						<!-- START REVOLUTION SLIDER 5.4.7.3 fullwidth mode -->
						<div id="rev_slider_1_1" class="rev_slider fullwidthabanner tp-overflow-hidden" style="display:none;" data-version="5.4.7.3">
							<ul>	<!-- SLIDE  -->
								@foreach($slides as $slide)
								<li data-index="{{$slide->id}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="https://mdbuddy.vn/home/wp-content/uploads/2018/07/banner_1-1-100x50.png"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
									<!-- MAIN IMAGE -->
									<img src="{{asset('uploads/images/systems/slides/'.$slide->url_image)}}"  alt="" title="banner_1"  width="2184" height="788" data-lazyload="{{asset('uploads/images/systems/slides/'.$slide->url_image)}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
									<!-- LAYERS -->

									
								</li>
								<!-- SLIDE  -->
								@endforeach
								
							</ul>
							<script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
								if(htmlDiv) {
									htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
								}else{
									var htmlDiv = document.createElement("div");
									htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
									document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
								}
							</script>
							<div class="tp-bannertimer" style="height: 5px; background: rgba(0,0,0,0.15);"></div>
						</div>
						<script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
							if(htmlDiv) {
								htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
							}else{
								var htmlDiv = document.createElement("div");
								htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
								document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
							}
						</script>
						<script type="text/javascript">
							if (setREVStartSize!==undefined) setREVStartSize(
								{c: '#rev_slider_1_1', responsiveLevels: [1240,1024,778,480], gridwidth: [1200,1024,778,480], gridheight: [600,600,500,400], sliderLayout: 'fullwidth'});
										
							var revapi1,
								tpj;	
							(function() {			
								if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();	
								function onLoad() {				
									if (tpj===undefined) { tpj = jQuery; if("off" == "on") tpj.noConflict();}
								if(tpj("#rev_slider_1_1").revolution == undefined){
									revslider_showDoubleJqueryError("#rev_slider_1_1");
								}else{
									revapi1 = tpj("#rev_slider_1_1").show().revolution({
										sliderType:"standard",
										jsFileLocation:"//mdbuddy.vn/home/wp-content/plugins/revslider/public/assets/js/",
										sliderLayout:"fullwidth",
										dottedOverlay:"none",
										delay:9000,
										navigation: {
											keyboardNavigation:"off",
											keyboard_direction: "horizontal",
											mouseScrollNavigation:"off",
							 							mouseScrollReverse:"default",
											onHoverStop:"on",
											touch:{
												touchenabled:"on",
												touchOnDesktop:"off",
												swipe_threshold: 75,
												swipe_min_touches: 50,
												swipe_direction: "horizontal",
												drag_block_vertical: false
											}
											,
											arrows: {
												style:"hesperiden",
												enable:true,
												hide_onmobile:true,
												hide_under:600,
												hide_onleave:true,
												hide_delay:200,
												hide_delay_mobile:1200,
												tmp:'',
												left: {
													h_align:"left",
													v_align:"center",
													h_offset:30,
													v_offset:0
												},
												right: {
													h_align:"right",
													v_align:"center",
													h_offset:30,
													v_offset:0
												}
											}
											,
											bullets: {
												enable:true,
												hide_onmobile:true,
												hide_under:600,
												style:"hephaistos",
												hide_onleave:true,
												hide_delay:200,
												hide_delay_mobile:1200,
												direction:"horizontal",
												h_align:"center",
												v_align:"bottom",
												h_offset:0,
												v_offset:30,
												space:5,
												tmp:''
											}
										},
										responsiveLevels:[1240,1024,778,480],
										visibilityLevels:[1240,1024,778,480],
										gridwidth:[1200,1024,778,480],
										gridheight:[600,600,500,400],
										lazyType:"smart",
										parallax: {
											type:"mouse",
											origo:"slidercenter",
											speed:2000,
											speedbg:0,
											speedls:0,
											levels:[2,3,4,5,6,7,12,16,10,50,47,48,49,50,51,55],
										},
										shadow:0,
										spinner:"off",
										stopLoop:"off",
										stopAfterLoops:-1,
										stopAtSlide:-1,
										shuffle:"off",
										autoHeight:"off",
										hideThumbsOnMobile:"off",
										hideSliderAtLimit:0,
										hideCaptionAtLimit:0,
										hideAllCaptionAtLilmit:0,
										debugMode:false,
										fallbacks: {
											simplifyAll:"off",
											nextSlideOnWindowFocus:"off",
											disableFocusListener:false,
										}
									});
								}; /* END OF revapi call */
								
							 }; /* END OF ON LOAD FUNCTION */
							}()); /* END OF WRAPPING FUNCTION */
						</script>
						<script>
							var htmlDivCss = unescape(".hesperiden.tparrows%20%7B%0A%09cursor%3Apointer%3B%0A%09background%3Argba%280%2C0%2C0%2C0.5%29%3B%0A%09width%3A40px%3B%0A%09height%3A40px%3B%0A%09position%3Aabsolute%3B%0A%09display%3Ablock%3B%0A%09z-index%3A100%3B%0A%20%20%20%20border-radius%3A%2050%25%3B%0A%7D%0A.hesperiden.tparrows%3Ahover%20%7B%0A%09background%3Argba%280%2C%200%2C%200%2C%201%29%3B%0A%7D%0A.hesperiden.tparrows%3Abefore%20%7B%0A%09font-family%3A%20%22revicons%22%3B%0A%09font-size%3A20px%3B%0A%09color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%09display%3Ablock%3B%0A%09line-height%3A%2040px%3B%0A%09text-align%3A%20center%3B%0A%7D%0A.hesperiden.tparrows.tp-leftarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce82c%22%3B%0A%20%20%20%20margin-left%3A-3px%3B%0A%7D%0A.hesperiden.tparrows.tp-rightarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce82d%22%3B%0A%20%20%20%20margin-right%3A-3px%3B%0A%7D%0A.hephaistos%20.tp-bullet%20%7B%0A%09width%3A12px%3B%0A%09height%3A12px%3B%0A%09position%3Aabsolute%3B%0A%09background%3Argba%28153%2C%20153%2C%20153%2C%201%29%3B%0A%09border%3A3px%20solid%20rgba%28255%2C255%2C255%2C0.9%29%3B%0A%09border-radius%3A50%25%3B%0A%09cursor%3A%20pointer%3B%0A%09box-sizing%3Acontent-box%3B%0A%20%20%20%20box-shadow%3A%200px%200px%202px%201px%20rgba%28130%2C130%2C130%2C%200.3%29%3B%0A%7D%0A.hephaistos%20.tp-bullet%3Ahover%2C%0A.hephaistos%20.tp-bullet.selected%20%7B%0A%09background%3Argba%28255%2C%20255%2C%20255%2C%201%29%3B%0A%20%20%20%20border-color%3Argba%280%2C%200%2C%200%2C%201%29%3B%0A%7D%0A");
							var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
							if(htmlDiv) {
								htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
							}
							else{
								var htmlDiv = document.createElement('div');
								htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
								document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
							}
						</script>
					</div>
					<!-- END REVOLUTION SLIDER -->
				</div>
			</div>
		</div>
	</div>
</div>