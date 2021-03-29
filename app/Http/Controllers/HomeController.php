<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('user.contact');
    }
}
