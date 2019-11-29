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

			<h4>Sửa danh mục</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{URL::route('listCategories')}}">Danh mục</a></li>
				<li class="breadcrumb-item active">Sửa danh mục</li>
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
				
					<form action="{{ URL::route('postEditCategorie')}}" method="POST">
						<form action="" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div class="row">
							<div class="col-md-9">
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
											<input type="text" class="form-control" name="url" placeholder="Nhập Url" value="{{$cate->url}}" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Tên danh mục</label>
									<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{$cate->name}}" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Tiêu đề</label>
									<input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="{{$cate->title}}" required>
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1">Keywords</label>
									<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="{{$cate->seo_keyword}}" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Description</label>
									<input type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="{{$cate->seo_description}}" required>
								</div>
								<div class="checkbox">
									@if($cate->highlights ==1 )
										<label>
											<input type="radio" name="highlights" value="1" checked>Nổi bật
										</label>
										<label>
											<input type="radio" name="highlights" value="0">Không nổi bật
										</label>
									@else
										<label>
											<input type="radio" name="highlights" value="1" >Nổi bật
										</label>
										<label>
											<input type="radio" name="highlights" value="0" checked>Không nổi bật
										</label>
									@endif
								</div>
								
								
							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-6">
										<div class="image-blog image-product1" style="width: 100%" >
											<img class="img-thumbnail" width="100%" src="{{asset('uploads/images/categories/avatar/'.$cate->avatar)}}">
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="image-blog image-product2" style="width: 100%" >
											<img class="img-thumbnail" width="100%" src="{{asset('uploads/images/categories/share_image/'.$cate->share_image)}}">
										</div>
										
									</div>

								</div>
								<div class="file-upload edit-image1">	
								  	<div class="image-upload-wrap image-upload-wrap1">
									    <input class="file-upload-input file-upload-input1" type='file' name="avatar" onchange="readURL1(this);" accept="image/*" />
									    <div class="drag-text">
									      <h3>Đổi ảnh đại diện</h3>
									    </div>
								  	</div>
								  	<div class="file-upload-content file-upload-content1">
								    	<img class="file-upload-image file-upload-image1" src="#" alt="your image" />
								    	<div class="image-title-wrap image-title-wrap1">
								      		<button type="button" onclick="removeUpload1()" class="remove-image">Remove <span class="image-title image-title1 text-center">Uploaded Image</span></button>
								    	</div>
								  	</div>
								</div>
								<div class="file-upload edit-image2">	
								  	<div class="image-upload-wrap image-upload-wrap2">
									    <input class="file-upload-input file-upload-input2" type='file' name="share_image" onchange="readURL2(this);" accept="image/*" />
									    <div class="drag-text">
									      <h3>Đổi Chia Sẻ Social</h3>
									    </div>
								  	</div>
								  	<div class="file-upload-content file-upload-content2">
								    	<img class="file-upload-image file-upload-image2" src="#" alt="your image" />
								    	<div class="image-title-wrap image-title-wrap2">
								      		<button type="button" onclick="removeUpload2()" class="remove-image">Remove <span class="image-title image-title2 text-center">Uploaded Image</span></button>
								    	</div>
								  	</div>
								</div>

								<br>
								@php
									$categorie = App\Categories::where('systems_id',Auth::user()->systems_id)->where('id','!=',$cate->id)->get();
								@endphp
								<div class="form-group">
									<select class="form-control" name="parent_id">
										<option value="0">Thư Mục Gốc</option>

										@foreach($categorie as $cate)
											<option value="{{$cate->id}}">{{$cate->name}}</option>
										@endforeach
									</select>
								</div>
								
								<div class="checkbox">
									@if($cate->display ==1)
										<label>
											<input type="radio" name="display" value="1" checked>Hiển thị
										</label>
										<label>
											<input type="radio" name="display" value="0">Tắt hiển thị
										</label>
									@else
										
									@endif
									
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
@endsection