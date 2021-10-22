<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

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
            'BillingFirstName' => 'required|max:255',
            'BillingLastName' => 'required|max:255',
            'BillingMobile' => 'required|max:18',
            'UserEmail' => 'required|unique:customers,UserEmail|max:255',
            'UserPassword' => 'required|max:255'
        ]);
        $insert_data = [
            'BillingFirstName' => $request->BillingFirstName,
            'BillingLastName' => $request->BillingLastName,
            'UserEmail' => $request->UserEmail,
            'BillingMobile' => $request->BillingMobile,
            'UserPassword' => Hash::make($request->UserPassword),
            'UserTypeID' => 14,
            'RegisteredIP' => $request->ip()
        ];
        Customer::create($insert_data);
        $request->session()->flash('registered_email', $request->UserEmail);
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function login_handler(Request $request)
    {
        DB::enableQueryLog();
        $user = Customer::where([
            'UserEmail'=>$request->UserEmail,
            'Active'=>'Y',
            'UserTypeID'=>14]
        )->get()->first()->toArray();

        $message = "Login successfull";
        if($user) {
            if (!Hash::check($request->UserPassword, $user['UserPassword'])) {
                $message = "Password Not Matched";
            }
        }
        else
        {
            $message = "Invalid Email";
        }
        echo $message;

    }
}
