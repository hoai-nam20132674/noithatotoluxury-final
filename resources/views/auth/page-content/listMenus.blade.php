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
	
	
@endsection()
@section('content')
	
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Danh sách menu</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Danh sách menu</li>
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
							<th>Tiêu đề</th>
							<th>Url</th>
							<th class="text-center">Thứ tự</th>
							<th class="text-center">Loại</th>
							<th class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addMenu')}}" title="Thêm Menu" style="color: green;"><i class="ion-android-add" style=" font-size:30px;color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach($menus as $menu)
						<tr>
							
							<td>{{$menu->name}}</td>
							<td>{{$menu->url}}</td>
							<td>
								<input menu-id="{{$menu->id}}" type="number" min="0" value="{{$menu->stt}}">
								<a href="#" menu-id="{{$menu->id}}" class="update-menu">
									<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-refresh" style="padding-right: 5px;"></i>Cập nhật</span>
								</a>
								<a class="ajaxload" menu-id="{{$menu->id}}" style="width: 20px;">
									<span style="background-image: url(https://data.vietnambooking.com/common/gif/icon_img_default.gif);background-size: cover ; padding: 5px 14px;border-radius: 2px; color: #fff; font-weight: 800;"></span>
								</a>
							</td>
							@if($menu->type ==1)
								<td>
									<a href="#" class="">
										<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-list" style="padding-right: 5px;"></i>Danh mục</span>
									</a>
								</td>
							@else
								<td>
									<a href="#" class="">
										<span style="background: #8c0000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-link" style="padding-right: 5px;"></i>Custom Link</span>
									</a>
								</td>
							@endif

							
							
							<td class="text-center">
								<a onclick="return confirmDelete('Bạn có chắc muốn xóa menu này không')" href="{{ URL::route('deleteMenu',$menu->id)}}" title="Xóa menu"><i class="ion-trash-a" style="width: 100%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
								<a href="{{ URL::route('editMenu',$menu->id)}}" title="Sửa menu"><i class="ion-compose" style="width: 100%; font-size: 18px;"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
@endsection()
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

	<!-- Neptune JS -->
	<script type="text/javascript" src="{{asset('auth/js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/demo.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/tables-datatable.js')}}"></script>
	<script type="text/javascript" src="{{asset('auth/js/display_categorie.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".ajaxload").hide();
		});
		$(document).on('click', '.update-menu', function(event) {
			event.preventDefault();
			
			var menu_id = $(this).attr('menu-id');
			$(".ajaxload[menu-id="+menu_id+"]").show();
			var select = $("input[menu-id="+menu_id+"]");
			var value = select.val();
			url = '/auth/admin/update-menu/'+menu_id+'-'+value;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
					$(".ajaxload[menu-id="+menu_id+"]").hide();
				}
			});
		});
		
	</script>
@endsection()