@extends('auth.layout.default')
@section('css')
	<link rel="stylesheet" href="{{asset('auth/vendor/bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/jscrollpane/jquery.jscrollpane.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/waves/waves.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/switchery/dist/switchery.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/css/upload-image.css')}}">

@endsection()
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Sửa Menu</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Sửa menu</li>
			</ol>
			<div class="box box-block bg-white">
				@if( count($errors) > 0)
		    	<div class="alert alert-danger">
		    		<ul>
		    			@foreach($errors->all() as $error)
		    				<li>{{$error}}</li>
		    			@endforeach
		    		</ul>
		    	</div>
		    	@endif
		    	@if( Session::has('flash_message'))
                    <div class="alert alert-{{ Session::get('flash_level')}}">
                        {{ Session::get('flash_message')}}
                    </div>
                @endif
				<form action="{{URL::route('postEditMenu',$menu->id)}}" method="POST" enctype="multipart/form-data">
					
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-9 0848384333">
							
							<div class="row">
								<div class="col-md-8">
									@if($menu->type ==0)
										<a href="#" class="add-menu-0">
											<span style="background: #8c0000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Custom Link</span>
										</a>
										<br>
										<br>
										<div class="form-group ">
											<label for="exampleInputEmail1">Tiêu đề</label>
											<input type="text" class="form-control" name="name" placeholder="Tiêu đề menu" value="{{$menu->name}}" required>
										</div>
										<div class="form-group ">
											<label for="exampleInputEmail1">Thứ tự</label>
											<input type="number" min="0" class="form-control" name="stt" placeholder="Thứ tự hiển thị" value="{{$menu->stt}}" required>
										</div>
										<div class="form-group custom-link">
											<label for="exampleInputEmail1">Custom Link</label>
											<input type="text" class="form-control" name="url" placeholder="link menu" value="{{$menu->url}}" >
										</div>
									@else
										<a href="#" class="add-menu-1">
											<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Danh mục</span>
										</a>
										<br>
										<br>
										<div class="form-group ">
											<label for="exampleInputEmail1">Tiêu đề</label>
											<input type="text" class="form-control" name="name" placeholder="Tiêu đề menu" value="{{$menu->name}}" required>
										</div>
										<div class="form-group ">
											<label for="exampleInputEmail1">Thứ tự</label>
											<input type="number" min="0" class="form-control" name="stt" placeholder="Thứ tự hiển thị" value="{{$menu->stt}}" required>
										</div>
			
										<div class="form-group cates">
											<label>Danh mục sản phẩm</label>
											<select class="form-control" name="cate_id">
												<option value="{{$ca->id}}">{{$ca->name}}</option>
												@foreach($cates as $cate)
													<option value="{{$cate->id}}">{{$cate->name}}</option>
												@endforeach
											</select>
										</div>
									@endif
									
								</div>
								
							</div>
						
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			
		</div>
	</div>
@endsection()
@section('js')
	<!-- Vendor JS -->
		<script type="text/javascript" src="{{asset('auth/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/tether/js/tether.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/bootstrap4/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/detectmobilebrowser/detectmobilebrowser.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jscrollpane/jquery.mousewheel.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jscrollpane/mwheelIntent.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/waves/waves.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/switchery/dist/switchery.min.js')}}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="{{asset('auth/js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/js/demo.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/js/upload-image.js')}}"></script>
		<script type="text/javascript">
			$(document).on('click', '.pr-plus', function(event) {
				event.preventDefault();
				var pr = $(".pr").length;
				pr++;
				var html = '<div class="form-group pr"><label for="exampleInputEmail1">giá trị '+pr+'</label><input type="text" class="form-control" name="propertie[]" placeholder="giá trị thuộc tính" value="" ></div>'
				$("#pr-plus").append(html);

				
				
			});
			
		</script>

		<!-- watches product -->
		<!-- <script  src="{{asset('js/index.js')}}"></script> -->
		<!-- end -->

		
@endsection