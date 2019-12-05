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
			<h4>Sản phẩm chi tiết</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Danh sách sản phẩm chi tiết</li>
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
							
							<th>Tên sản phẩm</th>
							
							<th width="18%" class="text-center">Giá</th>
							
							<th width="18%" class="text-center">Sale</th>
							<th width="18%" class="text-center">Số lượng</th>
							<th>Ngày tạo</th>
							<th>Chỉnh sửa</th>
							<th width="10%" class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addProduct')}}" title="Thêm sản phẩm" style="color: green;"><i class="ion-android-add" style=" font-size:30px; color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach($products_detail as $pr)
							@php
		                        $products_properties = App\ProductsProperties::where('products_detail_id',$pr->id)->get();
		                        $properties_id = App\Http\Controllers\AuthClient\ClientController::arrayColumn($products_properties,$col='properties_id');
		                        $properties = App\Properties::join('properties_type','properties.properties_type_id','=','properties_type.id')->whereIn('properties.id',$properties_id)->select('properties.*','properties_type.name')->get();
		                        
		                    @endphp
							<tr>

								<td>{{$products->name}} </td>
								
								<td>
									<input style="width: 50%;" product-detail-id="{{$pr->id}}" type="number" min="0" value="{{$pr->price}}" name="price">
									<a href="#" product-detail-id="{{$pr->id}}" class="update-product-detail-price">
										<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-refresh" style="padding-right: 5px;"></i>Cập nhật</span>
									</a>
									<a class="ajaxload" name="price" product-detail-id="{{$pr->id}}" style="width: 20px;">
										<span style="background-image: url(https://data.vietnambooking.com/common/gif/icon_img_default.gif);background-size: cover ; padding: 5px 14px;border-radius: 2px; color: #fff; font-weight: 800;"></span>
									</a>
								</td>
								<td>
									<input style="width: 50%;" product-detail-id="{{$pr->id}}" type="number" min="0" value="{{$pr->sale}}" name="sale">
									<a href="#" product-detail-id="{{$pr->id}}" class="update-product-detail-sale">
										<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-refresh" style="padding-right: 5px;"></i>Cập nhật</span>
									</a>
									<a class="ajaxload" name="sale" product-detail-id="{{$pr->id}}" style="width: 20px;">
										<span style="background-image: url(https://data.vietnambooking.com/common/gif/icon_img_default.gif);background-size: cover ; padding: 5px 14px;border-radius: 2px; color: #fff; font-weight: 800;"></span>
									</a>
								</td>
								<td>
									<input style="width: 50%;" product-detail-id="{{$pr->id}}" type="number" min="0" value="{{$pr->amount}}" name="amount">
									<a href="#" product-detail-id="{{$pr->id}}" class="update-product-detail-amount">
										<span style="background: #3ec9bc; padding: 5px;border-radius: 2px; color: #fff; font-weight: 800;"><i class="fa fa-refresh" style="padding-right: 5px;"></i>Cập nhật</span>
									</a>
									<a class="ajaxload" name="amount" product-detail-id="{{$pr->id}}" style="width: 20px;">
										<span style="background-image: url(https://data.vietnambooking.com/common/gif/icon_img_default.gif);background-size: cover ; padding: 5px 14px;border-radius: 2px; color: #fff; font-weight: 800;"></span>
									</a>
								</td>
								
								<td>{{$pr->created_at}}</td>
								<td>{{$pr->updated_at}}</td>
								<td class="text-center">
									<a style="pointer-events: none;" onclick="return confirmDelete('Bạn có chắc muốn xóa sản phẩm này không')" href="{{URL::route('deleteProductDetail',$pr->id)}}" title="Xóa sản phẩm"><i class="fa fa-trash-o" style="width: 20%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
									<a href="{{URL::route('editProductDetail',$pr->id)}}" title="Sửa danh mục"><i class="fa fa-pencil-square-o" style="width: 20%; font-size: 18px;"></i></a>
									<a href="{{ URL::route('historyEditProductDetail',$pr->id)}}" title="Lịch sử chỉnh sửa sản phẩm"><i class="fa fa-history" style="width: 20%; font-size: 18px;"></i></a>
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
		$(document).ready(function(){
			$(".ajaxload").hide();
		});
		$(document).on('click', '.update-product-detail-price', function(event) {
			event.preventDefault();
			var product_detail_id = $(this).attr('product-detail-id');
			var old = $(this).hide();
			var load = $(this).parent().children('.ajaxload').show();
			var select = $(this).parent().children('input');
			var value = select.val();
			url = '/auth/admin/update-product-detail-price/'+product_detail_id+'-'+value;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
					load.hide();
					old.show();
				}
			});
		});
		$(document).on('click', '.update-product-detail-sale', function(event) {
			event.preventDefault();
			var product_detail_id = $(this).attr('product-detail-id');
			var old = $(this).hide();
			var load = $(this).parent().children('.ajaxload').show();
			var select = $(this).parent().children('input');
			var value = select.val();
			url = '/auth/admin/update-product-detail-sale/'+product_detail_id+'-'+value;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
					load.hide();
					old.show();
				}
			});
		});
		$(document).on('click', '.update-product-detail-amount', function(event) {
			event.preventDefault();
			var product_detail_id = $(this).attr('product-detail-id');
			var old = $(this).hide();
			var load = $(this).parent().children('.ajaxload').show();
			var select = $(this).parent().children('input');
			var value = select.val();
			url = '/auth/admin/update-product-detail-amount/'+product_detail_id+'-'+value;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					console.log(data);
					load.hide();
					old.show();
				}
			});
		});
	</script>
	
@endsection()