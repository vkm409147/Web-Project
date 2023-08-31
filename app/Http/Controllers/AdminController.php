<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function adminList()
    {
        $ad = Admin::get();
        return view('admin.admin-list', compact('ad'));
    }

    public function delete($id)
    {
        Admin::where('adminID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
    public function registerAdd()
    {
        $admin= Admin::get();
        return view('admin.register-add', compact('admin'));
    }

    public function logout () 
    {
        if(Session::has('adminID'))
        Session::pull('adminID');
        if(Session::has('adminName'))
        Session::pull('adminName');
        if(Session::has('adminPhoto'))
        Session::pull('adminPhoto');
        if(Session::has('adminEmail'))
        Session::pull('adminEmail');
        return redirect('admin/login');
    }

    public function registersave(Request $request)
    {
        $admin = new Admin();
        $admin->AdminFullname = $request->username;
        $admin->AdminEmail = $request->email;
        $admin->AdminPass = $request->password;
        $admin->save();
        return redirect()->back()->with('success', 'Register added successfully!');
    }

    public function productAdd()
    {
        $cat= Category::get();
        $manu= Manufacturer::get();
        return view('admin.product-add', compact('cat'),  compact('manu'));
    }

    public function productList()
    {
        $pro = Product::get();
        $manu = Manufacturer::get();
        $cat = Category::get();
        return view('admin.product-list', compact('pro'), compact('cat'),  compact('manu'));
    }

    public function manufacturerAdd()
    {
        $manu= Manufacturer::get();
        return view('admin.manufacturer-add', compact('manu'));
    }

    public function manufacturerList()
    {
       
        $manu = Manufacturer::get();
        return view('admin.manufacturer-list', compact('manu'));
    }
    public function CategoryList()
    {
        $cat = Category::get();
        return view('admin.category-list', compact('cat'));
    }

    public function CategoryAdd()
    {
        $cat= Category::get();
        return view('admin.category-add', compact('cat'));
    }
    public function register()
    {
        return view('admin.register');
    }
     
    public function login()
    {
        return view('admin.login');
    }


    public function loginProcess(Request $request)
    {
        $admin = Admin::where('AdminFullname', '=', $request ->username)->first();
        if($admin) {
            if($admin->AdminPass == $request->password) {
                $request->session()->put('adminID', $admin->AdminID);
                $request->session()->put('adminName', $admin->AdminFullname);
                $request->session()->put('adminPhoto', $admin->AdminPhoto);
                $request->session()->put('adminEmail', $admin->AdminEmail);
                return redirect('admin/index');
            } else {
                return back()->with('fail', 'Password not match!');
            }
        } else {
            return back()->with('fail', 'User name is not existed!');
        }
        
    }

    
    
}
 



