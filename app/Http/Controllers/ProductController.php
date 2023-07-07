<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $users=User::all();
        return view('index',compact('users'));
    }
}
