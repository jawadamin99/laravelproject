<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Session;

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
        if (UserRepository::is_logged_in()) {
            return redirect('my_account');
        }
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
        if (UserRepository::is_logged_in()) {
            return redirect('my_account');
        }
        return view('login');
    }

    public function login_handler(Request $request)
    {
        $request->validate([
            'UserEmail' => 'required|max:255',
            'UserPassword' => 'required|max:255'
        ]);

        try {
            UserRepository::login_request($request);
        } catch (Exception $ex) {
            $request->session()->flash('login_msg', $ex->getMessage());
            return redirect('/login');
        }
        return redirect('/my_account');
    }

    public function logout()
    {
        UserRepository::logout();
        return redirect('/');
    }
    public function my_account()
    {
        if(!UserRepository::is_logged_in())
        {
            return redirect('login');
        }
        $UserData = Customer::findorFail(Session::get('UserID'));
        $UserData->UserPassword = "";
        return view('user.dashboard')->with('UserData',$UserData);
    }
}
