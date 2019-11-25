<div class="header">  
  <div class="header-bar">
    <!-- <div class="fix-height-img hidden-xs">
      <a href="#">
        <img src="{{asset('uploads/images/systems/topbar.png')}}" alt="Zomart">
      </a>
    </div> -->
    <div class="header-bar-inner">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-2 hidden-sm">          
            <ul class="list-inline message hidden-sm hidden-xs">
              <li>
                <p><i class="fa mobile fa-phone"></i>Bán hàng trực tuyến: <a href="callto:{{$system->phone}}">{{$system->phone}}</a></p>
              </li>
            </ul>
          </div>
          @if(Auth::guard('users_client')->user())
            <div class="col-md-6 col-sm-6 d-list col-xs-10  a-right hidden-sm hidden-xs">
              <span><a href="/">Thông tin khuyến mãi</a></span>
              <span><a href="/">Tra cứu đơn hàng</a></span>
              <span><a href="javascript:;" data-customer-id="0" class="iWishView">
                Yêu thích
                </a>
              </span>
            </div>
          @else
            <div class="col-md-6 col-sm-12 d-list col-xs-12 a-right a-center hidden-md hidden-lg">
              <span><a href="/account/register">Đăng ký</a></span>
              <span><a href="/account/login">Đăng nhập</a></span>
            </div>
          @endif
        </div>
      </div>    
    </div>
  </div>
  <div class="container">
    @if( count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if( Session::has('flash_message'))
        <div class="alert alert-{{ Session::get('flash_level')}}">
            {{ Session::get('flash_message')}}
        </div>
    @endif
  </div>
  <header class="site-header ">
    <div class="container">
      <div class="site-header-inner">
        <div class="menu-bar hidden-md hidden-lg">
          <i class="fa fa-align-justify"></i>
        </div>
        <div class="header-left">
          <div class="logo">
            <a href="{{'/'.$system->website}}" class="logo-wrapper ">          
              <img src="{{asset('uploads/images/systems/logo/'.$system->logo)}}" alt="logo ">          
            </a>
          </div>
        </div>
        <div class="header-left margin-left-50 hidden-xs hidden-sm">
          <div class="header_search">
            <form class="input-group search-bar search-action" action="/search" method="GET" role="search">
              <input type="hidden" name="_token" value="{{ csrf_token()}}">
              <div class="collection-selector">
                <div class="search_text">Tất cả</div>
                <div id="search_info" class="list_search" style="display: none;">
                  @foreach($cates as $cate)
                    <div class="search_item" cate-name="{{$cate->name}}" cate-id="{{$cate->id}}" system-id="{{$cate->systems_id}}" system-url="{{$system->website}}">{{$cate->name}}</div>
                  @endforeach
                  <div class="liner_search"></div>
                  <div class="search_item active" cate-name="tất cả" cate-id="0" system-id="{{$system->id}}" system-url="{{$system->website}}">Tất cả</div>
                </div>
              </div>
              <input type="search" name="query" value="" placeholder="Tìm kiếm sản phẩm... " class="input-group-field st-default-search-input search-text" autocomplete="off">
              <span class="input-group-btn">
                <button class="btn icon-fallback-text" type="submit">
                  Tìm kiếm
                </button>
              </span>
            </form>
            <div class="header-tag hidden-sm hidden-xs">
              <b>Từ khóa phổ biến:</b> 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=máy tính bảng">máy tính bảng</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=iphone">iphone</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=đồ bỉm sữa">đồ bỉm sữa</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=khuyến mại">khuyến mại</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=nội thất">nội thất</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=thời trang">thời trang</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=mỹ phẩm">mỹ phẩm</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=đồ gia dụng">đồ gia dụng</a>, 
              <a href="/search:danh%20mục:0.tất%20cả.tìm%20kiếm=thực phẩm">thực phẩm</a>
            </div>
          </div> 
        </div>
        <div class="header-right">
          <div class="mini-cart text-xs-center">

            <div class="heading-cart header-acount text-xs-left margin-right-0">
              <a href="/cart" class="icon-cart">
                <img src="https://bizweb.dktcdn.net/100/266/879/themes/720483/assets/cart-icon.png?1558087405072" alt="Zomart" />
              </a>
              <div class="heading-cart text-xs-left">

                <p><a href="/cart">Giỏ hàng của bạn</a></p>
                @php
                  $totalQuantity = Cart::getTotalQuantity();
                  $content = Cart::getContent();
                @endphp
                <p><b>(<span class="cartCount" cart-count="{{$totalQuantity}}">{{$totalQuantity}}</span>) Sản phẩm</b></p>

              </div>

            </div>
            <div>
              <div style="" class="top-cart-content arrow_box hidden-lg-down">
                <ul id="cart-sidebar" class="mini-products-list count_li">
                  <ul class="list-item-cart">
                    @foreach($content as $item)
                      @php
                        $products_properties = App\ProductsProperties::where('products_detail_id',$item->id)->get();
                        $properties_id = App\Http\Controllers\AuthClient\ClientController::arrayColumn($products_properties,$col='properties_id');
                        $properties = App\Properties::join('properties_type','properties.properties_type_id','=','properties_type.id')->whereIn('properties.id',$properties_id)->select('properties.*','properties_type.name')->get();
                        
                      @endphp
                    <!-- không được sửa bất kỳ thuộc tính nào trong đoạn này -->
                    <li class="item product-cart" data-id="{{$item->id}}">
                      <div class="border_list">
                        <a class="product-image" href="{{$item->attributes->url}}" title="Iphone 7 Red">
                          <img alt="{{$item->name}}" src="{{asset('uploads/images/products/avatar/'.$item->attributes->img)}}" width="100">
                        </a>
                        <div class="detail-item">
                          <div class="product-details">
                            <p class="product-name"> <a href="{{$item->attributes->url}}" title="{{$item->name}}">{{$item->name}} @foreach($properties as $pp) {{$pp->name}} {{$pp->value}},@endforeach</a></p>
                          </div>
                          <div class="product-details-bottom">
                            <span class="price pricechange">Giá: {!!number_format($item->price)!!} đ</span>
                            <a data-id="{{$item->id}}" title="Xóa" class="remove-item-cart fa fa-trash-o" price="{{$item->price*$item->quantity}}">&nbsp;</a>
                            <div class="quantity-select qty_drop_cart">
                              <p data-id="{{$item->id}}" value="{{$item->quantity}}">Số Lượng: {{$item->quantity}}</p>

                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <!-- end -->
                    @endforeach
                  </ul>
                  <div class="pd">
                    <div class="top-subtotal">Tổng cộng: <span class="price totalPrice" price="{{Cart::getTotal()}}">{!!number_format(Cart::getTotal())!!} đ</span></div>
                  </div>
                  <div class="pd right_ct">
                    <a href="/cart" class="btn btn-primary"><span>Giỏ hàng</span></a>
                  </div>
                </ul>

              </div>
            </div>
          </div>
          @if(Auth::guard('users_client')->check())
            <div class="header-acount hidden-sm hidden-xs">
              <a href="{{URL::route('account',Auth::guard('users_client')->user()->id)}}" class="icon-cart">
                <img src="//bizweb.dktcdn.net/100/266/879/themes/720483/assets/user-icon.png?1558087405072" alt="Zomart">

              </a>
              <div class="heading-cart text-xs-left">
                
                <p><a href="{{URL::route('account',Auth::guard('users_client')->user()->id)}}">Tài khoản</a> - <a href="{{URL::route('clientLogout')}}">Đăng xuất</a></p>
                <a href="{{URL::route('account',Auth::guard('users_client')->user()->id)}}">{{Auth::guard('users_client')->user()->name}}</a>
                
              </div>


            </div>

          @else
          <div class="header-acount hidden-sm hidden-xs">
            <a href="/account" class="icon-cart">
              <img src="https://bizweb.dktcdn.net/100/266/879/themes/720483/assets/user-icon.png?1558087405072" alt="Zomart" />

            </a>
            <div class="heading-cart text-xs-left">
              
              
              <p><a href="/account/login" data-toggle="modal" data-target="#dangnhap">Đăng nhập</a> & <a href="/account/register" data-toggle="modal" data-target="#dangky">Đăng ký</a></p>


              
              <a href="/account/login" data-toggle="modal" data-target="#dangnhap">Tài khoản</a>
              
            </div>


          </div>
          
          @endif
        </div>


      </div>
      <div class="header_search hidden-lg hidden-md">
        <form class="input-group search-bar" action="/search" method="get" role="search">         
          <input type="search" name="query" value="" placeholder="Tìm kiếm... " class="input-group-field st-default-search-input search-text" autocomplete="off">
          <span class="input-group-btn">
            <button class="btn icon-fallback-text">
              Tìm kiếm
            </button>
          </span>
        </form>
        <div class="header-tag hidden-sm hidden-xs">
          <b>Từ khóa phổ biến:</b> 
          
          
          <a href="/search?q=m%C3%A1y%20t%C3%ADnh%20b%E1%BA%A3ng">máy tính bảng</a>, 
          
          <a href="/search?q=iphone">iphone</a>, 
          
          <a href="/search?q=%C4%91%E1%BB%93%20b%E1%BB%89m%20s%E1%BB%AFa">đồ bỉm sữa</a>, 
          
          <a href="/search?q=khuy%E1%BA%BFn%20m%E1%BA%A1i">khuyến mại</a>, 
          
          <a href="/search?q=n%E1%BB%99i%20th%E1%BA%A5t">nội thất</a>, 
          
          <a href="/search?q=th%E1%BB%9Di%20trang">thời trang</a>, 
          
          <a href="/search?q=m%E1%BB%B9%20ph%E1%BA%A9m">mỹ phẩm</a>, 
          
          <a href="/search?q=%C4%91%E1%BB%93%20gia%20d%E1%BB%A5ng">đồ gia dụng</a>, 
          
          <a href="/search?q=th%E1%BB%B1c%20ph%E1%BA%A9m">thực phẩm</a>
          
        </div>
      </div>
    </div>
    <div class="bot-header hidden-xs hidden-sm">
      <div class="container">
        <div class="bot-header-left f-left khodattenqua">
          <a href="javascript:;">Danh mục sản phẩm</a>
        </div>
        <div class="bot-header-center f-left">
          <ul class="bot-header-menu">
                        
            
            <li class="nav-item active"><a class="nav-link" href="/">Trang chủ</a></li>

            
                        
            
            <li class="nav-item ">
              <a href="#" class="nav-link">Giới thiệu<i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
              

            </li>

            
                        
            
            <li class="nav-item ">
              <a href="/collections/all" class="nav-link">Sản phẩm <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
              <!-- <ul class="dropdown-menu">
                <li class="dropdown-submenu nav-item-lv2">
                  <a class="nav-link" href="/thoi-trang-nam">Thời trang <i class="fa fa-angle-right"></i></a>

                  <ul class="dropdown-menu">
                                
                    <li class="nav-item-lv3">
                      <a class="nav-link" href="/thoi-trang-nam">Thời trang nam</a>
                    </li>           
                                
                    <li class="nav-item-lv3">
                      <a class="nav-link" href="/thoi-trang-nu">Thời trang nữ</a>
                    </li>           
                                
                    <li class="nav-item-lv3">
                      <a class="nav-link" href="/tui-xach">Túi xách</a>
                    </li>           
                                
                    <li class="nav-item-lv3">
                      <a class="nav-link" href="/phu-kien">Phụ kiện</a>
                    </li>           
                    
                  </ul>                      
                </li>

              </ul> -->

            </li>

            
                        
            
            <li class="nav-item "><a class="nav-link" href="/tin-tuc">Tin tức</a></li>

            
                        
            
            <li class="nav-item ">
              <a href="/lien-he" class="nav-link">Liên hệ <i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
              

            </li>

            
            

          </ul>
        </div>

      </div>

    </div>

  </header>

</div>