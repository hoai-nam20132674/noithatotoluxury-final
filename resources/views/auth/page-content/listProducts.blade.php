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
			<h4>Sản phẩm</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
							<th width="20%">Tên sản phẩm</th>
							<th>Xuất bản</th>
							<th>Nổi bật</th>
							<th width="10%">Ngày tạo</th>
							<th width="10%">Chỉnh sửa</th>
							<th width="10%" class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addProduct')}}" title="Thêm sản phẩm" style="color: green;"><i class="ion-android-add" style=" font-size:30px; color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach($products as $pr)
							<tr>
								
								<td ><a href="{{URL::route('listProductsDetail',$pr->id)}}"><img src="{{asset('/uploads/images/products/avatar/'.$pr["avatar"])}}"  width="100%" /></a></td>
										
								<td><a href="/{{$pr->url}}" target="_blank">{{$pr->name}}</a></td>
								
								<td>
									@if($pr->display == 0)
										<a style="opacity: 0.2;" href="#" product-id="{{$pr->id}}" class="product-display-block">
											<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
										</a>
										<a style="pointer-events: none;" href="#" product-id="{{$pr->id}}" class="product-display-none">
											<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
										</a>
									@else
										<a style="pointer-events: none;" href="#" product-id="{{$pr->id}}" class="product-display-block">
											<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Xuất bản</span>
										</a>
										<a style="opacity: 0.2;" href="#" product-id="{{$pr->id}}" class="product-display-none">
											<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không xuất bản</span>
										</a>
									@endif
								</td>
								<td>
									@if($pr->highlights == 0)
										<a style="opacity: 0.2;" href="#" product-id="{{$pr->id}}" class="product-highlight-block">
											<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Nổi bật</span>
										</a>
										<a style="pointer-events: none;" href="#" product-id="{{$pr->id}}" class="product-highlight-none">
											<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không nổi bật</span>
										</a>
									@else
										<a style="pointer-events: none;" href="#" product-id="{{$pr->id}}" class="product-highlight-block">
											<span style="background: #008000; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-check-square" style="padding-right: 5px;"></i>Nổi bật</span>
										</a>
										<a style="opacity: 0.2;" href="#" product-id="{{$pr->id}}" class="product-highlight-none">
											<span style="background: red; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-times-circle" style="padding-right: 5px;"></i>Không nổi bật</span>
										</a>
									@endif
								</td>
								<td>{{$pr->created_at}}</td>
								<td>{{$pr->updated_at}}</td>
								
								<td class="text-center">
									<a style="pointer-events: none;" onclick="return confirmDelete('Bạn có chắc muốn xóa sản phẩm này không')" href="{{URL::route('deleteProduct',$pr->id)}}" title="Xóa sản phẩm"><i class="fa fa-trash-o" style="width: 20%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
									<a href="{{URL::route('editProduct',$pr->id)}}" title="Sửa sản phẩm"><i class="fa fa-pencil-square-o" style="width: 20%; font-size: 18px;"></i></a>
									<a href="{{ URL::route('historyEditProduct',$pr->id)}}" title="Lịch sử chỉnh sửa sản phẩm"><i class="fa fa-history" style="width: 20%; font-size: 18px;"></i></a>
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
	<script type="text/javascript" src="{{asset('auth/js/display_product.js')}}"></script>
	<script type="text/javascript">
		$(document).on('click', '.product-display-none', function(event) {
			event.preventDefault();
			var product_id = $(this).attr('product-id');
			url = '/auth/admin/product-display-none/'+product_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".product-display-none[product-id="+product_id+"]").css('opacity',1);
			$(".product-display-block[product-id="+product_id+"]").css('opacity',0.2);
			$(".product-display-none[product-id="+product_id+"]").css('pointer-events','none');
			$(".product-display-block[product-id="+product_id+"]").css('pointer-events','');
		});
		$(document).on('click', '.product-display-block', function(event) {
			event.preventDefault();
			var product_id = $(this).attr('product-id');
			url = '/auth/admin/product-display-block/'+product_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".product-display-none[product-id="+product_id+"]").css('opacity',0.2);
			$(".product-display-block[product-id="+product_id+"]").css('opacity',1);
			$(".product-display-none[product-id="+product_id+"]").css('pointer-events','');
			$(".product-display-block[product-id="+product_id+"]").css('pointer-events','none');
		});
		$(document).on('click', '.product-highlight-none', function(event) {
			event.preventDefault();
			var product_id = $(this).attr('product-id');
			url = '/auth/admin/product-highlight-none/'+product_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".product-highlight-none[product-id="+product_id+"]").css('opacity',1);
			$(".product-highlight-block[product-id="+product_id+"]").css('opacity',0.2);
			$(".product-highlight-none[product-id="+product_id+"]").css('pointer-events','none');
			$(".product-highlight-block[product-id="+product_id+"]").css('pointer-events','');
		});
		$(document).on('click', '.product-highlight-block', function(event) {
			event.preventDefault();
			var product_id = $(this).attr('product-id');
			url = '/auth/admin/product-highlight-block/'+product_id;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
				}
			});
			$(".product-highlight-none[product-id="+product_id+"]").css('opacity',0.2);
			$(".product-highlight-block[product-id="+product_id+"]").css('opacity',1);
			$(".product-highlight-none[product-id="+product_id+"]").css('pointer-events','');
			$(".product-highlight-block[product-id="+product_id+"]").css('pointer-events','none');
		});
	</script>
	
@endsection()