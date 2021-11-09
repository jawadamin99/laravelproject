<?php

namespace App\Repository;

use App\Mail\ForgetPassword;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\URL;

class UserRepository
{
    public static function login_request($data)
    {
        $user = Customer::where([
                'UserEmail' => $data->UserEmail,
                'UserTypeID' => 14]
        )->get()->first();

        if (!$user) {
            throw new Exception("Invalid Email Address Provided");
        }
        if (!Hash::check($data->UserPassword, $user->UserPassword)) {
            throw new Exception("Password is not matched");
        }
        if ($user->Active != "Y") {
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
                'UserEmail' => $data->UserEmail,
                'UserTypeID' => 14]
        )->get()->first();
        if (!$user) {
            throw new Exception("No account found against provided email");
        }
        $reset_token = md5($user->UserID . '-' . mt_rand(0, 9999));
        $insert_array = [
            'UserEmail' => $user->UserEmail,
            'UserID' => $user->UserID,
            'ResetToken' => $reset_token,
        ];
        DB::table('password_reset_tokens')->where('UserID', '=', $user->UserID)->delete();
        DB::table('password_reset_tokens')->insert($insert_array);
        Mail::to($user->UserEmail)->send(new ForgetPassword($user));
    }

    public static function change_password($request)
    {
        $token = explode('-', $request->ResetToken);
        $UserID = base64_decode($token[1]);
        $user = Customer::where('UserID', $UserID);
        if (!$user) {
            throw new Exception("No account found against provided email");
        }
        $user->update(['UserPassword' => Hash::make($request->ConfirmPassword)]);
        DB::table('password_reset_tokens')->where('ResetToken', '=', $token[0])->delete();
    }

    public static function activate_account($token_data)
    {
        $user = Customer::where('UserID', $token_data->UserID);
        if (!$user) {
            throw new Exception("No account found against provided email");
        }
        $user->update(['Active' => 'Y']);
        DB::table('account_activation_links')->where('ActivationLink', '=', $token_data->ActivationLink)->delete();
    }

    public static function update_profile_picture($filePath)
    {
        $user = Customer::where('UserID', Session::get('UserID'));
        $user->update(['ProfilePicture' => $filePath]);
    }
}
