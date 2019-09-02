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

Route::get('/register', 'Auth\member\RegisterController@showRegistrationForm');
Route::post('/detailregister', 'Auth\member\RegisterController@showDetailRegistration');
Route::post('/postregister/{provider}', 'Auth\member\RegisterController@register');



Route::get('/', 'member\eventController@index')->name('event');

Route::get('/login', 'Auth\LoginMemberController@showLoginForm')->name('login');
Route::get('/registerByGoogle', 'Auth\member\LoginController@redirectToGoogle');
Route::post('/postlogin', 'Auth\member\LoginController@postlogin');
Route::get('/callback', 'Auth\member\LoginController@googleCallback');
Route::get('/logout', 'Auth\member\LoginController@logout')->name('logout');
// Route::get('/auth/{provider}', 'Auth\member\LoginController@redirectToProvider');
// Route::get('/callback', 'Auth\member\LoginController@handleProviderCallback');

Route::get('/adminpanel', 'Auth\Admin\LoginController@showLoginForm');
Route::post('/postloginadmin', 'Auth\Admin\LoginController@postlogin');
Route::get('/logoutadmin', 'Auth\Admin\LoginController@logout')->name('logoutadmin');

Route::group(['middleware' => 'memberonly'], function () {

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
    Route::get('/detailRegister', function () {
        return view('auth/member/registerDetail');
    })->name('about');
    Route::get('/member', function () {
        return view('main/dashboard');
    })->name('about');

    
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'admin\master\userController@index')->name('pageuser');
        Route::get('/view', 'admin\master\userController@getData');
        Route::get('/new', 'admin\master\userController@showForm');
        Route::post('/add', 'admin\master\userController@add');
        Route::get('/store', 'admin\master\userController@store');
        Route::post('/update', 'admin\master\userController@edit');
        Route::delete('/destroy', 'admin\master\userController@delete');
    });
    Route::group(['prefix' => 'event'], function () {
        Route::get('/', 'admin\master\eventController@index')->name('pageevent');
        Route::get('/view', 'admin\master\eventController@getData');
        Route::get('/new', 'admin\master\eventController@showForm');
        Route::post('/add', 'admin\master\eventController@add');
        Route::get('/store', 'admin\master\eventController@store');
        Route::post('/update', 'admin\master\eventController@edit');
        Route::delete('/destroy', 'admin\master\eventController@delete');
    });
    Route::group(['prefix' => 'member'], function () {
        Route::get('/', 'admin\master\memberController@index')->name('pagemember');
        Route::get('/view', 'admin\master\memberController@getData');
        Route::get('/new', 'admin\master\memberController@showForm');
        Route::post('/add', 'admin\master\memberController@add');
        Route::get('/store', 'admin\master\memberController@store');
        Route::post('/update', 'admin\master\memberController@edit');
        Route::delete('/destroy', 'admin\master\memberController@delete');
    });
});






Route::group(['middleware' => 'auth:web,member'], function () {

    Route::get('/verifyaccount/{token}', 'Auth\member\RegisterController@verify');
    Route::get('/resend/{id}', 'Auth\member\RegisterController@resend');

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
