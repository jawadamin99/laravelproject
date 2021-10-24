<?php

namespace App\Repository;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;

class UserRepository
{
    public static function login_request($data)
    {
        $user = Customer::where([
                'UserEmail'=>$data->UserEmail,
                'UserTypeID'=>14]
        )->get()->first();

        if(!$user)
        {
            throw new Exception("Invalid Email Address Provided");
        }
        if (!Hash::check($data->UserPassword, $user->UserPassword)) {
            throw new Exception("Password is not matched");
        }
        if($user->Active != "Y")
        {
            throw new Exception("Your account is not activated");
        }
        $user_data = [];
        $user_data['UserEmail'] = $user->UserEmail;
        $user_data['BillingFirstName'] = $user->BillingFirstName;
        Session::put('UserID', $user->UserID);
        Session::put('logged_in', TRUE);
        Session::put('UserData', $user_data);
    }

    public static function logout()
    {
        Session::forget('logged_in');
        Session::forget('UserID');
        Session::flush();
    }
    public static function is_logged_in()
    {
        if (Session::has('UserID') && Session::has('logged_in')) {
            return true;
        }
        return false;
    }

}
