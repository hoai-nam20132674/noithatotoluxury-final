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
			<h4>Thêm Menu</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm menu</li>
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
				<form action="{{URL::route('postAddMenu')}}" method="POST" enctype="multipart/form-data">
					
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-9 0848384333">
							
							<div class="row">
								<div class="col-md-8">
									<a href="#" class="add-menu-1">
										<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Danh mục</span>
									</a>
									<a href="#" class="add-menu-0">
										<span style="background: #8c0000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-plus" style="padding-right: 5px;"></i>Custom Link</span>
									</a>
									<div class="form-group" style="display: none">
										<label for="exampleInputEmail1">Type</label>
										<input type="number" class="form-control" name="type" placeholder="Tiêu đề menu" required>
									</div>
									<br>
									<br>
									<div class="form-group display-none">
										<label for="exampleInputEmail1">Tiêu đề</label>
										<input type="text" class="form-control" name="name" placeholder="Tiêu đề menu" value="{{old('name')}}" required>
									</div>
									<div class="form-group display-none">
										<label for="exampleInputEmail1">Thứ tự</label>
										<input type="number" min="0" class="form-control" name="stt" placeholder="Thứ tự hiển thị" value="0" required>
									</div>
									
									<div class="form-group cates">
										<label>Danh mục sản phẩm</label>
										<select class="form-control" name="cate_id">
											@foreach($cates as $cate)
												<option value="{{$cate->id}}">{{$cate->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group custom-link">
										<label for="exampleInputEmail1">Custom Link</label>
										<input type="text" class="form-control" name="url" placeholder="link menu" value="{{old('url')}}" >
									</div>
									<div id="pr-plus"></div>
									<!-- <a href="#" class="pr-plus">thêm giá trị</a> -->
									
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
			$(document).ready(function(event) {
				$(".cates").css('display','none');
				$(".custom-link").css('display','none');
			});
			$(document).on('click', '.add-menu-1', function(event) {
				event.preventDefault();
				$(".display-none").css('display','block');
				$(".custom-link").css('display','none');
				$(".cates").css('display','block');
				$("input[name='type']").attr('value',1);
			});
			$(document).on('click', '.add-menu-0', function(event) {
				event.preventDefault();
				$(".display-none").css('display','block');
				$(".cates").css('display','none');
				$(".custom-link").css('display','block');
				$("input[name='type']").attr('value',0);
			});
		</script>

		<!-- watches product -->
		<!-- <script  src="{{asset('js/index.js')}}"></script> -->
		<!-- end -->

		
@endsection