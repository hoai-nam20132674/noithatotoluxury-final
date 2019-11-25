@extends('auth.layout.default')
@section('css')
	<link rel="stylesheet" href="{{asset('auth/vendor/bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/jscrollpane/jquery.jscrollpane.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/waves/waves.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/switchery/dist/switchery.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/multi-select/css/multi-select.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}">
@endsection
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Menu</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm hệ thống nổi bật trang chủ</li>
			</ol>
			@if( Session::has('flash_message'))
                <div class="alert alert-{{ Session::get('flash_level')}}">
                    {{ Session::get('flash_message')}}
                </div>
            @endif
			<div class="box box-block bg-white">
				<div class="title-edit-menu text-center" style="color: #000;">
					<h5 style="font-weight: 700;">GÁN NHÃN CHO DANH MỤC</h5>
					<p class="font-90 text-muted mb-1">Vui lòng chọn danh mục sản phẩm của các gian hàng để gán nhãn <span style="font-size: 10px;" class="tag tag-danger">CẬP NHẬT</span></p>
				</div>
				<hr>
				<form action="{{URL::route('postAddTagCategorie',$cate->id)}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="form-group row">
						<div class="col-sm-2">
							<button type="button" class="btn btn-outline-black mb-0-25 waves-effect waves-light"><i class="ti-home"></i> Gán nhãn cho {{$cate->name}}</button>
						</div>
						@php
							$old_tag = App\TagCategories::where('root_categorie_id',$cate->id)->get();
						@endphp	
						<div class="col-sm-6">
							<select name="tag[]" id="select2-demo-2" class="form-control" value="" data-plugin="select2" multiple="multiple">
								
									@if(count($old_tag) ==0)
										@foreach($cates as $cate)
											<option value="{{$cate->id}}">{{$cate->name}}</option>
										@endforeach
									@else
										@foreach($cates as $cate)
											@foreach($old_tag as $old)
												@if($cate->id == $old->categorie_id)
													<option value="{{$cate->id}}" selected>{{$cate->name}}</option>
												@else
													<option value="{{$cate->id}}">{{$cate->name}}</option>
												@endif
											@endforeach
										@endforeach
									@endif
								
							</select>
							
						</div>
						<div class="col-sm-2"><button type="submit" class="btn btn-primary">SUBMIT</button></div>
					</div>
				</form>
				<hr>
				
			</div>
		</div>
	</div>
@endsection
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
	<script type="text/javascript" src="{{asset('auth/vendor/select2/dist/js/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/bootstrap-maxlength/src/bootstrap-maxlength.js')}}"></script>

	<!-- Neptune JS -->
	<script type="text/javascript" src="{{asset('auth/js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/demo.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/forms-plugins.js')}}"></script>
@endsection