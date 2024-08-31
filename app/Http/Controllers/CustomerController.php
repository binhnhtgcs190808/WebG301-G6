<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function register()
    {
        return view('customers.register');
    }

    public function login()
    {
        return view('customers.login');
    }

    public function registerProcess(Request $request)
    {
        $cus = new Customer();
        $cus->customerEmail = $request->email;
        $cus->customerPass = Hash::make($request->password);
        $cus->customerName = $request->name;
        $cus->customerAddress = $request->address;
        $cus->customerPhone = $request->phone;
        $cus->customerPhoto = $request->photo;
        $cus->save();
        return redirect('customer/login');
    }

    public function loginProcess(Request $request)
    {
        /*$cus = Customer::where('customerEmail', '=', $request->email)->first();
        if ($cus) {
            if (Hash::check($request->pass, $cus->customerPass)) {
                $request->session()->put('customerEmail', $cus->customerEmail);
                $request->session()->put('customerPass', $cus->customerPass);
                $request->session()->put('customerName', $cus->customerName);
                return redirect('customers/index');
            } else {
                return back()->with('fail', 'Password is not matched!');
            }
        } else {
            return back()->with('fail', 'The email is not registered!');
        }*/

        $admin = Admin::where('adminID', '=', $request->adminID)->first();
        if ($admin) {
            if ($admin->adminPass == $request->adminPass) {
                $request->session()->put('adminID', $admin->adminID);
                $request->session()->put('adminPhoto', $admin->adminPhoto);
                $request->session()->put('adminFullname', $admin->adminFullname);
                return redirect('admin/index');
            } else {
                return back()->with('fail', 'Password is not match!');
            }
        } else {
            return back()->with('fail', 'Admin id is not existed!');
        }
    }

    public function logout()
    {
        Session::pull('customerEmail');
        Session::pull('customerPass');
        Session::pull('customerName');
        return redirect('customers/index');
    }
}
