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

	<!-- watches product -->
	<link rel="stylesheet" href="{{asset('css/style_watches.css')}}">
	<!-- end -->
@endsection()
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Thêm mới sản phẩm</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm sản phẩm</li>
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
				<form action="{{URL::route('postEditSystem',$system->id)}}" method="POST" enctype="multipart/form-data">
					
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-6 0848384333">
							
							<div class="row">
								<div class="col-md-12">
									
									<div class="form-group">
										<label for="exampleInputEmail1">Tên gian hàng</label>
										<input type="text" class="form-control" name="name" placeholder="Nhập tên gian hàng" value="{{$system->name}}" required>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tiêu đề</label>
										<input onchange="appendTitle();" type="text" class="form-control" name="title" placeholder="Nhập tiêu đề " value="{{$system->title}}" required >
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Seo keywords</label>
										<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="{{$system->seo_keyword}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Seo description</label>
										<input onchange="appendDescription();" type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="{{$system->seo_description}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Facebook</label>
										<input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{$system->facebook}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Zalo</label>
										<input type="text" class="form-control" name="zalo" placeholder="Zalo" value="{{$system->zalo}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Instagram</label>
										<input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{$system->instagram}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Youtube</label>
										<input type="text" class="form-control" name="youtube" placeholder="Youtube" value="{{$system->youtube}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Địa chỉ</label>
										<input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{$system->address}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Số điện thoại</label>
										<input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{$system->phone}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="text" class="form-control" name="email" placeholder="Email" value="{{$system->email}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Mã nhúng</label>
										<textarea name="script" class="form-control" placeholder="script" style="width: 100%; height: 150px;">{{$system->script}}</textarea>
									</div>

									
									
								</div>
								
							</div>
							<br>
							
							
							
							
				            
						</div>
						<div class="col-md-6">
							<div class="row">
								
								<div class="col-md-6">
									<div class="file-upload">
										
									  	
										
									  	<div class="file-upload-content file-upload-content0" style="position: relative;">
									    	<img width="100%" class="file-upload-image file-upload-image0" src="{{asset('uploads/images/systems/logo/'.$system->logo)}}" alt="your image" />
									    	<div class="image-title-wrap image-title-wrap0" style="position: absolute;top: 0px; right: 0px;">
									      		<button type="button" onclick="removeUploadTest(0)" class="remove-image">Logo</button>
									    	</div>
									    	<input style="z-index: 100;top: 0px; left: 0px;" class="file-upload-input file-upload-input0" type='file' name="logo" onchange="readURLTest(this,0);" accept="image/*" />
									  	</div>
									</div>

								</div>
								<div class="col-md-6">
									<div class="file-upload">
										
									  	
										
									  	<div class="file-upload-content file-upload-content1" style="position: relative;">
									    	<img width="100%" class="file-upload-image file-upload-image1" src="{{asset('uploads/images/systems/logo/'.$system->shortcut_logo)}}" alt="your image" />
									    	<div class="image-title-wrap image-title-wrap1" style="position: absolute;top: 0px; right: 0px;">
									      		<button type="button" onclick="removeUploadTest(1)" class="remove-image">Shortcut Logo</button>
									    	</div>
									    	<input style="z-index: 100;top: 0px; left: 0px;" class="file-upload-input file-upload-input1" type='file' name="shortcut_logo" onchange="readURLTest(this,1);" accept="image/*" />
									  	</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="file-upload">
										
									  	
										
									  	<div class="file-upload-content file-upload-content2" style="position: relative;">
									    	<img width="100%" class="file-upload-image file-upload-image2" src="{{asset('uploads/images/systems/share_image/'.$system->share_image)}}" alt="your image" />
									    	<div class="image-title-wrap image-title-wrap2" style="position: absolute;top: 0px; right: 0px;">
									      		<button type="button" onclick="removeUploadTest(2)" class="remove-image">Og:Image</button>
									    	</div>
									    	<input style="z-index: 100; top: 0px; left: 0px;" class="file-upload-input file-upload-input2" type='file' name="share_image" onchange="readURLTest(this,2);" accept="image/*" />
									  	</div>
									  	
									</div>
									<h1 class="append-title" style="font-size: 20px; color: #1a0dab; font-weight: 400;">{{$system->title}}</h1>
								  	<span style="font-size: 14px; color: #006621; border: 1px solid #006621; border-radius: 3px; padding: 0px 3px 0px 2px; line-height: 11px;">Quảng cáo</span><a class="append-link" style="font-size: 14px; color: #006621;"> {{$system->website}}</a>
								  	<p class="append-description" style="font-size: 14px; color: #545454;">{{$system->seo_description}}</p>
								</div>
							</div>
						</div>
					</div>

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
		<script type="text/javascript" src="{{asset('auth/js/add-remove-product-line.js')}}"></script>
		<script type="text/javascript">
			function appendTitle(){
				var title = $("input[name=title]").val();
				$('.append-title').empty();
				$('.append-title').append(title);
			}
			function appendDescription(){
				var description = $("input[name=seo_description]").val();
				$('.append-description').empty();
				$('.append-description').append(description);
			}
		</script>
		
@endsection