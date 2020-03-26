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
//团包路由
// Route::get('/', function () {
//      return view('welcome');
// });
// Route::get('/hello', function () {
//             return "chin";
// });

Route::get('/index', 'IndexController@index');
Route::get('/goods', 'IndexController@goods');

// Route::get('/add', function () {
//     return '<form action="adddo" method="post">'.csrf_field().'<input type="text" name="names"><button>提交</button></form>';
// });
// Route::post('/adddo', function () {
//     echo request()->names;
// });

Route::get('/add', 'IndexController@add');
Route::post('/adddo', 'IndexController@adddo');

//一个路由多种请求方式
// Route::match(['get','post'],'/add', 'IndexController@add');
// Route::any('/add', 'IndexController@add');

//路由视图
// Route::view('/add','add');
// Route::get('/add', 'IndexController@add');


// Route::get('/show/{id}/{name}', function ($id,$goods_name) {
//     echo $id."==".$goods_name;
// });

// Route::get('/show/{id}/{name}', 'IndexController@show');

//可选路由
// Route::get('/news/{id}/{name?}', function ($id,$goods_name=null) {
//     echo $id."==".$goods_name;
// });
// Route::get('/news/{id}/{name?}', 'IndexController@news');
// 正则约束
// Route::get('/cate/{id?}', 'IndexController@cate')->where('id','\d');
Route::get('/cate/{id?}/{name}', 'IndexController@cate')->where(['id'=>'\d+','name'=>'[a-zA-Z]{3,6}']);

//brand
Route::get('/brand/create', 'BrandController@create');
Route::post('/brand/store', 'BrandController@store');
Route::get('/brand/index', 'BrandController@index');
Route::get('/brand/edit/{id}', 'BrandController@edit');
Route::post('/brand/update/{id}', 'BrandController@update');
Route::get('/brand/destroy/{id}', 'BrandController@destroy');
// htt
Route::get('/htt/create', 'HttController@create');
Route::post('/htt/store', 'HttController@store');
Route::get('/htt/index', 'HttController@index');
Route::get('/htt/edit/{id}', 'HttController@edit');
Route::post('/htt/update/{id}', 'HttController@update');
Route::get('/htt/destroy/{id}', 'HttController@destroy');
//report
Route::get('/report/create', 'ReportController@create');
Route::post('/report/store', 'ReportController@store');
Route::get('/report/index', 'ReportController@index');
//floor
Route::get('/floor/create', 'FloorController@create');
Route::post('/floor/store', 'FloorController@store');
Route::get('/floor/index', 'FloorController@index');

//goods
// Route::prefix('goods')->middleware('islogin')->group(function(){
    // Route::prefix('goods')->middleware('auth.basic')->group(function(){
        Route::prefix('goods')->middleware('auth')->group(function(){
Route::get('create', 'GoodsController@create');
Route::post('store', 'GoodsController@store');
Route::get('index', 'GoodsController@index');
Route::get('edit/{id}', 'GoodsController@edit');
Route::post('update/{id}', 'GoodsController@update');
Route::get('destroy/{id}', 'GoodsController@destroy');
});
// books
Route::get('/books/create', 'BooksController@create');
Route::post('/books/store', 'BooksController@store');
Route::get('/books/index', 'BooksController@index');
// admin
Route::get('/admin/create', 'AdminController@create');
Route::post('/admin/store', 'AdminController@store');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::post('/admin/update/{id}', 'AdminController@update');
Route::get('/admin/destroy/{id}', 'AdminController@destroy');
//news
Route::prefix('news')->middleware('islogin')->group(function(){
    Route::get('create', 'NewsController@create');
    Route::post('store', 'NewsController@store');
    Route::get('index', 'NewsController@index');
});
    
Route::get('/login/login', 'LoginController@login');
Route::post('/login/logindo', 'LoginController@logindo');
Route::get('/login/test', 'LoginController@test');

Route::prefix('cate')->middleware('islogin')->group(function(){
    Route::get('create', 'CateController@create');
    Route::post('store', 'CateController@store');
    Route::get('index', 'CateController@index');
});

Route::prefix('article')->middleware('islogin')->group(function(){
    Route::get('create', 'ArticleController@create');
    Route::post('store', 'ArticleController@store');
    Route::get('index', 'ArticleController@index');
    Route::get('edit/{id}', 'ArticleController@edit');
    Route::post('update/{id}', 'ArticleController@update');
    Route::get('destroy/{id}', 'ArticleController@destroy');
    Route::get('checkonly', 'ArticleController@checkonly');
});

// Route::prefix('/')->middleware('islog')->group(function(){
Route::get('/', 'Index\IndexController@index')->name('index');
Route::get('/log', 'Index\LoginController@log');
Route::get('/reg', 'Index\LoginController@reg');
Route::get('/reg/sedsms', 'Index\LoginController@sedsms');
Route::get('/log/user', 'Index\LoginController@user');
Route::get('/reg/reg_do', 'Index\LoginController@reg_do');
Route::get('/reg/sedemail', 'Index\LoginController@sedemail');
Route::get('/test', 'Index\LoginController@test');
Route::get('/sendcodemail', 'Index\IndexController@sendcodemail');
Route::get('/prlist', 'Index\IndexController@prlist');

// 商品详情
Route::get('/prinfo/{id}', 'Index\GoodsController@index')->name('goods');
Route::get('/addcart', 'Index\GoodsController@addcart');
//购物车
Route::get('/car', 'Index\GoodsController@car');
Route::get('/delcar', 'Index\CartController@delcar');

Route::get('/pay', 'Index\CartController@pay');
Route::get('/payid', 'Index\CartController@payid');
Route::get('/success', 'Index\CartController@success');
// 收货地址
Route::get('/address', 'Index\CartController@address');
Route::get('/city', 'Index\CartController@city');
Route::get('/address/add_do', 'Index\CartController@add_do');
Route::get('/add_dos', 'Index\CartController@add_dos');
//去结算
Route::get('/cartsu', 'Index\CartController@cartsu');
Route::get('/paysp', 'Index\PayController@paysp');
//支付
Route::get('/pays/{orderid}', 'Index\PayController@pays');
Route::get('/return_url', 'Index\PayController@return_url');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
