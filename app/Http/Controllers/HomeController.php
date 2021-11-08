<?php

namespace App\Http\Controllers;

use App\Mail\AccountRegistered;
use App\Models\BillingAddress;
use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\User;
use App\Repository\UserRepository;
use Cassandra\Custom;
use Dotenv\Validator;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
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
        $customer = Customer::where('UserEmail', $request->UserEmail)->get()->first();
        $activation_token = md5($customer->UserID . '-' . mt_rand(0, 9999));
        $insert_array = [
            'UserEmail' => $customer->UserEmail,
            'UserID' => $customer->UserID,
            'ActivationLink' => $activation_token,
        ];
        DB::table('account_activation_links')->where('UserID', '=', $customer->UserID)->delete();
        DB::table('account_activation_links')->insert($insert_array);

        Mail::to($request->UserEmail)->send(new AccountRegistered($customer));
        return response()->json(
            [
                'status' => true,
                'message' => 'Account Created, Please confirm your email address ' . $request->UserEmail,
                'link' => URL('/login')]);
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

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        try {
            UserRepository::login_request($request);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => $ex->getMessage()]);
        }
        $return = ['status' => true, 'link' => URL('/my_account')];
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

    public function add_billing_address(Request $request)
    {
        if (!UserRepository::is_logged_in()) {
            return redirect('/login');
        }
        $validator = \Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
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
        return response()->json(['status' => true, 'message' => 'Billing address has been added']);
    }

    public function edit_billing_address(Request $request)
    {
        if (!UserRepository::is_logged_in()) {
            return redirect('/login');
        }
        $validator = \Validator::make($request->all(), [
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
            'BillingAddressID' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        $billingAddress = [];
        $billingAddress['BillingTitle'] = $request->BillingTitle;
        $billingAddress['BillingFirstName'] = $request->BillingFirstName;
        $billingAddress['BillingLastName'] = $request->BillingLastName;
        $billingAddress['BillingCompanyName'] = $request->BillingCompanyName;
        $billingAddress['BillingMobile'] = $request->BillingMobile;
        $billingAddress['BillingAddress1'] = $request->BillingAddress1;
        $billingAddress['BillingAddress2'] = $request->BillingAddress2;
        $billingAddress['BillingEmail'] = $request->BillingEmail;
        $billingAddress['BillingTownCity'] = $request->BillingTownCity;
        $billingAddress['BillingCountyState'] = $request->BillingCountyState;
        $billingAddress['BillingPostCode'] = $request->BillingPostCode;
        $billingAddress['BillingCountry'] = $request->BillingCountry;
        BillingAddress::where('ID', $request->BillingAddressID)
            ->update($billingAddress);
        return response()->json(['status' => true, 'message' => 'Billing address has been updated']);
    }

    public function add_delivery_address(Request $request)
    {
        if (!UserRepository::is_logged_in()) {
            return redirect('/login');
        }
        $validator = \Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }

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

        return response()->json(['status' => true, 'message' => 'New delivery address is added']);
    }

    public function edit_delivery_address(Request $request)
    {
        if (!UserRepository::is_logged_in()) {
            return redirect('/login');
        }

        $validator = \Validator::make($request->all(), [
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
            'DeliveryAddressID' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        $deliveryAddress = [];
        $deliveryAddress['DeliveryTitle'] = $request->DeliveryTitle;
        $deliveryAddress['DeliveryFirstName'] = $request->DeliveryFirstName;
        $deliveryAddress['DeliveryLastName'] = $request->DeliveryLastName;
        $deliveryAddress['DeliveryCompanyName'] = $request->DeliveryCompanyName;
        $deliveryAddress['DeliveryMobile'] = $request->DeliveryMobile;
        $deliveryAddress['DeliveryAddress1'] = $request->DeliveryAddress1;
        $deliveryAddress['DeliveryAddress2'] = $request->DeliveryAddress2;
        $deliveryAddress['DeliveryEmail'] = $request->DeliveryEmail;
        $deliveryAddress['DeliveryTownCity'] = $request->DeliveryTownCity;
        $deliveryAddress['DeliveryCountyState'] = $request->DeliveryCountyState;
        $deliveryAddress['DeliveryPostCode'] = $request->DeliveryPostCode;
        $deliveryAddress['DeliveryCountry'] = $request->DeliveryCountry;
        DeliveryAddress::where('ID', $request->DeliveryAddressID)
            ->update($deliveryAddress);
        return response()->json(['status' => true, 'message' => 'Delivery address has been updated']);
    }

    public function delete_address(Request $request)
    {
        $addresstype = $request->addresstype;
        $addressID = $request->addressid;
        if ($addresstype == "billing") {
            BillingAddress::where('ID', $addressID)->delete();
        } else {
            DeliveryAddress::where('ID', $addressID)->delete();
        }
        return response()->json(['status' => true, 'message' => $addresstype . ' address has been deleted']);
    }

    public function forget_password()
    {
        return view('forget_password');
    }

    public function forget_password_handler(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'UserEmail' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        try {
            UserRepository::forget_password($request);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => $ex->getMessage()]);
        }
        $return = ['status' => true, 'message' => 'Please check your email for further instructions', 'link' => URL('/login')];
        return response()->json($return);
    }

    public function change_password($token)
    {
        $token_string = $token;
        $token = explode('-', $token);
        $resetToken = $token[0];
        $userID = base64_decode($token[1]);
        $token_data = DB::table('password_reset_tokens')
            ->where([
                ['UserID', '=', $userID],
                ['ResetToken', '=', $resetToken]
            ])->get()->first();
        if (!$token_data) {
            Session::flash('error_message', 'The password reset link has expired, please send a password reset request again');
            return redirect('/forget_password');
        }
        $requestTime = strtotime($token_data->CreatedAt);
        if (time() > $requestTime + 60 * 60 * 24) {
            Session::flash('error_message', 'The password reset link has expired, please send a password reset request again');
            return redirect('/forget_password');
        }
        $userdata = Customer::find($token_data->UserID);
        $userdata->ResetToken = $token_string;
        return view('user.reset_password')->with('UserData', $userdata);
    }

    public function activate_account($token)
    {
        $token_data = DB::table('account_activation_links')
            ->where('ActivationLink', '=', $token)->get()->first();
        if (!$token_data) {
            Session::flash('error_message', 'The activation Link has expired');
            return redirect('/forget_password');
        }
        try {
            UserRepository::activate_account($token_data);
        } catch (Exception $ex) {
            Session::flash('error_message', $ex->getMessage());
            return redirect('/forget_password');
        }
        Session::flash('success_message', "Your account is activated. You can now login");
        return redirect('login');
    }

    public function change_password_handler(Request $request)
    {
        $validator = $validator = \Validator::make($request->all(), [
            'UserPassword' => 'required|max:255',
            'ConfirmPassword' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        if ($request->UserPassword !== $request->ConfirmPassword) {
            return response()->json(['status' => false, 'message' => "Password Not Matched. Try again"]);
        }
        try {
            UserRepository::change_password($request);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => $ex->getMessage()]);
        }
        return response()->json(['status' => true, 'message' => "The Password is changed. You can now login", 'link' => route('login')]);
    }

    public function add_profile_picture(Request $request)
    {
        if (!UserRepository::is_logged_in()) {
            return redirect('/login');
        }
        $path = $request->ProfilePicture->path();
        $extension = $request->ProfilePicture->extension();
        $validator = \Validator::make($request->all(),
            [
                'ProfilePicture' => 'required|mimes:jpg,bmp,png,jpeg|max:3072'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        $filename = Session::get('UserID')."-profile_picture-".$request->file('ProfilePicture')->getClientOriginalName();
        $filePath = $request->file('ProfilePicture')->storeAs('/assets/images/profile_pictures', $filename, 'public');
        return response()->json(['status'=>true,'url'=>URL($filePath)]);
    }
}
