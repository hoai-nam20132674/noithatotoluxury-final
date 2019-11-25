@extends('front-end.layout.default')
@section('css-js-header')
	<link href="{{asset('css/bpr.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/productReviews.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
	@include('front-end.layout.categorie-list')
	@include('front-end.layout.breadcrumb')
	<section class="signup page_customer_account">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
					<div id="parent" class="row">
						<div id="a" class="col-xs-12 col-sm-12 col-lg-9 col-left-account">
							@if( Session::has('flash_message'))
				                <div class="alert alert-{{ Session::get('flash_level')}}">
				                    {{ Session::get('flash_message')}}
				                </div>
				            @endif
							<div class="page-title m992">
								<h1 class="title-head margin-top-0"><a href="#">Thông tin tài khoản</a></h1>
							</div>
							<div class="form-signup name-account m992"> 
								<p><strong>Xin chào, <a style="color:#fe3232;">{{Auth::guard('users_client')->user()->name}}</a>&nbsp;!</strong></p>
							</div>
							<div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
								<div class="my-account">
									<div class="dashboard">
										
										<div class="recent-orders">
											<div class="table-responsive tab-all" style="overflow-x:auto;">
												<table class="table table-cart" id="my-orders-table">
													<thead class="thead-default">
														<tr>
															<th>Đơn hàng</th>
															<th>Ngày</th>

															<th>Địa chỉ</th>
															<th>Giá trị đơn hàng</th>
															<th>Tình trạng thanh toán</th>													
															<th>Trạng thái</th>
														</tr>
													</thead>
													@php
														$orders = App\Orders::where('email',Auth::guard('users_client')->user()->email)->get();

													@endphp
													@foreach($orders as $order)
														@php
															$orders_detail = App\OrdersDetail::where('orders_id',$order->id)->get();
															$price=0;
															foreach($orders_detail as $od){
																$product = App\ProductsDetail::where('id',$od->products_detail_id)->get()->first();
																$price = $price + $od->amount * $product->price;

															}
														@endphp
														<tbody>
														
														
															<tr class="first odd">
																<td><a href="{{URL::route('order',$order->id)}}">#20132674{{$order->id}}</a></td>
																<td>{{$order->created_at->format('d-m-Y')}}</td>
																<td>{{$order->address}}</td>

																<td><span class="price">{!!number_format($price)!!} ₫</span></td>
																<td><em>Chưa thanh toán</em></td>
																<td>Bình thường</td>
															</tr>
															
															
														</tbody>
													@endforeach

												</table>

											</div>

											<div class="text-xs-right">

											</div>
										</div>
										<div class="paginate-pages pull-right page-account">
											<nav class="clearfix">
											  <ul class="pagination clearfix f-right">
											     
											  <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
											  

											  
											  
											  
											  <li class="active page-item disabled"><a class="page-link" href="#">1</a></li>
											  
											  
											  

											  
											  <li class="page-item disabled"><a class="page-link" href="#">»</a></li>
											  
											</ul>
											</nav>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
							<div class="page-title mx991">
								<h1 class="title-head"><a href="#">Thông tin tài khoản</a></h1>
							</div>
							<div class="form-signup body_right mx991"> 
								<p><strong>Xin chào, <a href="/account/addresses" style="color:#fe3232;">{{Auth::guard('users_client')->user()->name}}</a>&nbsp;!</strong></p>
							</div>
							<div class="block-account">
								<div class="block-title-account"><h5>Tài khoản của tôi</h5></div>
								<div class="block-content form-signup">
									
									<p><i class="fa fa-user font-some" aria-hidden="true"></i> <span> Tên tài khoản: {{Auth::guard('users_client')->user()->name}}</span></p>
									<p><i class="fa fa-envelope font-some" aria-hidden="true"></i>  <span>Email: {{Auth::guard('users_client')->user()->email}}</span></p>
									<p><i class="fa fa-phone-square font-some" aria-hidden="true"></i> <span>Điện thoại: {{Auth::guard('users_client')->user()->phone}}</span> </p>
									
									<p><i class="fa fa-plane font-some" aria-hidden="true"></i> <span> Quốc gia :Việt Nam</span></p> 
									
									<p style="margin-top:20px;"><a href="/account/addresses" class="btn btn-full btn-primary">Sổ địa chỉ (1)</a></p>
									
									
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
