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
			<h4>Thêm mới thành viên</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{URL::route('listUsers')}}">Danh sách thành viên</a></li>
				<li class="breadcrumb-item active">Thêm nhân viên</li>
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
				<form action="{{URL::route('postAddUser')}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
					<div class="row">
						<div class="col-md-9">
							
							<div class="form-group">
								<label for="exampleInputEmail1">Họ tên</label>
								<input type="text" class="form-control" name="name" placeholder="Nhập tên thành viên" value="{{old('name')}}" required>
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Số điện thoại</label>
								<input type="text" class="form-control" name="phone" placeholder="Email" value="{{old('phone')}}" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								<input type="password" class="form-control" name="password" placeholder="nhập password" value="{{old('password')}}" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Confrim Password</label>
								<input type="password" class="form-control" name="confirm_password" placeholder="nhập lại password" value="{{old('confirm_password')}}" required>
							</div>
							@if(Auth::user()->role ==1 && Auth::user()->id == Auth::user()->parent_id)
							<div class="form-group">
				                <label>Quản lý hệ thống</label>
				                <select class="form-control" name="systems_id">
				                	@foreach($systems as $st)
				                    	<option value="{{$st->id}}">{{$st->name}}</option>
				                    @endforeach
				                </select>
				            </div>
				            @elseif(Auth::user()->role ==0 && Auth::user()->parent_id ==1)
				            <div class="form-group">
				                <label>Quản lý hệ thống</label>
				                <select class="form-control" name="systems_id">
				                	@foreach($systems as $st)
				                		@if($st->id ==1)
				                		@else
				                    	<option value="{{$st->id}}">{{$st->name}}</option>
				                    	@endif
				                    @endforeach
				                </select>
				            </div>
				            @elseif(Auth::user()->role ==1 && Auth::user()->id != Auth::user()->parent_id)
				            <div class="form-group">
				                <label>Quản lý hệ thống</label>
				                <select class="form-control" name="systems_id">
				                    <option value="{{$system->id}}">{{$system->name}}</option>
				                </select>
				            </div>
				            @else
				            @endif
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