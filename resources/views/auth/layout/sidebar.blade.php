@if(Auth::user()->systems_id ==1)
	<div class="site-sidebar">
		<div class="custom-scroll custom-scroll-light">
			<ul class="sidebar-menu">
				
				<li class="menu-title">Main</li>
				
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="tag tag-purple"></span>
						<span class="s-icon"><i class="ti-anchor"></i></span>
						<span class="s-text">HỆ THỐNG</span>
					</a>
					<ul>
						<!-- <li><a href="#">Menu</a></li> -->
						<li><a href="{{URL::route('listSlides')}}">Slide Header</a></li>
						<li><a href="{{url('/admin/ckfinder/ckfinder.html?type=Images&CKEditor=content&CKEditorFuncNum=1&langCode=vi')}}" target="_blank">Media</a></li>
						<li><a href="{{URL::route('editSystem',Auth::user()->systems_id)}}">Cài đặt</a></li>
						<li><a href="{{URL::route('listMenus')}}">Menu</a></li>

						

					</ul>
				</li>

				<li class="menu-title">Components</li>
				
				<li class="with-sub">
					<a href="{{URL::route('listBlogs')}}" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-pencil-alt"></i></span>
						<span class="tag tag-danger">1</span>
						<span class="s-text">Tin tức</span>
					</a>
				</li>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						<span class="tag tag-success"></span>
						<span class="s-text">Sản phẩm</span>
					</a>
					<ul>
						<li><a href="{{URL::route('listProducts')}}">Sản phẩm</a></li>
						<li><a href="{{URL::route('listCategories')}}">Danh Mục</a></li>
						<li><a href="{{URL::route('addPropertie')}}">Thêm thuộc tính</a></li>
					</ul>
				</li>
				
				<li class="with-sub">
					<a href="{{URL::route('listSystems')}}" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-menu-alt"></i></span>
						<span class="s-text">Gian hàng</span>
					</a>
					
				</li>
				<li class="with-sub">
					<a href="{{URL::route('listOrder')}}" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="tag tag-success"></span>
						<span class="s-icon"><i class="ti-gallery"></i></span>
						<span class="s-text">Đơn hàng</span>
					</a>
				</li>
				
				<li class="with-sub">
					<a href="{{URL::route('listUsers')}}" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-menu-alt"></i></span>
						<span class="s-text">Tài khoản</span>
					</a>
				</li>
				
				
			</ul>
		</div>
	</div>
@else
	<div class="site-sidebar">
		<div class="custom-scroll custom-scroll-light">
			<ul class="sidebar-menu">
				
				<li class="menu-title">Main</li>
				
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="tag tag-purple"></span>
						<span class="s-icon"><i class="ti-anchor"></i></span>
						<span class="s-text">HỆ THỐNG</span>
					</a>
					<ul>
						<!-- <li><a href="#">Menu</a></li> -->
						<li><a href="{{URL::route('listSlides')}}">Slide Header</a></li>
						<li><a href="{{url('/admin/ckfinder/ckfinder.html?type=Images&CKEditor=content&CKEditorFuncNum=1&langCode=vi')}}" target="_blank">Media</a></li>
						<li><a href="{{URL::route('editSystem',Auth::user()->systems_id)}}">Cài đặt</a></li>
					</ul>
				</li>

				<li class="menu-title">Components</li>
				<li class="with-sub">
					<a href="{{URL::route('listCategories')}}" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-gallery"></i></span>
						<span class="s-text">Danh mục</span>
					</a>
				</li>
				<li class="with-sub">
					<a href="#" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-paint-bucket"></i></span>
						<span class="tag tag-success"></span>
						<span class="s-text">Sản phẩm</span>
					</a>
					<ul>
						<li><a href="{{URL::route('listProducts')}}">Sản phẩm</a></li>
						<li><a href="{{URL::route('addPropertie')}}">Thêm thuộc tính</a></li>
					</ul>
				</li>
				
				
				<li class="with-sub">
					<a href="" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="tag tag-success"></span>
						<span class="s-icon"><i class="ti-gallery"></i></span>
						<span class="s-text">Đơn hàng</span>
					</a>
				</li>
				
				
				<li class="with-sub">
					<a href="{{URL::route('listUsers')}}" class="waves-effect  waves-light">
						<span class="s-caret"><i class="fa fa-angle-down"></i></span>
						<span class="s-icon"><i class="ti-menu-alt"></i></span>
						<span class="s-text">User</span>
					</a>
				</li>
				
				
			</ul>
		</div>
	</div>
@endif