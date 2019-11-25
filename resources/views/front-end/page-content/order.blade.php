@extends('front-end.layout.default')
@section('css-js-header')
	<link href="{{asset('css/bpr.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/productReviews.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
	@include('front-end.layout.categorie-list')
	@include('front-end.layout.breadcrumb')
	<section class="login page_order_account">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 top_order_title">
					<h1 class="title-headding order-headding">Thông tin đơn hàng</h1>				
					<span class="note order_date"><i>Ngày đặt hàng: {{$order->created_at->format('d-m-Y')}}</i>
						<a href="{{URL::route('account',Auth::guard('users_client')->user()->id)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Quay lại trang tài khoản</a>
					</span>
					<p>
						<span class="note">Trạng thái: </span> 
						<i i="" class="status_pending">
							@if($order->status)
								Đã giao hàng
							@else
								Chưa giao hàng
							@endif
						</i>
					</p>
					
				</div>
				
				

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="table-responsive-block margin-top-20 table-responsive">
						<table id="order_details" class="table table-cart">
							<thead class="thead-default">
								<tr>
									<th style="border-bottom: none;">Sản phẩm</th>
									<th style="border-bottom: none;">Thông tin</th>
									<th style="border-bottom: none;">Đơn giá</th>
									<th style="border-bottom: none;">Số lượng</th>
									<th style="border-bottom: none;">Tổng</th>
								</tr>
							</thead>
							<tbody>
								@php
									$subTotal = 0;
								@endphp
								@foreach($order_details as $order_detail)
									@php
										$totalPrice = $order_detail->amountOrder*$order_detail->price;
										$subTotal = $subTotal + $totalPrice;
										$products_properties = App\ProductsProperties::where('products_detail_id',$order_detail->products_detail_id)->get();
				                        $properties_id = App\Http\Controllers\AuthClient\ClientController::arrayColumn($products_properties,$col='properties_id');
				                        $properties = App\Properties::join('properties_type','properties.properties_type_id','=','properties_type.id')->whereIn('properties.id',$properties_id)->select('properties.*','properties_type.name')->get();
									@endphp
									<tr>
										<td data-title="Tên sản phẩm">
											<a href="/{{$order_detail->url}}" target="_blank">{{$order_detail->name}}</a>								
										</td>
										<td data-title="Mã SKU">@foreach($properties as $pp) {{$pp->name}} {{$pp->value}},@endforeach</td>
										<td data-title="Đơn giá" class="numeric">{!!number_format($order_detail->price)!!} đ</td>
										<td data-title="Số lượng" class="numeric">{{$order_detail->amountOrder}}</td>
										<td data-title="Tổng" class="numeric">{!!number_format($totalPrice)!!} đ</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>	
				<div class="col-xs-12 oder_total_monney">				
					<table class="table  totalorders">					
						<tfoot>						
							
							<tr class="order_summary note" style="color:red;">
								<td class="fix-width-200" colspan="">Phí vận chuyển:</td>
								<td class="total money right">Giao hàng tận nơi - <strong style="color:#fe3232">00.000₫</strong></td>
							</tr>
							
							<tr class="order_summary order_total">
								<td class="fix-width-200">Tổng tiền:</td>								
								<td class="right"><strong>{!!number_format($subTotal)!!} ₫ </strong></td>
							</tr>   
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection