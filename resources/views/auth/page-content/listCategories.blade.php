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
							<th width="8%">Hình ảnh</th>
							<th>Tên danh mục</th>
							<th>Url</th>
							<th class="text-center">Xuất bản</th>
							<th class="text-center">Nổi bật</th>
							<th>Ngày tạo</th>
							<th>Chỉnh sửa</th>
							<th class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addCategorie')}}" title="Thêm danh mục" style="color: green;"><i class="ion-android-add" style=" font-size:30px;color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach($category as $cate)
						<tr>
							<td><img src="{{asset('/uploads/images/categories/avatar/'.$cate["avatar"])}}"  width="100%" /></td>
							<td>
								@if(Auth::user()->systems_id == 1)
								<a href="{{URL::route('addTagCategorie',$cate->id)}}">{{$cate->name}}</a>
								@else
								{{$cate->name}}
								@endif
							</td>
							<td>{{$cate->url}}</td>
							<td>
								@if($cate->display == 0)
									<a style="opacity: 0.2;" href="#" categorie-id="{{$cate->id}}" class="categorie-display-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
									</a>
									<a style="pointer-events: none;" href="#" categorie-id="{{$cate->id}}" class="categorie-display-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
									</a>
								@else
									<a style="pointer-events: none;" href="#" categorie-id="{{$cate->id}}" class="categorie-display-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
									</a>
									<a style="opacity: 0.2;" href="#" categorie-id="{{$cate->id}}" class="categorie-display-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
									</a>
								@endif
							</td>
							<td>
								@if($cate->highlights == 0)
									<a style="opacity: 0.2;" href="#" categorie-id="{{$cate->id}}" class="categorie-highlight-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Nổi bật</span>
									</a>
									<a style="pointer-events: none;" href="#" categorie-id="{{$cate->id}}" class="categorie-highlight-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không nổi bật</span>
									</a>
								@else
									<a style="pointer-events: none;" href="#" categorie-id="{{$cate->id}}" class="categorie-highlight-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Nổi bật</span>
									</a>
									<a style="opacity: 0.2;" href="#" categorie-id="{{$cate->id}}" class="categorie-highlight-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không nổi bật</span>
									</a>
								@endif
							</td>
							<td>{{$cate->created_at}}</td>
							<td>{{$cate->updated_at}}</td>
							
							<td class="text-center">
								<a style="pointer-events: none;" onclick="return confirmDelete('Bạn có chắc muốn xóa danh mục này không')" href="{{ URL::route('deleteCategorie',$cate->id)}}" title="Xóa danh mục"><i class="ion-trash-a" style="width: 100%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
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
		$(document).on('click', '.categorie-display-none', function(event) {
			event.preventDefault();
			var categorie_id = $(this).attr('categorie-id');
			url = '/auth/admin/categorie-display-none/'+categorie_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".categorie-display-none[categorie-id="+categorie_id+"]").css('opacity',1);
			$(".categorie-display-block[categorie-id="+categorie_id+"]").css('opacity',0.2);
			$(".categorie-display-none[categorie-id="+categorie_id+"]").css('pointer-events','none');
			$(".categorie-display-block[categorie-id="+categorie_id+"]").css('pointer-events','');
		});
		$(document).on('click', '.categorie-display-block', function(event) {
			event.preventDefault();
			var categorie_id = $(this).attr('categorie-id');
			url = '/auth/admin/categorie-display-block/'+categorie_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".categorie-display-none[categorie-id="+categorie_id+"]").css('opacity',0.2);
			$(".categorie-display-block[categorie-id="+categorie_id+"]").css('opacity',1);
			$(".categorie-display-none[categorie-id="+categorie_id+"]").css('pointer-events','');
			$(".categorie-display-block[categorie-id="+categorie_id+"]").css('pointer-events','none');
		});
		$(document).on('click', '.categorie-highlight-none', function(event) {
			event.preventDefault();
			var categorie_id = $(this).attr('categorie-id');
			url = '/auth/admin/categorie-highlight-none/'+categorie_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".categorie-highlight-none[categorie-id="+categorie_id+"]").css('opacity',1);
			$(".categorie-highlight-block[categorie-id="+categorie_id+"]").css('opacity',0.2);
			$(".categorie-highlight-none[categorie-id="+categorie_id+"]").css('pointer-events','none');
			$(".categorie-highlight-block[categorie-id="+categorie_id+"]").css('pointer-events','');
		});
		$(document).on('click', '.categorie-highlight-block', function(event) {
			event.preventDefault();
			var categorie_id = $(this).attr('categorie-id');
			url = '/auth/admin/categorie-highlight-block/'+categorie_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".categorie-highlight-none[categorie-id="+categorie_id+"]").css('opacity',0.2);
			$(".categorie-highlight-block[categorie-id="+categorie_id+"]").css('opacity',1);
			$(".categorie-highlight-none[categorie-id="+categorie_id+"]").css('pointer-events','');
			$(".categorie-highlight-block[categorie-id="+categorie_id+"]").css('pointer-events','none');
		});
	</script>
@endsection()