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
			<h4>Thêm mới danh mục</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{URL::route('listCategories')}}">Danh mục</a></li>
				<li class="breadcrumb-item active">Thêm danh mục</li>
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
				<form action="{{URL::route('postAddCategorie')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-8">
									<div class="row">

										<div class="col-md-3">
											<a href="http://bkshop.vn/" target="_blank">
												<div style="background: #0275d8;" class="text-center">
													<span style="color: #fff; font-size:20px; ">http://bkshop.vn/</span>
												</div>
											</a>
										</div>
										<div class="col-md-9">
											<div class="form-group">	
												<input onchange="appendLink()" type="text" class="form-control" name="url" placeholder="Nhập Url" value="{{old('url')}}" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tên danh mục</label>
										<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{old('name')}}" required>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tiêu đề</label>
										<input onchange="appendTitle()" type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="{{old('title')}}" required>
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Keywords</label>
										<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="{{old('seo_keyword')}}" required>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Description</label>
										<input onchange="appendDescription()" type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="{{old('seo_description')}}" required>
									</div>
									<div class="form-group">
										<select class="form-control" name="parent_id">
											@if(count($category) ==0)
											<option value="0">Thư Mục Gốc</option>
											@endif
											@foreach($category as $cate)
												<option value="{{$cate->id}}">{{$cate->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="checkbox">
										<label>
											<input type="radio" id="optionsRadios1" name="display" value="1" checked>Hiển thị
										</label>
										<label>
											<input type="radio" id="optionsRadios2" name="display" value="0">Tắt hiển thị
										</label>
										
									</div>
									<div class="checkbox">
										<label>
											<input type="radio" name="highlights" value="1" checked>Nổi bật
										</label>
										<label>
											<input type="radio" name="highlights" value="0">Không nổi bật
										</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="file-upload">	
									  	<div class="file-upload-content file-upload-content100" style="position: relative;">
									    	<img width="100%" class="file-upload-image file-upload-image100" src="https://i.pinimg.com/originals/4b/50/f9/4b50f9eeb7d6617cc9aaaa6405f27a07.gif" alt="your image" />
									    	<div class="image-title-wrap image-title-wrap100" style="position: absolute;top: 0px; right: 0px;">
									      		<button type="button" onclick="removeUploadTest(100)" class="remove-image">Og:image</button>
									    	</div>
									    	<input required style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input100" type='file' name="share_image" onchange="readURLTest(this,100);" accept="image/*" />
									  	</div>
									</div>
									<h1 class="append-title" style="font-size: 20px; color: #1a0dab; font-weight: 400;"></h1>
								  	<span style="font-size: 14px; color: #006621; border: 1px solid #006621; border-radius: 3px; padding: 0px 3px 0px 2px; line-height: 11px;">Quảng cáo</span><a style="font-size: 14px; color: #006621;">https://creeauto.com/</a><a class="append-link" style="font-size: 14px; color: #006621;"> </a>
								  	<p class="append-description" style="font-size: 14px; color: #545454;"></p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							
							<div class="file-upload">	
							  	<div class="file-upload-content file-upload-content10" style="position: relative;">
							    	<img width="100%" class="file-upload-image file-upload-image10" src="https://i.pinimg.com/originals/4b/50/f9/4b50f9eeb7d6617cc9aaaa6405f27a07.gif" alt="your image" />
							    	<div class="image-title-wrap image-title-wrap10" style="position: absolute;top: 0px; right: 0px;">
							      		<button type="button" onclick="removeUploadTest(10)" class="remove-image">Ảnh đại diện</button>
							    	</div>
							    	<input required style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input10" type='file' name="avatar" onchange="readURLTest(this,10);" accept="image/*" />
							  	</div>
							</div>

							<br>
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
			function appendLink(){
				var url = $("input[name=url]").val();
				$('.append-link').empty();
				$('.append-link').append(url);
			}
		</script>
@endsection