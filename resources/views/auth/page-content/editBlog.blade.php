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
			<h4>Sửa tin tức</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{URL::route('listBlogs')}}">Danh sách tin tức</a></li>
				<li class="breadcrumb-item active">Thêm tin tức</li>
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
				<form action="{{URL::route('postEditBlog',$blog->id)}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-9">
							<div class="row">

								<div class="col-md-3">
									<a href="" target="_blank"><button class="btn btn-primary" style="width: 100%;">creeauto.com</button></a>
								</div>
								<div class="col-md-9">
									<div class="form-group">	
										<input onchange="appendLink()" type="text" class="form-control" name="url" placeholder="Nhập Url" value="{{$blog->url}}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tiêu đề</label>
								<input onchange="appendTitle()" type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="{{$blog->title}}">
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Keywords</label>
								<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="{{$blog->seo_keyword}}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Description</label>
								<input onchange="appendDescription()" type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="{{$blog->seo_description}}">
							</div>
							<div class="form-group">
								<label for="exampleTextarea">Nội dung</label>
								<textarea class="form-control" name="content" rows="3">{{$blog->content}}</textarea>
								<script type="text/javascript">
							      var editor = CKEDITOR.replace('content',{
							       language:'vi',
							       filebrowserImageBrowseUrl : '../../../admin/ckfinder/ckfinder.html?type=Images',
							       filebrowserFlashBrowseUrl : '../../../admin/ckfinder/ckfinder.html?type=Flash',
							       filebrowserImageUploadUrl : '../../../admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							       filebrowserFlashUploadUrl : '../../../admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
							       });
							     </script>﻿
							</div>
							
						</div>
						<div class="col-md-3">
							
							<div class="checkbox">
								@if($blog->display ==0)
									<label>
										<input type="radio"  name="display" value="1" >Hiển thị
									</label>
									<label>
										<input type="radio"  name="display" value="0" checked>Tắt hiển thị
									</label>
								@else 
									<label>
										<input type="radio"  name="display" value="1" checked >Hiển thị
									</label>
									<label>
										<input type="radio"  name="display" value="0" >Tắt hiển thị
									</label>
								@endif
								
							</div>
							<div class="file-upload">	
							  	<div class="file-upload-content file-upload-content100" style="position: relative;">
							    	<img width="100%" class="file-upload-image file-upload-image100" src="{{asset('uploads/images/blogs/'.$blog->image)}}" alt="your image" />
							    	<div class="image-title-wrap image-title-wrap100" style="position: absolute;top: 0px; right: 0px;">
							      		<button type="button" onclick="removeUploadTest(100)" class="remove-image">Ảnh đại diện</button>
							    	</div>
							    	<input style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input100" type='file' name="image" onchange="readURLTest(this,100);" accept="image/*" />
							  	</div>
							  	<h1 class="append-title" style="font-size: 20px; color: #1a0dab; font-weight: 400;">{{$blog->title}}</h1>
							  	<span style="font-size: 14px; color: #006621; border: 1px solid #006621; border-radius: 3px; padding: 0px 3px 0px 2px; line-height: 11px;">Quảng cáo</span><a style="font-size: 14px; color: #006621;">https://creeauto.com/</a><a class="append-link" style="font-size: 14px; color: #006621;">{{$blog->url}}</a>
							  	<p class="append-description" style="font-size: 14px; color: #545454;">{{$blog->seo_description}}</p>
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