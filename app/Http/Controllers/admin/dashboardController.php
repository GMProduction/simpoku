<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    //menampilkan halaman user
    public function index()
    {
        return view('admin.dashboard');
    }
}
