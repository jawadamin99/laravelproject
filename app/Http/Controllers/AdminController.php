<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        echo "index";
    }
    public function login()
    {
        return view('admin.login');
    }
    public function login_handler(Request $request)
    {
        return response()->json(['status'=>false,'message'=>'testing error']);
    }
}
