<?php

namespace App\Repository;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\URL;

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

    public static function forget_password($data)
    {
        $user = Customer::where([
                'UserEmail'=>$data->UserEmail,
                'UserTypeID'=>14]
        )->get()->first();
        if(!$user)
        {
            throw new Exception("No account found against provided email");
        }
        $reset_token = md5($user->UserID.'-'.mt_rand(0,9999));
        $insert_array = [
            'UserEmail' => $user->UserEmail,
            'UserID' => $user->UserID,
            'ResetToken' => $reset_token,
        ];
        DB::table('password_reset_tokens')->where('UserID', '=', $user->UserID)->delete();
        DB::table('password_reset_tokens')->insert($insert_array);

        $newPhrase = "<p>Dear Customer, You have requested to change password. Please click on the below link to reset the password within 24 hours of time</p>
        <p>After 24 hours, the link will be expired and you have to request for another link</p>";
        $newPhrase .= route('change_password').'/'.$reset_token.'-'.base64_encode($user->UserID);

        echo $newPhrase;exit;

    }
}
