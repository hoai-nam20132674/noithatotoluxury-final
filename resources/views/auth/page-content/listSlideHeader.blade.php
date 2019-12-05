@extends('auth.layout.default')
@section('css')
	<link rel="stylesheet" href="{{asset('auth/vendor/bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/jscrollpane/jquery.jscrollpane.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/waves/waves.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/switchery/dist/switchery.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/DataTables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/DataTables/Buttons/css/buttons.dataTables.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/ionicons/css/ionicons.min.css')}}">
@endsection
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Slide header</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Slide header</li>
			</ol>
			<div class="box box-block bg-white overflow-x">
				<table class="table table-striped table-bordered dataTable" id="table-1">
					@if( Session::has('flash_message'))
		                <div class="alert alert-{{ Session::get('flash_level')}}">
		                    {{ Session::get('flash_message')}}
		                </div>
		            @endif
					<thead>
						<tr>
							
							<th style="width: 20%">Ảnh background</th>
							<th>Thứ tự</th>
							<th>Xuất bản</th>
							<th>Ngày tạo</th>
							<th>Chỉnh sửa</th>
							<th class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addSlide')}}" style="color: green;"><i class="ion-android-add" style=" font-size:30px;color:#fff;"></i></a>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i=1;
						?>
						
						@foreach ($slides as $slide)
						<tr>
							
							<td>
								<img width="100%" src="{{asset('uploads/images/systems/slides/'.$slide->url_image)}}">
							</td>
							
							<td>
								<input style="width: 50px;" slide-id="{{$slide->id}}" type="number" min="0" value="{{$slide->stt}}">
								<a href="#" slide-id="{{$slide->id}}" class="update-slide-stt" data-type="success">
									<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-refresh" style="padding-right: 5px;"></i>Cập nhật</span>
								</a>
								<a slide-id="{{$slide->id}}" class="ajaxload" style="width: 20px;">
									<span style="background-image: url(https://data.vietnambooking.com/common/gif/icon_img_default.gif);background-size: cover ; padding: 5px 14px;border-radius: 2px; color: #fff; font-weight: 800;"></span>
								</a>
							</td>
							<td>
								@if($slide->display == 0)
									<a style="opacity: 0.2;" href="#" slide-id="{{$slide->id}}" class="slide-display-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
									</a>
									<a style="pointer-events: none;" href="#" slide-id="{{$slide->id}}" class="slide-display-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
									</a>
								@else
									<a style="pointer-events: none;" href="#" slide-id="{{$slide->id}}" class="slide-display-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
									</a>
									<a style="opacity: 0.2;" href="#" slide-id="{{$slide->id}}" class="slide-display-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
									</a>
								@endif
							</td>
							<td>{{$slide->created_at}}</td>
							<td>{{$slide->updated_at}}</td>
							<td class="text-center">
								<a onclick="return confirmDelete('Bạn có chắc muốn xóa dịch vụ này không')" title="Xóa dịch vụ"><i class="fa fa-trash-o" style="width: 20%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
								<a href="{{ URL::route('editSlide',$slide->id)}}" title="Sửa slide"><i class="fa fa-pencil-square-o" style="width: 20%; font-size: 18px;"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
@endsection
@section('js')
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
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/Buttons/js/dataTables.buttons.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/JSZip/jszip.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/pdfmake/build/pdfmake.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/pdfmake/build/vfs_fonts.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/Buttons/js/buttons.html5.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/Buttons/js/buttons.print.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/DataTables/Buttons/js/buttons.colVis.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/vendor/toastr/toastr.min.js')}}"></script>

	<!-- Neptune JS -->
	<script type="text/javascript" src="{{asset('auth/js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/demo.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/ui-notifications.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/tables-datatable.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".ajaxload").hide();
		});
		$(document).on('click', '.update-slide-stt', function(event) {
			event.preventDefault();
			
			var slide_id = $(this).attr('slide-id');
			$(".ajaxload[slide-id="+slide_id+"]").show();
			var select = $("input[slide-id="+slide_id+"]");
			var value = select.val();
			url = '/auth/admin/update-slide-stt/'+slide_id+'-'+value;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
					$(".ajaxload[slide-id="+slide_id+"]").hide();
				}
			});
		});
		$(document).on('click', '.slide-display-none', function(event) {
			event.preventDefault();
			var slide_id = $(this).attr('slide-id');
			url = '/auth/admin/slide-display-none/'+slide_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".slide-display-none[slide-id="+slide_id+"]").css('opacity',1);
			$(".slide-display-block[slide-id="+slide_id+"]").css('opacity',0.2);
			$(".slide-display-none[slide-id="+slide_id+"]").css('pointer-events','none');
			$(".slide-display-block[slide-id="+slide_id+"]").css('pointer-events','');
		});
		$(document).on('click', '.slide-display-block', function(event) {
			event.preventDefault();
			var slide_id = $(this).attr('slide-id');
			url = '/auth/admin/slide-display-block/'+slide_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".slide-display-none[slide-id="+slide_id+"]").css('opacity',0.2);
			$(".slide-display-block[slide-id="+slide_id+"]").css('opacity',1);
			$(".slide-display-none[slide-id="+slide_id+"]").css('pointer-events','');
			$(".slide-display-block[slide-id="+slide_id+"]").css('pointer-events','none');
		});
	</script>
@endsection