<?php

namespace App\Repository;


use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;

class AdminRepository
{
    public static function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('AdminID');
        Session::flush();
    }
    public static function is_logged_in()
    {
        if (Session::has('AdminID') && Session::has('admin_logged_in')) {
            return true;
        }
        return false;
    }
    public static function login_handler($data)
    {
        $user = Customer::where([
                'UserEmail' => $data->AdminEmail,
                'UserTypeID' => 50]
        )->get()->first();

        if (!$user) {
            throw new Exception("Invalid Email Address Provided");
        }
        if (!Hash::check($data->AdminPassword, $user->UserPassword)) {
            throw new Exception("Password is not matched");
        }
        if ($user->Active != "Y") {
            throw new Exception("Your account is not activated");
        }
        $user_data = [];
        $user_data['UserEmail'] = $user->UserEmail;
        $user_data['BillingFirstName'] = $user->BillingFirstName;
        Session::put('AdminID', $user->UserID);
        Session::put('admin_logged_in', TRUE);
        Session::put('AdminData', $user_data);
    }
    public static function addCategory($request)
    {
        $insert_data = [
            'Name' => $request->Name,
            'Image' => $request->Image,
            'Description' => $request->Description,
            'ParentCategory' => $request->ParentCategory,
            'Activate' => $request->Activate,
        ];
        Category::create($insert_data);
    }
}
