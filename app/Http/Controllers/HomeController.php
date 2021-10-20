<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),[
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'emailAddress'=>'required|customers:UserEmail,email|max:255',
            'password'=>'required|max:255'
        ])->validate();
        $validated = $validator->validated();
        dd($validator);
        Customer::create($validated);
        dd(Customer::all());
    }
}
