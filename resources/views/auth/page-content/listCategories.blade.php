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
			<h4>Danh sách danh mục</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Danh sách danh mục</li>
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
							<th>Tên danh mục</th>
							<th>Url</th>
							<th class="text-center">Hiển thị</th>
							<th class="text-center">Tắt hiển thị</th>
							<th class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addCategorie')}}" title="Thêm danh mục" style="color: green;"><i class="ion-android-add" style=" font-size:30px;color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach($category as $cate)
						<tr>
							<td>
								@if(Auth::user()->systems_id == 1)
								<a href="{{URL::route('addTagCategorie',$cate->id)}}">{{$cate->name}}</a>
								@else
								{{$cate->name}}
								@endif
							</td>
							<td>{{$cate->url}}</td>
							@if($cate->display==0)
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="enable{{$cate->id}}()" class="enable_categorie" value="{{$cate->id}}" id="enable{{$cate->id}}" type="checkbox">
										</label>
									</div>
								</td>
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="disable{{$cate->id}}()" class="disable_categorie" value="{{$cate->id}}" id="disable{{$cate->id}}" type="checkbox" checked>
										</label>
									</div>
								</td>
							@else
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="enable{{$cate->id}}()" class="enable_categorie" value="{{$cate->id}}" id="enable{{$cate->id}}" type="checkbox" checked>
										</label>
									</div>
								</td>
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="disable{{$cate->id}}()" class="disable_categorie" value="{{$cate->id}}" id="disable{{$cate->id}}" type="checkbox">
										</label>
									</div>
								</td>
							@endif
							<script type="text/javascript">
								function enable1() {
								    document.getElementById("enable{{$cate->id}}").checked = true;
								    document.getElementById("disable{{$cate->id}}").checked = false;
								}

								function disable1() {
								    document.getElementById("disable{{$cate->id}}").checked = true;
								    document.getElementById("enable{{$cate->id}}").checked = false;
								}
							</script>
							
							<td class="text-center">
								<a onclick="return confirmDelete('Bạn có chắc muốn xóa danh mục này không')" href="{{ URL::route('deleteCategorie',$cate->id)}}" title="Xóa danh mục"><i class="ion-trash-a" style="width: 100%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
								<a href="{{ URL::route('editCategorie',[$cate->systems_id,$cate->id])}}" title="Sửa danh mục"><i class="ion-compose" style="width: 100%; font-size: 18px;"></i></a>
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
		$(document).on('click', '.enable_categorie', function(event) {
			var cate_id = $(this).attr('value');
			url = '/auth/admin/enable-categorie/'+cate_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					
				}
			});
		});
		$(document).on('click', '.disable_categorie', function(event) {
			var cate_id = $(this).attr('value');
			url = '/auth/admin/disable-categorie/'+cate_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					
				}
			});
		});
	</script>
@endsection()