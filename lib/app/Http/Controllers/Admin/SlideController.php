<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function getSlide(){
    	return view('backend.slide');
    }
}
