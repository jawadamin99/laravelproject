<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function register()
    {
        return view('register');
    }
    public function register_handler(Request $request)
    {
        $request->validate([
           'firstName'=>'required|max:255',
           'lastName'=>'required|max:255',
           'emailAddress'=>'required|unique:users,email|max:255',
           'password'=>'required|max:255'
        ]);
        $insert_data = [
            'name'=>$request->firstName,
            'email'=>$request->emailAddress,
            'password'=>Hash::make($request->password),
        ];
        User::create($insert_data);
        dd(User::all());
    }
}
