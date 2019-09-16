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


// Route::get('/', function () {
//     echo 'oke';
// });
Auth::routes();

Route::get('/sel', function () {
    return view('admin.test');
});
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
    Route::get('/eventlist', 'member\eventController@listEventAll')->name('listEventAll');
    Route::post('/load_data', 'member\eventController@load_data')->name('load_data');
    Route::get('/tampilListEven', 'member\eventController@listEvent')->name('listEvent');
    Route::get('/cariListEven', 'member\eventController@cariEvent')->name('event');
    Route::get('/dataevent', 'member\eventController@dataEvent')->name('dataEvent');
    Route::get('/eventTahun', 'member\eventController@eventTahun')->name('eventTahun');
    Route::get('/eventSpec', 'member\eventController@eventSpec')->name('eventSpec');
    Route::get('/getAllSpec', 'member\specController@getAllSpec')->name('getAllSpec');
    Route::get('/comboCariEven', 'member\eventController@comboCarievent')->name('comboCariEven');
    Route::get('homeCarousell', 'member\eventController@homeCarousell')->name('homeCarousell');
    Route::get('/pagination', 'member\eventController@comboPagination')->name('comboPagination');
    Route::get('/about', function () {
        return view('main/about');
    })->name('about');
    Route::get('/register', function () {
        return view('auth/member/register');
    })->name('register');
    Route::get('/dataLoad', function () {
        return view('main/data/dataeventload');
    })->name('register');
    Route::post('/detailRegister', function () {
        return view('auth/member/registerDetail');
    })->name('about');
    Route::get('eventsearch','member\eventController@searchEvent')->name('eventsearch');
    Route::get('/member', function () {
        return view('main/dashboard');
    })->name('about');

    Route::get('/dataLoad/load_data', 'member\eventController@load_data')->name('loadmore.load_data');

    Route::get('dataevent/download','member\eventController@download_pdf')->name('download_pdf');

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
        Route::post('/test', 'admin\master\eventController@test');
        Route::get('/getCities', 'admin\master\eventController@getCities');
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
