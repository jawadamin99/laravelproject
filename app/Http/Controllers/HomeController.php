<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        echo "Index";
    }
    public function home()
    {
        $data = [];
        $data['name'] = "Jawad";
        $data['email'] = "info@jawadamin.com";
        return view('index')->with($data);
    }
    public function about()
    {
        return view('about');
    }
}
