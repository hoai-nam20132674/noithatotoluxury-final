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
			<h4>Đơn hàng</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Danh sách sản đơn hàng</li>
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
							<th>Mã đơn hàng</th>
							<th>Họ tên</th>
							<th>số điện thoại</th>
							<th>email</th>
							<th>địa chỉ</th>
							<th>lời nhắn</th>
							<th>Trạng thái</th>
							<th width="10%">thời gian</th>

							<th class="text-center" style="padding: 0px; background: green;">
								<a href="{{URL::route('addProduct')}}" title="Thêm sản phẩm" style="color: green;"><i class="ion-android-add" style=" font-size:30px; color:#fff;"></i></a>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
							
							<tr>
								<td><a href="{{URL::route('listOrderDetail',$order->id)}}">CREEAUTO{{$order->id}}</a></td>

								<td>{{$order->name}}</td>
								<td>{{$order->phone}}</td>
								<td>{{$order->email}}</td>
								<td>{{$order->address}}</td>
								<td>{{$order->messages}}</td>
								@if($order->status ==0)
									<td >
										<select style="background: #a00303; color: #fff" order-id="{{$order->id}}" onchange="updateOrder({{$order->id}})" class="form-control order_status">
											<option value="0">Chưa xử lý</option>
											<option value="1">Đã xử lý</option>
										</select>
									</td>
								@else
									<td>
										<select style="background: #008000; color: #fff" order-id="{{$order->id}}" onchange="updateOrder({{$order->id}})" class="form-control order_status">
											<option value="1">Đã xử lý</option>
											<option value="0">Chưa xử lý</option>
										</select>
									</td>
								@endif
								<td>{{$order->created_at->format('d-m-Y')}}</td>
								
								
								
								
								<td class="text-center">
									<a style="pointer-events: none;" onclick="return confirmDelete('Bạn có chắc muốn xóa đơn hàng này không')" href="" title="Xóa đơn hàng"><i class="fa fa-trash-o" style="width: 20%; font-size: 18px; color: red; margin-right: 5px;"></i></a>
									<a href="" title="Sửa đơn hàng"><i class="fa fa-pencil-square-o" style="width: 20%; font-size: 18px;"></i></a>
									<a href="{{ URL::route('historyEditOrder',$order->id)}}" title="Lịch sử chỉnh sửa đơn hàng"><i class="fa fa-history" style="width: 20%; font-size: 18px;"></i></a>
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
		function updateOrder(id){
			var select = $(".order_status[order-id="+id+"]");
			var value = select.val();
			url = '/auth/admin/update-order/'+id+'-'+value;
			$.ajax({
				type: 'GET',
				url: url,
				dataType: 'html',
				success: function(data) {
					
					if(value==0){
						select.css('background','#a00303');
					}
					else{
						select.css('background','#008000');
					}
					console.log(data);
					// old.show();
				}
			});
		}
	</script>

	
@endsection()