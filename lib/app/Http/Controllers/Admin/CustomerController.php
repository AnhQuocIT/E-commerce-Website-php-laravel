<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function getMember(){
    	return view('backend.member');
    }

    public function getCustomer(){
    	return view('backend.guest');
    }
}
