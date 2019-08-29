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


Auth::routes();

Route::get('/register', 'Auth\RegisterMemberController@showRegistrationForm');
Route::post('/postRegister', 'Auth\RegisterMemberController@register')->name('registermember');

Route::get('/login', 'Auth\LoginMemberController@showLoginForm')->name('login');
Route::post('/postlogin', 'Auth\LoginMemberController@postlogin');
Route::get('/logout', 'Auth\LoginMemberController@logout')->name('logout');
Route::get('/auth/{provider}', 'Auth\member\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\member\LoginController@handleProviderCallback');

Route::get('/adminpanel', 'Auth\Admin\LoginController@showLoginForm');
Route::post('/postloginadmin', 'Auth\Admin\LoginController@postlogin');
Route::get('/logoutadmin', 'Auth\Admin\LoginController@logout')->name('logoutadmin');

Route::group(['middleware' => 'memberonly'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/event', function () {
        return view('umum/listevent');
    })->name('event');
    Route::get('/dataevent', function () {
        return view('umum/dataevent');
    })->name('dataevent');
    Route::get('/about', function () {
        return view('umum/about');
    })->name('about');
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.menuawal');
    })->name('admin');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Master\userController@index')->name('pageuser');
        Route::get('/view', 'Master\userController@getData');
        Route::get('/new', 'Master\userController@showForm');
        Route::post('/add', 'Master\userController@add');
        Route::get('/store', 'Master\userController@store');
        Route::post('/update', 'Master\userController@edit');
        Route::delete('/destroy', 'Master\userController@delete');
    });
    Route::group(['prefix' => 'event'], function () {
        Route::get('/', 'Master\eventController@index')->name('pageevent');
        Route::get('/view', 'Master\eventController@getData');
        Route::get('/new', 'Master\eventController@showForm');
        Route::post('/add', 'Master\eventController@add');
        Route::get('/store', 'Master\eventController@store');
        Route::post('/update', 'Master\eventController@edit');
        Route::delete('/destroy', 'Master\eventController@delete');
    });
});



Route::get('/verifyaccount/{token}', 'Auth\RegisterMemberController@verify');


Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'event'], function () {
        Route::get('/', 'Master\eventController@index');
        Route::get('/tambah', 'Master\eventController@add');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });


    Route::get('/produk', function () {
        return view('/admin/master/dataproduk');
    })->name('produk');


    Route::get('/kategori', function () {
        return view('/admin/master/datakategori');
    })->name('kategori');
});
