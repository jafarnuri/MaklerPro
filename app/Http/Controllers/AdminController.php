<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 

    public function user_show()
    {
        return view('admin.users.users'); // user səhifəsini göstər
    }


    public function index()
    {
        return view('admin.home'); // admin səhifəsini göstər
    }
}
