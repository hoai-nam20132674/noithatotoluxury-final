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
			<h4>Danh sách tin tức</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Danh sách tin tức</li>
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
							<th>Tiêu đề</th>
							<th>Link bài tin tức</th>
							<th class="text-center">Xuất bản</th>
							<th>Ngày tạo</th>
							<th>Chỉnh sửa</th>
							<th class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addBlog')}}" title="Thêm tin tức" style="color: green;"><i class="ion-android-add" style=" font-size:30px; color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach ($blogs as $blog)
						<tr>
							<td><img src="{{asset('/uploads/images/blogs/'.$blog["image"])}}"  width="100%" /></td>
							<td>{{$blog -> title}}</td>
							<td><a href="{{url('/'.$blog["url"])}}" target="_blank">{{$blog -> url}}</a></td>
							<td>
								@if($blog->display == 0)
									<a style="opacity: 0.2;" href="#" blog-id="{{$blog->id}}" class="blog-display-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
									</a>
									<a style="pointer-events: none;" href="#" blog-id="{{$blog->id}}" class="blog-display-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
									</a>
								@else
									<a style="pointer-events: none;" href="#" blog-id="{{$blog->id}}" class="blog-display-block">
										<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
									</a>
									<a style="opacity: 0.2;" href="#" blog-id="{{$blog->id}}" class="blog-display-none">
										<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
									</a>
								@endif
							</td>
							<td>{{$blog->created_at}}</td>
							<td>{{$blog->updated_at}}</td>
							<script type="text/javascript">
								function enable{{$blog->id}}() {
								    document.getElementById("enable{{$blog->id}}").checked = true;
								    document.getElementById("disable{{$blog->id}}").checked = false;
								}

								function disable{{$blog->id}}() {
								    document.getElementById("disable{{$blog->id}}").checked = true;
								    document.getElementById("enable{{$blog->id}}").checked = false;
								}
							</script>
							<td class="text-center">
								<a onclick="return confirmDelete('Bạn có chắc muốn xóa tin tức này không')" href="{{ URL::route('deleteBlog',$blog->id)}}" title="Xóa danh mục"><i class="ion-trash-a" style="width: 100%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
								<a href="{{ URL::route('editBlog',$blog->id)}}" title="Sửa danh mục"><i class="ion-compose" style="width: 100%; font-size: 18px;"></i></a>
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
		$(document).on('click', '.blog-display-none', function(event) {
			event.preventDefault();
			var blog_id = $(this).attr('blog-id');
			url = '/auth/admin/blog-display-none/'+blog_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".blog-display-none[blog-id="+blog_id+"]").css('opacity',1);
			$(".blog-display-block[blog-id="+blog_id+"]").css('opacity',0.2);
			$(".blog-display-none[blog-id="+blog_id+"]").css('pointer-events','none');
			$(".blog-display-block[blog-id="+blog_id+"]").css('pointer-events','');
		});
		$(document).on('click', '.blog-display-block', function(event) {
			event.preventDefault();
			var blog_id = $(this).attr('blog-id');
			url = '/auth/admin/blog-display-block/'+blog_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".blog-display-none[blog-id="+blog_id+"]").css('opacity',0.2);
			$(".blog-display-block[blog-id="+blog_id+"]").css('opacity',1);
			$(".blog-display-none[blog-id="+blog_id+"]").css('pointer-events','');
			$(".blog-display-block[blog-id="+blog_id+"]").css('pointer-events','none');
		});
	</script>
@endsection()