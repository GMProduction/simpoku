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
    Route::get('/', 'member\eventController@index')->name('event');
    Route::get('/event', 'member\eventController@listEventAll')->name('listEventAll');
    Route::get('/tampilListEven', 'member\eventController@listEvent')->name('listEvent');
    Route::get('/cariListEven', 'member\eventController@cariEvent')->name('event');
    Route::get('/dataevent', 'member\eventController@dataEvent')->name('dataEvent');
    Route::get('/eventTahun', 'member\eventController@eventTahun')->name('eventTahun');
    Route::get('/eventSpec', 'member\eventController@eventSpec')->name('eventSpec');
    Route::get('/getAllSpec', 'member\specController@getAllSpec')->name('getAllSpec');
    Route::get('/comboCariEven', 'member\eventController@comboCarievent')->name('comboCariEven');
    Route::get('homeCarousell', 'member\eventController@homeCarousell')->name('homeCarousell');
    Route::get('/about', function () {
        return view('main/about');
    })->name('about');
    Route::get('/register', function () {
        return view('auth/member/register');
    })->name('register');
    Route::get('/detail', function () {
        return view('auth/member/registerDetail');
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
