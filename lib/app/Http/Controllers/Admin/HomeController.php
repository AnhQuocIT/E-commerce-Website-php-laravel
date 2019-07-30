<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Product;
use App\Models\Bill;
use App\Models\Customer;

class HomeController extends Controller
{
    public function getHome(){
        $data["bill"] = Bill::where('status', false)->count();
        $data["guest"] = Customer::where('is_member', false)->count();
        $data["member"] = Customer::where('is_member', true)->count();
        $data["product"]= Product::count();
    	return view('backend.index', $data);
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->intended('admin/login');
    }
}
