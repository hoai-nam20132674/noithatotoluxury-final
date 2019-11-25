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
			<h4>Danh sách gian hàng</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Danh sách gian hàng</li>
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
							<th>STT</th>
							<th>Tên gian hàng</th>
							<th class="text-center">Nổi bật</th>
							<th class="text-center">Không nổi bật</th>
							<th class="text-center">Hiển thị</th>
							<th class="text-center">Không hiển thị</th>
							<th class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addSystem')}}" title="Thêm tin tức" style="color: green;"><i class="ion-android-add" style=" font-size:30px; color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@php
							$i=1;
						@endphp
						@foreach ($systems as $system)
						<tr>
							<td>{{$i++}}</td>
							<td><a href="{{url('/'.$system["website"])}}" target="_blank">{{$system -> name}}</a></td>
							@if($system->highlights ==0)
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="highlights{{$system->id}}()" class="highlights" value="{{$system->id}}" id="highlights{{$system->id}}" type="checkbox">
										</label>
									</div>
								</td>
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="unhighlights{{$system->id}}()" class="unhighlights" value="{{$system->id}}" id="unhighlights{{$system->id}}" type="checkbox" checked>
										</label>
									</div>
								</td>
							@else
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="highlights{{$system->id}}()" class="highlights" value="{{$system->id}}" id="highlights{{$system->id}}" type="checkbox" checked>
										</label>
									</div>
								</td>
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="unhighlights{{$system->id}}()" class="unhighlights" value="{{$system->id}}" id="unhighlights{{$system->id}}" type="checkbox">
										</label>
									</div>
								</td>
							@endif
							@if($system->display ==0)
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="enable{{$system->id}}()" class="enable_system" value="{{$system->id}}" id="enable{{$system->id}}" type="checkbox">
										</label>
									</div>
								</td>
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="disable{{$system->id}}()" class="disable_system" value="{{$system->id}}" id="disable{{$system->id}}" type="checkbox" checked>
										</label>
									</div>
								</td>
							@else
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="enable{{$system->id}}()" class="enable_system" value="{{$system->id}}" id="enable{{$system->id}}" type="checkbox" checked>
										</label>
									</div>
								</td>
								<td class="text-center">
									<div class="checkbox">
										<label>
											<input onclick="disable{{$system->id}}()" class="disable_system" value="{{$system->id}}" id="disable{{$system->id}}" type="checkbox">
										</label>
									</div>
								</td>
							@endif
							<script type="text/javascript">
								function enable{{$system->id}}() {
								    document.getElementById("enable{{$system->id}}").checked = true;
								    document.getElementById("disable{{$system->id}}").checked = false;
								}

								function disable{{$system->id}}() {
								    document.getElementById("disable{{$system->id}}").checked = true;
								    document.getElementById("enable{{$system->id}}").checked = false;
								}
								function highlights{{$system->id}}() {
								    document.getElementById("highlights{{$system->id}}").checked = true;
								    document.getElementById("unhighlights{{$system->id}}").checked = false;
								}

								function unhighlights{{$system->id}}() {
								    document.getElementById("highlights{{$system->id}}").checked = true;
								    document.getElementById("unhighlights{{$system->id}}").checked = false;
								}
							</script>
							<td class="text-center">
								<a onclick="return confirmDelete('Bạn có chắc muốn xóa gian hàng này không')" href="{{ URL::route('deleteSystem',$system->id)}}" title="Xóa danh mục"><i class="ion-trash-a" style="width: 100%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
								
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
	<script type="text/javascript" src="{{asset('auth/js/display_blog.js')}}"></script>
	<script type="text/javascript">
		$(document).on('click', '.highlights', function(event) {
			var system_id = $(this).attr('value');
			url = '/auth/admin/system-highlights/'+system_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					
				}
			});
		});
		$(document).on('click', '.unhighlights', function(event) {
			var system_id = $(this).attr('value');
			url = '/auth/admin/system-unhighlights/'+system_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
				}
				
			});			

		});
		$(document).on('click', '.enable_system', function(event) {
			var system_id = $(this).attr('value');
			url = '/auth/admin/system-enable/'+system_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
				}
				
			});			

		});
		$(document).on('click', '.disable_system', function(event) {
			var system_id = $(this).attr('value');
			url = '/auth/admin/system-disable/'+system_id;
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