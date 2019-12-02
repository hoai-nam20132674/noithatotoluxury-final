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
	<!-- <link rel="stylesheet" href="{{asset('css/style_watches.css')}}"> -->
	<!-- end -->
@endsection()
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Thêm mới sản phẩm</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{URL::route('listProducts')}}">Danh sách sản phẩm</a></li>
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
				<form action="{{URL::route('postAddProduct')}}" method="POST" enctype="multipart/form-data">
					
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-9 0848384333">
							<!-- <div class="row">

								<div class="col-md-3">
									<a href="http://bkshop.vn/" target="_blank">
										<div style="background: #0275d8;" class="text-center">
											<span style="color: #fff; font-size:20px; ">http://bkshop.vn/</span>
										</div>
									</a>
								</div>
								<div class="col-md-9">
									<div class="form-group">	
										<input type="text" class="form-control" name="url" placeholder="Nhập Url" value="{{old('url')}}">
									</div>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-8">
									<div class="form-group" style="position: relative;">
										<span class="tag tag-primary btn btn-primary" style="position: absolute; top: 0px; width: 150px; height: 31px; padding: 7px 0px; font-size: 15px;">creeauto.com/</span>
										<input onchange="appendLink()" style="padding-left: 160px;" type="text" class="form-control" name="url" placeholder="link sản phẩm" value="{{old('url')}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tên sản phẩm</label>
										<input type="text" class="form-control" name="name" placeholder="Nhập tiêu đề danh mục" value="{{old('name')}}" required>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Mã sản phẩm</label>
										<input type="text" class="form-control" name="code" placeholder="Nhập mã sản phẩm" value="{{old('code')}}" required>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tiêu đề</label>
										<input onchange="appendTitle()" type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="{{old('title')}}" required >
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Seo keywords</label>
										<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="{{old('seo_keyword')}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Seo description</label>
										<input onchange="appendDescription()" type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="{{old('seo_description')}}" required >
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Video</label>
										<input type="text" class="form-control" name="video" placeholder="video-youtube" value="{{old('video')}}">
									</div>

									<div class="form-group">
										<label>Danh mục sản phẩm</label>
										<select class="form-control" name="categories_id">
											@foreach($category as $cate)
												<option value="{{$cate->id}}">{{$cate->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group product_line">
										<div class="product_detail" id="0" style="position: relative;">
											<div class="row">
												<div class="col-md-12">
													<div class="swatches" product-detail="0" >
														
											            
											            
											       	</div>
											       	<div class="price_amount">
											       		<div class="form-group" style="width: 33%; float: left; position: relative; padding: 0px 10px;">
															<!-- <label for="exampleInputEmail1">Số lượng</label> -->
															<span class="tag tag-danger btn btn-danger" style="position: absolute; top: 0px; left: 10px; width: 60px; height: 31px; padding: 10px 0px;">SỐ LƯỢNG</span>
															<input style="padding-left: 70px;" type="number" class="form-control" name="amount[]" placeholder="" value="{{old('amount[]')}}" required>
														</div>
														<div class="form-group" style="width: 33%; float: left; position: relative; padding: 0px 10px;">
															<!-- <label for="exampleInputEmail1">Số lượng</label> -->
															<span class="tag tag-danger btn btn-danger" style="position: absolute; top: 0px; left: 10px; width: 60px; height: 31px; padding: 10px 0px;">GIÁ</span>
															<input style="padding-left: 70px;" type="number" class="form-control" name="price[]" placeholder="" value="{{old('price[]')}}" required>
														</div>
														<div class="form-group" style="width: 33%; float: left; position: relative; padding: 0px 10px;">
															<!-- <label for="exampleInputEmail1">Số lượng</label> -->
															<span class="tag tag-danger btn btn-danger" style="position: absolute; top: 0px; left: 10px; width: 60px; height: 31px; padding: 10px 0px;">Giá Sale</span>
															<input style="padding-left: 70px;" type="number" class="form-control" name="sale[]" placeholder="" value="{{old('sale[]')}}">
														</div>
											       	</div>
										       </div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="tag-properties-type">
														<?php $i =1; $j=0; ?>
														@foreach($properties_type as $pptt)
															<span class="tag tag-primary tag-swatch btn btn-primary" swatch-recoment="{{$j}}" display="block"><a>{{$pptt->name}}</a></span>
															<div class="swatch-root display-none" swatch-recoment="{{$j}}" >
																<div class="swatch clearfix " id="" swatch-recoment="{{$j}}" style="position: relative;">
												                  	<div class="header">{{$pptt->name}}</div>
												                  	<?php $k=1;?>
												                  	@foreach($properties as $ppt)
												                  		@if($ppt->properties_type_id == $pptt->id)
														                  	<div input-number="{{$k}}" data-value="{{$ppt->value}}" class="swatch-element plain m available">
															                    <input id="{{$i}}" type="radio" name="" value="{{$ppt->id}}" required />
															                    <label for="{{$i}}">
															                      {{$ppt->value}}
															                      	<img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
															                    </label>
														                  	</div>
														                  	<?php $i++; $k++; ?>
														                @endif
												                  	@endforeach
												                  	<div class="close close-swatch" style="position: absolute; top: 0px; right: 0px;" >
												                  		<div title="XÓA THUỘC TÍNH"><i class="fa fa-close"></i></div>
												                  	</div>
												                </div>
												            </div>
												            <?php $j++; ?>

														@endforeach
													</div>
												</div>
											</div>
											<div class="close close-product-detail" style="position: absolute; top: 0px; right: 0px;" >
						                  		<div title="XÓA THUỘC TÍNH"><i class="fa fa-close"></i></div>
						                  	</div>
										</div>
									</div>
									<!-- <a id="add-product-line"><div class="icon-area add-product-line" style="text-align: center; padding: 0px 0px; margin: 20px 0px; border: 2px dashed #1FB264;"><i class="fa fa-plus"></i></div></a> -->
									<div class="checkbox">
										<label>
											<input type="radio" name="display" value="1" checked>Hiển thị
										</label>
										<label>
											<input type="radio" name="display" value="0">Tắt hiển thị
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
							<br>
							<div class="form-group">
								<label for="exampleTextarea">Mô tả ngắn</label>
								<textarea class="form-control" name="short_description" rows="3" required>{{old('short_description')}}</textarea>
								<script type="text/javascript">
							      var editor = CKEDITOR.replace('short_description',{
							       language:'vi',
							       filebrowserImageBrowseUrl : '../ckfinder/ckfinder.html?type=Images',
							       filebrowserFlashBrowseUrl : '../ckfinder/ckfinder.html?type=Flash',
							       filebrowserImageUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							       filebrowserFlashUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
							       });
							     </script>﻿
							</div>
							<div class="form-group">
								<label for="exampleTextarea">Giới thiệu sản phẩm</label>
								<textarea class="form-control" name="content" rows="3" required>{{old('content')}}</textarea>
								<script type="text/javascript">
							      var editor = CKEDITOR.replace('content',{
							       language:'vi',
							       filebrowserImageBrowseUrl : '../ckfinder/ckfinder.html?type=Images',
							       filebrowserFlashBrowseUrl : '../ckfinder/ckfinder.html?type=Flash',
							       filebrowserImageUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							       filebrowserFlashUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
							       });
							     </script>﻿
							</div>
							
							
				            
						</div>
						<div class="col-md-3">
							
							
							<div class="file-upload">	
							  	<div class="file-upload-content file-upload-content0" style="position: relative;">
							    	<img width="100%" class="file-upload-image file-upload-image0" src="https://i.pinimg.com/originals/4b/50/f9/4b50f9eeb7d6617cc9aaaa6405f27a07.gif" alt="your image" />
							    	<div class="image-title-wrap image-title-wrap0" style="position: absolute;top: 0px; right: 0px;">
							      		<button type="button" onclick="removeUploadTest(0)" class="remove-image">Ảnh đại diện</button>
							    	</div>
							    	<input required style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input0" type='file' name="avatar" onchange="readURLTest(this,0);" accept="image/*" />
							  	</div>
							</div>
							<br>
							<br>
							
							<div class="file-upload">	
							  	<div class="file-upload-content file-upload-content1" style="position: relative;">
							    	<img width="100%" class="file-upload-image file-upload-image1" src="https://i.pinimg.com/originals/4b/50/f9/4b50f9eeb7d6617cc9aaaa6405f27a07.gif" alt="your image" />
							    	<div class="image-title-wrap image-title-wrap1" style="position: absolute;top: 0px; right: 0px;">
							      		<button type="button" onclick="removeUploadTest(1)" class="remove-image">Ảnh chi tiết</button>
							    	</div>
							    	<input required style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input1" type='file' name="image_detail[]" onchange="readURLTest(this,1);" accept="image/*" />
							  	</div>
							</div>
							<div id="more_image"></div>
							<div class="icon-area" style="text-align: center; padding: 50px 0px; margin: 20px 0px; border: 4px dashed #1FB264;"><i class="fa fa-plus" onclick="more_image()"></i></div>
							
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

		<!-- watches product -->
		<!-- <script  src="{{asset('js/index.js')}}"></script> -->
		<!-- end -->

		<script type="text/javascript">
			
			function more_image(){
				var i = parseInt($("input[type=file]").length);
				i=i+1;
				var more_image = $("#more_image");
				more_image.append('<br><br><div class="file-upload"><div class="file-upload-content file-upload-content'+i+'" style="position: relative;"><img width="100%" class="file-upload-image file-upload-image'+i+'" src="https://i.pinimg.com/originals/4b/50/f9/4b50f9eeb7d6617cc9aaaa6405f27a07.gif" alt="your image" /><div class="image-title-wrap image-title-wrap'+i+'" style="position: absolute;top: 0px; right: 0px;"><button type="button" onclick="removeUploadTest('+i+')" class="remove-image">Ảnh chi tiết</button></div><input required style="z-index: 100; position: absolute; top: 0px; left: 0px;" class="file-upload-input file-upload-input'+i+'" type="file" name="image_detail[]" onchange="readURLTest(this,'+i+');" accept="image/*" /></div></div>');
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
		<script type="text/javascript" src="{{asset('auth/js/add-remove-product-line.js')}}"></script>
@endsection