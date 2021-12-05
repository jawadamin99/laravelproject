<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repository\AdminRepository;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Exception;

class AdminController extends Controller
{
    //
    public function index()
    {
        return redirect(route('admin.dashboard'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function logout()
    {
        AdminRepository::logout();
        return redirect(route('admin'));
    }

    public function login_handler(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'AdminEmail' => 'required|email|max:255',
            'AdminPassword' => 'required|min:5|max:32',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        try {
            AdminRepository::login_handler($request);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => $ex->getMessage()]);
        }
        return response()->json(['status' => true, 'link' => route('admin.dashboard')]);
    }

    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories')->with('categories',$categories);
    }

    public function addCategory()
    {
        return view('admin.addCategory');
    }

    public function addCategory_handler(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'Name' => 'required|max:255',
            'Activate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
        }
        try {
            AdminRepository::addCategory($request);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => $ex->getMessage()]);
        }
        return response()->json(['status' => true, 'message' => 'Category ' . $request->Name . ' is created', 'link' => route('admin.categories')]);
    }
}
