<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminController extends Controller
{
    //profile
    public function profilepage()
    {
        return view('profile');
    }

    /*public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function checkRegister(Request $request)
    {
        $this->validate($request, [
            'adminID' => 'required|string|max:50|unique:adminID',
            'adminFullname' => 'required|string|max:255',
            'adminPass' => 'required|string|min:6|confirmed',
        ]);

        // Create a new User instance
        $admin = new Admin();
        $admin->adminID = $request->input('adminID');
        $admin->adminFullname = $request->input('adminFullname');
        $admin->adminPhoto = $request->input('adminPhoto');
        $admin->adminPass = bcrypt($request->input('adminPass'));
        $admin->adminAddress = $request->input('adminAddress'); // Replace with the actual input field name
        // Save the admin user to the database
        $admin->save();

        return redirect('admin/adminProfile'); // Redirect to admin dashboard or desired page
    }

    public function checkLogin(Request $request)
    {
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
        if (Session::has('adminID'))
            Session::pull('adminID');
        if (Session::has('adminPhoto'))
            Session::pull('adminPhoto');
        if (Session::has('adminFullname'))
            Session::pull('adminFullname');
        return redirect('admin/login');
    }*/

    public function add()
    {
        $category = Category::get();
        return view('admin/add', compact('category'));
    }

    public function save(Request $request)
    {
        $pro = new Product();
        $pro->productID = $request->id;
        $pro->productName = $request->name;
        $pro->productPrice = $request->price;
        $pro->productImage = $request->image;
        $pro->productDetails = $request->details;
        $pro->catID = $request->category;
        $pro->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $data = Product::where('productID', '=', $id)->first();
        $category = Category::get();
        return view('admin/edit', compact('data', 'category'));
    }

    public function update(Request $request)
    {
        Product::where('productID', '=', $request->id)->update([
            'productName' => $request->name,
            'productPrice' => $request->price,
            'productImage' => $request->image,
            'productDetails' => $request->details,
            'catID' => $request->category
        ]);
        return redirect()->back()->with('success', 'Product update successfully!');
    }

    public function delete($id)
    {
        $data = Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }



    //admin function
    public function getAdminProfile()
    {
        $adminData = User::all();
        return view('admin.adminProfile', compact('adminData'));
    }

    public function editAdmin($id)
    {
        $adminData = User::where('id', '=', $id)->first();
        return view('admin/adminEdit', compact('adminData'));
    }

    public function updateAdmin(Request $request)
    {
        User::where('id', '=', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->back()->with('success', 'Admin update successfully!');
    }


    public function deleteAdmin($id)
    {
        //$adminData = User::find($id);
        $adminData = User::where('id', '=', $id)->first();

        if (auth()->check() && auth()->user()->id === $adminData->id)
            // Thông báo lỗi: Không thể xóa tài khoản đang đăng nhập
            return redirect()->back()->with('error', 'You cannot delete your own account!');

        $adminData->delete();
        // Thông báo thành công
        return redirect()->back()->with('success', 'The account has been deleted successfully!');
    }

    //create new admin direct from form
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:1|confirmed',
            //'type' => 'required|string',
        ]);

        // Xác định giá trị type dựa trên email
        $type = strpos($validatedData['email'], 'admin') !== false ? 1 : 0;

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'type' => $type,
        ]);

        // Gán vai trò admin cho người dùng mới
        if ($type == 1) {
            $user->type;
        }

        return redirect()->route('admin.getAdminProfile')->with('success', 'New admin added successfully!');
    }
}
