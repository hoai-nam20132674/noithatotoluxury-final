<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//AuthClientRoute
Route::get('/test',['as'=>'test','uses'=>'AuthClient\ClientController@test']);


Route::get('/',['as'=>'trang-chu','uses'=>'AuthClient\ClientController@index']);

//search text
Route::get('check:{email}-{password}',['as'=>'checkLogin','uses'=>'AuthClient\LoginController@checkLogin']);
Route::get('search',['as'=>'searchText','uses'=>'AuthClient\ClientController@searchText']);
Route::get('search:danh mục:{cate_id}.{cate_name}.tìm kiếm={search_text}',['as'=>'rootSearchText','uses'=>'AuthClient\ClientController@rootSearchText']);
Route::get('/{system_url}/search:danh mục:{cate_id}.{cate_name}.tìm kiếm={search_text}',['as'=>'businessSearchText','uses'=>'AuthClient\ClientController@businessSearchText']);
// end search text
Route::get('/client-login',['as'=>'clientLogin','uses'=>'AuthClient\LoginController@getLogin']);
Route::get('/client-logout',['as'=>'clientLogout','uses'=>'AuthClient\LoginController@logout']);
Route::post('/clientPostLogin',['as'=>'clientPostLogin','uses'=>'AuthClient\LoginController@postLogin']);


Route::get('admin/auth/master',['as'=>'admin','uses'=>'Auth\LoginController@getLogin']);
Route::get('admin',['as'=>'login','uses'=>'Auth\LoginController@login']);
Route::get('admin/auth/logout',['as'=>'logout','uses'=>'Auth\LoginController@logout']);
Route::post('/postLogin',['as'=>'postLogin','uses'=>'Auth\LoginController@postLogin']);

Route::get('account/{id}',['as'=>'account','uses'=>'AuthClient\ClientController@account']);
Route::get('order-status/{id}',['as'=>'orderStatus','uses'=>'AuthClient\ClientController@orderStatus']);
Route::get('order/{id}',['as'=>'order','uses'=>'AuthClient\ClientController@order']);
Route::get('cart',['as'=>'cart','uses'=>'AuthClient\ClientController@cart']);
Route::get('checkout',['as'=>'checkout','uses'=>'AuthClient\ClientController@checkout']);
Route::get('check-add-to-cart/{url}',['as'=>'checkAddToCart','uses'=>'AuthClient\ClientController@checkAddToCart']);
Route::get('check-product-detail/{id}-{quantity}',['as'=>'checkProductDetail','uses'=>'AuthClient\ClientController@checkProductDetail']);
Route::get('check-count-properties/{products_detail_id}',['as'=>'checkCountProperties','uses'=>'AuthClient\ClientController@checkCountProperties']);
Route::get('add-to-cart/{id}-{quantity}',['as'=>'addToCart','uses'=>'AuthClient\ClientController@addToCart']);
Route::get('remove-cart-item/{id}',['as'=>'removeCartItem','uses'=>'AuthClient\ClientController@removeCartItem']);
Route::get('follow-system/{system_id}-{user_id}',['as'=>'followSystem','uses'=>'AuthClient\ClientController@followSystem']);
Route::get('check-feedback/{product_id}-{user_id}',['as'=>'checkFeedback','uses'=>'AuthClient\ClientController@checkFeedback']);

Route::post('postAddFeedback',['as'=>'postAddFeedback','uses'=>'AuthClient\ClientController@postAddFeedback']);


Route::get('get-price-product-detail/{url}',['as'=>'getPriceProductDetail','uses'=>'AuthClient\ClientController@getPriceProductDetail']);

// login with social facebook
Route::get('/login/facebook',['as' => 'loginFacebook','uses' => 'AuthClient\LoginController@redirectToProvider']);
Route::get('/facebook/callback',['as' => 'loginFacebookCallback','uses' => 'AuthClient\LoginController@handleProviderCallback']);

// end

// order
Route::post('postAddOrder',['as'=>'postAddOrder','uses'=>'AuthClient\ClientController@postAddOrder']);
Route::post('postAddUserClient',['as'=>'postAddUserClient','uses'=>'AuthClient\ClientController@postAddUserClient']);
// end

//End AuthClientRoute

Route::get('getListUsersResponse',['as'=>'getListUsersResponse','uses'=>'Auth\AdminController@getListUsersResponse']);
Route::group(['prefix'=>'auth/admin','middleware'=>'auth'], function(){
	Route::get('trang-chu',['as'=>'authIndex','uses'=>'Auth\AdminController@index']);

	Route::get('them-tai-khoan-quan-tri',['as'=>'addUser','uses'=>'Auth\AdminController@addUser']);
	// Route::get('them-tai-khoan-nguoi-dung',['as'=>'addUserClient','uses'=>'Auth\AdminController@addUserClient']);
	Route::get('them-san-pham',['as'=>'addProduct','uses'=>'Auth\AdminController@addProduct']);
	Route::get('them-tin-tuc',['as'=>'addBlog','uses'=>'Auth\AdminController@addBlog']);
	Route::get('them-danh-muc',['as'=>'addCategorie','uses'=>'Auth\AdminController@addCategorie']);
	Route::get('them-he-thong',['as'=>'addSystem','uses'=>'Auth\AdminController@addSystem']);
	Route::get('them-tag-danh-muc/{id}',['as'=>'addTagCategorie','uses'=>'Auth\AdminController@addTagCategorie']);
	Route::get('them-slide',['as'=>'addSlide','uses'=>'Auth\AdminController@addSlide']);
	Route::get('them-menu',['as'=>'addMenu','uses'=>'Auth\AdminController@addMenu']);
	Route::get('them-thuoc-tinh',['as'=>'addPropertie','uses'=>'Auth\AdminController@addPropertie']);

	Route::get('danh-sach-tai-khoan-quan-tri',['as'=>'listUsers','uses'=>'Auth\AdminController@listUsers']);
	Route::get('danh-sach-tai-khoan-nguoi-dung',['as'=>'listUsersClient','uses'=>'Auth\AdminController@listUsersClient']);
	Route::get('danh-sach-san-pham',['as'=>'listProducts','uses'=>'Auth\AdminController@listProducts']);
	Route::get('danh-sach-tin-tuc',['as'=>'listBlogs','uses'=>'Auth\AdminController@listBlogs']);
	Route::get('danh-sach-san-pham-chi-tiet/{id}',['as'=>'listProductsDetail','uses'=>'Auth\AdminController@listProductsDetail']);
	Route::get('danh-sach-danh-muc',['as'=>'listCategories','uses'=>'Auth\AdminController@listCategories']);
	Route::get('danh-sach-he-thong',['as'=>'listSystems','uses'=>'Auth\AdminController@listSystems']);
	Route::get('danh-sach-slide',['as'=>'listSlides','uses'=>'Auth\AdminController@listSlides']);
	Route::get('danh-sach-menu',['as'=>'listMenus','uses'=>'Auth\AdminController@listMenus']);
	Route::get('danh-sach-don-hang',['as'=>'listOrder','uses'=>'Auth\AdminController@listOrder']);
	Route::get('danh-sach-don-hang-chi-tiet/{id}',['as'=>'listOrderDetail','uses'=>'Auth\AdminController@listOrderDetail']);

	Route::get('sua-tai-khoan-quan-tri/{id}',['as'=>'editUser','uses'=>'Auth\AdminController@editUser']);
	// Route::get('sua-tai-khoan-nguoi-dung',['as'=>'editUserClient','uses'=>'Auth\AdminController@editUserClient']);
	Route::get('sua-san-pham/{id}',['as'=>'editProduct','uses'=>'Auth\AdminController@editProduct']);
	Route::get('sua-tin-tuc/{id}',['as'=>'editBlog','uses'=>'Auth\AdminController@editBlog']);
	Route::get('sua-san-pham-chi-tiet/{id}',['as'=>'editProductDetail','uses'=>'Auth\AdminController@editProductDetail']);
	Route::get('sua-danh-muc/{systems_id}/{id}',['as'=>'editCategorie','uses'=>'Auth\AdminController@editCategorie']);
	Route::get('sua-thong-tin-he-thong/{id}',['as'=>'editSystem','uses'=>'Auth\AdminController@editSystem']);
	Route::get('sua-slide/{id}',['as'=>'editSlide','uses'=>'Auth\AdminController@editSlide']);
	Route::get('sua-menu/{id}',['as'=>'editMenu','uses'=>'Auth\AdminController@editMenu']);

	Route::get('xoa-tai-khoan-quan-tri',['as'=>'deleteUser','uses'=>'Auth\AdminController@deleteUser']);
	Route::get('xoa-tai-khoan-nguoi-dung',['as'=>'deleteUserClient','uses'=>'Auth\AdminController@deleteUserClient']);
	Route::get('xoa-san-pham/{id}',['as'=>'deleteProduct','uses'=>'Auth\AdminController@deleteBlog']);
	Route::get('xoa-tin-tuc/{id}',['as'=>'deleteBlog','uses'=>'Auth\AdminController@deleteProduct']);
	Route::get('xoa-menu/{id}',['as'=>'deleteMenu','uses'=>'Auth\AdminController@deleteMenu']);
	Route::get('xoa-san-pham-chi-tiet/{id}',['as'=>'deleteProductDetail','uses'=>'Auth\AdminController@deleteProductDetail']);
	Route::get('xoa-danh-muc/{id}',['as'=>'deleteCategorie','uses'=>'Auth\AdminController@deleteCategorie']);
	Route::get('xoa-he-thong',['as'=>'deleteSystem','uses'=>'Auth\AdminController@deleteSystem']);

	Route::post('postAddUser',['as'=>'postAddUser','uses'=>'Auth\AdminController@postAddUser']);
	Route::post('postEditUser/{id}',['as'=>'postEditUser','uses'=>'Auth\AdminController@postEditUser']);
	Route::post('postAddProduct',['as'=>'postAddProduct','uses'=>'Auth\AdminController@postAddProduct']);
	Route::post('postEditProduct/{id}',['as'=>'postEditProduct','uses'=>'Auth\AdminController@postEditProduct']);
	Route::post('postAddBlog',['as'=>'postAddBlog','uses'=>'Auth\AdminController@postAddBlog']);
	Route::post('postAddMenu',['as'=>'postAddMenu','uses'=>'Auth\AdminController@postAddMenu']);
	Route::post('postEditBlog',['as'=>'postEditBlog','uses'=>'Auth\AdminController@postEditBlog']);
	Route::post('postAddCategorie',['as'=>'postAddCategorie','uses'=>'Auth\AdminController@postAddCategorie']);
	Route::post('postEditCategorie',['as'=>'postEditCategorie','uses'=>'Auth\AdminController@postEditCategorie']);
	Route::post('postAddSystem',['as'=>'postAddSystem','uses'=>'Auth\AdminController@postAddSystem']);
	Route::post('postEditSystem/{id}',['as'=>'postEditSystem','uses'=>'Auth\AdminController@postEditSystem']);
	Route::post('postAddHomeSystem',['as'=>'postAddHomeSystem','uses'=>'Auth\AdminController@postAddHomeSystem']);
	Route::post('postAddSlide',['as'=>'postAddSlide','uses'=>'Auth\AdminController@postAddSlide']);
	Route::post('postEditSlide/{id}',['as'=>'postEditSlide','uses'=>'Auth\AdminController@postEditSlide']);
	Route::post('postAddTagCategorie/{id}',['as'=>'postAddTagCategorie','uses'=>'Auth\AdminController@postAddTagCategorie']);
	Route::post('postAddPropertie',['as'=>'postAddPropertie','uses'=>'Auth\AdminController@postAddPropertie']);


	Route::get('system-highlights/{id}',['as'=>'systemHighlight','uses'=>'Auth\AdminController@systemHighlight']);
	Route::get('system-unhighlights/{id}',['as'=>'systemUnHighlight','uses'=>'Auth\AdminController@systemUnHighlight']);
	Route::get('system-enable/{id}',['as'=>'systemEnable','uses'=>'Auth\AdminController@systemEnable']);
	Route::get('system-disable/{id}',['as'=>'systemDisable','uses'=>'Auth\AdminController@systemDisable']);
	Route::get('enable-categorie/{id}',['as'=>'enableCategorie','uses'=>'Auth\AdminController@enableCategorie']);
	Route::get('disable-categorie/{id}',['as'=>'disableCategorie','uses'=>'Auth\AdminController@disableCategorie']);
	Route::get('update-menu/{id}-{value}',['as'=>'updateMenu','uses'=>'Auth\AdminController@updateMenu']);
	
});


Route::get('/{url}',['as'=>'rootPageContent','uses'=>'AuthClient\ClientController@rootPageContent']);
Route::get('/{system_url}/{url}',['as'=>'businessPageContent','uses'=>'AuthClient\ClientController@businessPageContent']);
