<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
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
        $validator = $validator = \Validator::make($request->all(), [
            'BillingFirstName' => 'required|max:255',
            'BillingLastName' => 'required|max:255',
            'BillingMobile' => 'required|max:18',
            'UserEmail' => 'required|unique:customers,UserEmail|max:255',
            'UserPassword' => 'required|max:255'
        ]);
        if ($validator->fails())
        {
            return response()->json(['status'=>false,'message'=>$validator->errors()->all()]);
        }

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
        return response()->json(
            [
                'status'=>true,
                'message'=>'Account Created, Please confirm your email address '.$request->UserEmail,
                'link'=>URL('/login')]);
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
        $validator = \Validator::make($request->all(), [
            'UserEmail' => 'required|max:255',
            'UserPassword' => 'required|max:255'
        ]);

        if ($validator->fails())
        {
            return response()->json(['status'=>false,'message'=>$validator->errors()->all()]);
        }
        try {
            UserRepository::login_request($request);
        } catch (Exception $ex) {
            return response()->json(['status'=>false,'message'=>$ex->getMessage()]);
        }
        $return = ['status'=>true,'link'=>URL('/my_account')];
        return response()->json($return);
    }

    public function logout()
    {
        UserRepository::logout();
        return redirect('/');
    }

    public function my_account()
    {
        if (!UserRepository::is_logged_in()) {
            return redirect('login');
        }
        $UserData = Customer::findorFail(Session::get('UserID'));
        $UserData->UserPassword = "";
        return view('user.dashboard')->with('UserData', $UserData);
    }

    public function my_addresses()
    {
        if (!UserRepository::is_logged_in()) {
            return redirect('login');
        }
        $UserData = Customer::findorFail(Session::get('UserID'));
        $UserData->UserPassword = "";
        return view('user.my_addresses')->with('UserData', $UserData);
    }
    public  function add_billing_address(Request $request)
    {
        if(!UserRepository::is_logged_in())
        {
            return redirect('/login');
        }
        $request->validate([
            'BillingTitle' => 'required|max:10',
            'BillingFirstName' => 'required|max:255',
            'BillingLastName' => 'required|max:255',
            'BillingCompanyName' => 'required|max:255',
            'BillingMobile' => 'required|max:18',
            'BillingAddress1' => 'required|max:255',
            'BillingEmail' => 'required|max:255',
            'BillingTownCity' => 'required|max:255',
            'BillingCountyState' => 'required|max:255',
            'BillingPostCode' => 'required|max:255',
            'BillingCountry' => 'required|max:255',
        ]);

        $billingAddress = new BillingAddress([
            'UserID' => Session::get('UserID'),
            'BillingTitle' => $request->BillingTitle,
            'BillingFirstName' => $request->BillingFirstName,
            'BillingLastName' => $request->BillingLastName,
            'BillingCompanyName' => $request->BillingCompanyName,
            'BillingMobile' => $request->BillingMobile,
            'BillingAddress1' => $request->BillingAddress1,
            'BillingAddress2' => $request->BillingAddress2,
            'BillingEmail' => $request->BillingEmail,
            'BillingTownCity' => $request->BillingTownCity,
            'BillingCountyState' => $request->BillingCountyState,
            'BillingPostCode' => $request->BillingPostCode,
            'BillingCountry' => $request->BillingCountry
        ]);
        $userData = Customer::find(Session::get('UserID'));
        $userData->billingAddresses()->save($billingAddress);
        return redirect('/my_addresses');
    }

    public  function add_delivery_address(Request $request)
    {
        if(!UserRepository::is_logged_in())
        {
            return redirect('/login');
        }
        $request->validate([
            'DeliveryTitle' => 'required|max:10',
            'DeliveryFirstName' => 'required|max:255',
            'DeliveryLastName' => 'required|max:255',
            'DeliveryCompanyName' => 'required|max:255',
            'DeliveryMobile' => 'required|max:18',
            'DeliveryAddress1' => 'required|max:255',
            'DeliveryEmail' => 'required|max:255',
            'DeliveryTownCity' => 'required|max:255',
            'DeliveryCountyState' => 'required|max:255',
            'DeliveryPostCode' => 'required|max:255',
            'DeliveryCountry' => 'required|max:255',
        ]);

        $deliveryAddress = new DeliveryAddress([
            'UserID' => Session::get('UserID'),
            'DeliveryTitle' => $request->DeliveryTitle,
            'DeliveryFirstName' => $request->DeliveryFirstName,
            'DeliveryLastName' => $request->DeliveryLastName,
            'DeliveryCompanyName' => $request->DeliveryCompanyName,
            'DeliveryMobile' => $request->DeliveryMobile,
            'DeliveryAddress1' => $request->DeliveryAddress1,
            'DeliveryAddress2' => $request->DeliveryAddress2,
            'DeliveryEmail' => $request->DeliveryEmail,
            'DeliveryTownCity' => $request->DeliveryTownCity,
            'DeliveryCountyState' => $request->DeliveryCountyState,
            'DeliveryPostCode' => $request->DeliveryPostCode,
            'DeliveryCountry' => $request->DeliveryCountry
        ]);
        $userData = Customer::find(Session::get('UserID'));
        $userData->deliveryAddresses()->save($deliveryAddress);
        return redirect('/my_addresses');
    }
}
