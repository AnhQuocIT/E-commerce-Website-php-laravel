<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function getNews(){
        // return view('backend.news');
        return view('backend.404');
    }
}
