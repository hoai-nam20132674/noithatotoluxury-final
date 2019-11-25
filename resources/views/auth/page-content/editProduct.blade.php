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
			<h4>Sửa sản phẩm</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{URL::route('listProducts')}}">Danh sách sản phẩm</a></li>
				<li class="breadcrumb-item active">Sửa sản phẩm</li>
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
				<h5>Form controls</h5>
				
				<form action="{{URL::route('postEditProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-9">
							<div class="row">

								<div class="col-md-3">
									<a href="https://bkmart.vn/" target="_blank"><button class="btn btn-primary" style="width: 100%;">https://bkmart.vn/</button></a>
								</div>
								<div class="col-md-9">
									<div class="form-group">	
										<input type="text" class="form-control" name="url" placeholder="Nhập Url" value="{{$product->url}}">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Tên sản phẩm</label>
								<input type="text" class="form-control" name="name" placeholder="Nhập tiêu đề danh mục" value="{{$product->name}}">
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Tiêu đề</label>
								<input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="{{$product->title}}">
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Seo keywords</label>
								<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="{{$product->seo_keyword}}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Seo description</label>
								<input type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="{{$product->seo_description}}">
							</div>
							
							<div class="form-group">
								<label for="exampleTextarea">Mô tả</label>
								<textarea class="form-control" name="content" rows="3">{{$product->content}}</textarea>
								<script type="text/javascript">
							      var editor = CKEDITOR.replace('content',{
							       language:'vi',
							       filebrowserImageBrowseUrl : '../auth/ckfinder/ckfinder.html?type=Images',
							       filebrowserFlashBrowseUrl : '../auth/ckfinder/ckfinder.html?type=Flash',
							       filebrowserImageUploadUrl : '../auth/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							       filebrowserFlashUploadUrl : '../auth/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
							       });
							     </script>﻿
							</div>
						</div>
						@php
							$categorie = App\Categories::where('id',$product->categories_id)->get()->first();
							$cates = App\Categories::where('systems_id',Auth::user()->systems_id)->where('id','!=',$categorie->id)->get();

						@endphp
						<div class="col-md-3">
							<div class="form-group">
								<select class="form-control" name="categorie_id">
									<option value="{{$categorie->id}}">{{$categorie->name}}</option>
									@foreach($cates as $cate)
										<option value="{{$cate->id}}">{{$cate->name}}</option>
									@endforeach
									
								</select>
							</div>
							<div class="checkbox">
								@if($product->display==0)
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
							
							<div class="all-image-product">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
										<?php 
											$i=0;
											$product_image = App\ImagesProducts::where('products_id',$product->id)->get();
										?>
										@foreach($product_image as $image)
																		
											@if($image->role ==1)
												<div class="col-md-3">
												<div class="image-product{{$i}}" style="" >
													<img class="img-thumbnail" width="100%" src="{{asset('uploads/images/products/avatar/'.$image->url)}}">
												</div>
												</div>
												<?php
													$i++;
												?>
											@else
												<div class="col-md-3">
												<div class="image-product{{$i}}" style="" >
													<img class="img-thumbnail" width="100%" src="{{asset('uploads/images/products/detail/'.$image->url)}}">
												</div>
												</div>
												<?php
													$i++;
												?>
											@endif

										@endforeach
										</div>
									</div>
								</div>
							</div>
							<div class="file-upload edit-image">	
							  	<div class="image-upload-wrap image-upload-wrap0">
								    <input class="file-upload-input file-upload-input0" type='file' name="image" onchange="readURL(this);" accept="image/*" />
								    <div class="drag-text">
								      <h3>Ảnh đại diện </h3>
								    </div>
							  	</div>
							  	<div class="file-upload-content file-upload-content0">
							    	<img class="file-upload-image file-upload-image0" src="#" alt="your image" />
							    	<div class="image-title-wrap image-title-wrap0">
							      		<button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title image-title0 text-center">Uploaded Image</span></button>
							    	</div>
							  	</div>
							  	
							</div>
							
							@for($i=1;$i<4;$i++)
							<div class="file-upload edit-image{{$i}}">	
							  	<div class="image-upload-wrap image-upload-wrap{{$i}}">
								    <input class="file-upload-input file-upload-input{{$i}}" type='file' name="fimage{{$i}}" onchange="readURL{{$i}}(this);" accept="image/*" />
								    <div class="drag-text">
								      <h3>Ảnh detail {{$i}}</h3>
								    </div>
							  	</div>
							  	<div class="file-upload-content file-upload-content{{$i}}">
							    	<img class="file-upload-image file-upload-image{{$i}}" src="#" alt="your image" />
							    	<div class="image-title-wrap image-title-wrap{{$i}}">
							      		<button type="button" onclick="removeUpload{{$i}}()" class="remove-image">Remove <span class="image-title image-title{{$i}} text-center">Uploaded Image</span></button>
							    	</div>
							  	</div>
							</div>
							@endfor
							
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
@endsection