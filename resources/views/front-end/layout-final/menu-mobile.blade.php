<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="header-search-form search-form html relative has-icon">
            	<div class="header-search-form-wrapper">
            		<div class="searchform-wrapper ux-search-box relative form- is-normal">
            			<form role="search" method="get" class="searchform" action="{{$system->website}}">
            				<div class="flex-row relative">
								<div class="flex-col flex-grow">
									<input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm&hellip;" />
									<input type="hidden" name="post_type" value="product" />
								</div><!-- .flex-col -->
								<div class="flex-col">
									<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
										<i class="icon-search" ></i>
									</button>
								</div><!-- .flex-col -->
							</div><!-- .flex-row -->
							<div class="live-search-results text-left z-top"></div>
						</form>
					</div>
				</div>
			</li>
			@foreach($menus as $menu)
				@if($menu->type ==0)
					<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-{{$menu->id}}"><a href="{{$menu->url}}" class="nav-top-link">{{$menu->name}}</a></li>

				@else
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-{{$menu->id}}">
						<a href="{{$menu->url}}" class="nav-top-link">{{$menu->name}}</a>
						@php
							$cates = App\Categories::where('parent_id',$menu->categories_id)->where('display',1)->get();
						@endphp
						@if(count($cates) !=0)
    						<ul class=children>
    							@foreach($cates as $cate)
    								@if($cate->id != $menu->categories_id)
    									<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-{{$cate->id}}">
    										<a href="{{$cate->url}}">{{$cate->name}}</a>
        								
        									@php
		            							$catess = App\Categories::where('parent_id',$cate->id)->where('display',1)->get();
		            						@endphp
		            						@if(count($catess) !=0)
			            						<ul class=nav-sidebar-ul>
			            							@foreach($catess as $ca)
			            								@if($ca->id != $cate->id)
			            									<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-{{$ca->id}}">
			            										<a href="{{$ca->url}}">{{$ca->name}}</a>
			            									</li>
			            									
			            								@endif
			            							@endforeach
			            						</ul>
			            					@endif
        								</li>
    								@endif
    							@endforeach
    						</ul>
    					@endif

					</li>
				@endif
			@endforeach
			
			<li class="account-item has-icon menu-item">
				<a href="#" class="nav-top-link nav-top-not-logged-in" data-open="#login-form-popup>
				    <span class="header-account-title">
				    Đăng nhập  </span>
				</a><!-- .account-login-link -->
			</li>
        </ul>
    </div><!-- inner -->
</div><!-- #mobile-menu -->