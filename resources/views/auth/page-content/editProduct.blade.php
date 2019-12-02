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
								<div class="col-md-8">
									<div class="row">

										<div class="col-md-3">
											<a href="https://creeauto.com/" target="_blank"><button class="btn btn-primary" style="width: 100%;">creeauto.com/</button></a>
										</div>
										<div class="col-md-9">
											<div class="form-group">	
												<input onchange="appendLink()" type="text" class="form-control" name="url" placeholder="Nhập Url" value="{{$product->url}}">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Tên sản phẩm</label>
										<input type="text" class="form-control" name="name" placeholder="Nhập tiêu đề danh mục" value="{{$product->name}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Mã sản phẩm</label>
										<input type="text" class="form-control" name="code" placeholder="Nhập mã sản phẩm" value="{{$product->code}}">
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Tiêu đề</label>
										<input onchange="appendTitle()" type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="{{$product->title}}">
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Seo keywords</label>
										<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="{{$product->seo_keyword}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Seo description</label>
										<input onchange="appendDescription()" type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="{{$product->seo_description}}">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Video</label>
										<input type="text" class="form-control" name="video" placeholder="Link Video" value="{{$product->video}}">
									</div>
									@php
										$categorie = App\Categories::where('id',$product->categories_id)->get()->first();
										$cates = App\Categories::where('systems_id',Auth::user()->systems_id)->where('id','!=',$categorie->id)->get();

									@endphp
									<div class="form-group">
										<label for="exampleInputEmail1">Danh mục</label>
										<select class="form-control" name="categories_id">
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
									<div class="checkbox">
										@if($product->highlights==0)
											<label>
												<input type="radio"  name="highlights" value="1" >Nổi bật
											</label>
											<label>
												<input type="radio"  name="highlights" value="0" checked>Không nổi bật
											</label>
										@else 
											<label>
												<input type="radio"  name="highlights" value="1" checked >Nổi bật
											</label>
											<label>
												<input type="radio"  name="highlights" value="0" >Không nổi bật
											</label>
										@endif
									</div>
									<div class="form-group">
										<label for="exampleTextarea">Mô tả ngắn</label>
										<textarea class="form-control" name="short_description" rows="3">{{$product->short_description}}</textarea>
										<script type="text/javascript">
									      var editor = CKEDITOR.replace('short_description',{
									       language:'vi',
									       filebrowserImageBrowseUrl : '../auth/ckfinder/ckfinder.html?type=Images',
									       filebrowserFlashBrowseUrl : '../auth/ckfinder/ckfinder.html?type=Flash',
									       filebrowserImageUploadUrl : '../auth/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
									       filebrowserFlashUploadUrl : '../auth/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
									       });
									     </script>﻿
									</div>
									
									<div class="form-group">
										<label for="exampleTextarea">Giới thiệu</label>
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
								<div class="col-md-4">
									<div class="file-upload">	
									  	<div class="file-upload-content file-upload-content100" style="position: relative;">
									    	<img width="100%" class="file-upload-image file-upload-image100" src="{{asset('uploads/images/products/image_share/'.$product->share_image)}}" alt="your image" />
									    	<div class="image-title-wrap image-title-wrap100" style="position: absolute;top: 0px; right: 0px;">
									      		<button type="button" onclick="removeUploadTest(100)" class="remove-image">Og:image</button>
									    	</div>
									    	<input style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input100" type='file' name="share_image" onchange="readURLTest(this,100);" accept="image/*" />
									  	</div>
									</div>
									<h1 class="append-title" style="font-size: 20px; color: #1a0dab; font-weight: 400;">{{$product->title}}</h1>
								  	<span style="font-size: 14px; color: #006621; border: 1px solid #006621; border-radius: 3px; padding: 0px 3px 0px 2px; line-height: 11px;">Quảng cáo</span><a style="font-size: 14px; color: #006621;">https://creeauto.com/</a><a class="append-link" style="font-size: 14px; color: #006621;">{{$product->url}}</a>
								  	<p class="append-description" style="font-size: 14px; color: #545454;">{{$product->seo_description}}</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-3">
							
							
							<div class="all-image-product">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
										<?php 
											$i=10;
											$product_image = App\ImagesProducts::where('products_id',$product->id)->orderBy('id','DESC')->get();
										?>
										@foreach($product_image as $image)
																		
											@if($image->role ==1)
												<div class="col-md-6" style="padding: 15px;">
													<div class="file-upload-content file-upload-content0" style="position: relative;">
												    	<img width="100%" class="file-upload-image file-upload-image0" src="{{asset('uploads/images/products/avatar/'.$image->url)}}" alt="your image" />
												    	<div class="image-title-wrap image-title-wrap0" style="position: absolute;top: 0px; right: 0px;">
												      		<button type="button" onclick="removeUploadTest(0)" class="remove-image">Ảnh đại diện</button>
												    	</div>
												    	<input image-id="{{$image->id}}" style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input0" type='file' name="avatar" onchange="readURLTest(this,0); updateImage({{$image->id}},this.files[0]);" accept="image/*" />
												  	</div>
												</div>
												<?php
													$i++;
												?>
											@else
												<div class="col-md-6" style="padding: 15px;">
													<div class="file-upload-content file-upload-content{{$i}}" style="position: relative;">
												    	<img width="100%" class="file-upload-image file-upload-image{{$i}}" src="{{asset('uploads/images/products/avatar/'.$image->url)}}" alt="your image" />
												    	<div class="image-title-wrap image-title-wrap{{$i}}" style="position: absolute;top: 0px; right: 0px;">
												      		<button type="button" onclick="removeUploadTest({{$i}})" class="remove-image">Ảnh chi tiết</button>
												    	</div>
												    	<input image-id="{{$image->id}}" style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input{{$i}}" type='file' name="image_detail[]" onchange="readURLTest(this,{{$i}}); updateImage({{$image->id}},this.files[0]);" accept="image/*" />
												  	</div>
												</div>
												<?php
													$i++;
												?>
											@endif
										@endforeach

											<div id="more_image"></div>
											<div class="col-md-6">
												<div class="icon-area" style="text-align: center; padding: 50px 0px; margin: 20px 0px; border: 4px dashed #1FB264;"><i class="fa fa-plus" onclick="more_image()"></i></div>
											</div>
											
										</div>
									</div>
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
		<script type="text/javascript">
			
			function more_image(){
				var i = parseInt($("input[type=file]").length);
				i=i+1;
				var more_image = $("#more_image");
				more_image.append('<div class="col-md-6" style="padding: 15px;"><div class="file-upload"><div class="file-upload-content file-upload-content'+i+'" style="position: relative;"><img width="100%" class="file-upload-image file-upload-image'+i+'" src="https://i.pinimg.com/originals/4b/50/f9/4b50f9eeb7d6617cc9aaaa6405f27a07.gif" alt="your image" /><div class="image-title-wrap image-title-wrap'+i+'" style="position: absolute;top: 0px; right: 0px;"><button type="button" onclick="removeUploadTest('+i+')" class="remove-image">Ảnh chi tiết</button></div><input required style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input'+i+'" type="file" name="image_detail[]" onchange="readURLTest(this,'+i+');" accept="image/*" /></div></div></div>');
				i++;
			};
			
		</script>
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
		<!-- <script type="text/javascript">
			function updateImage(id,file){
				var file_name = file.name;
				var formData = new FormData();
				formData.append("file", file);
				url = '/auth/admin/update-image/'+id+'-'+file_name;
				$.ajax({
					type: 'POST',
					url: url,
					dataType: 'html',
					data: formData,
					success: function(data) {
						console.log(data);
					}
				});
			}
		</script> -->
@endsection