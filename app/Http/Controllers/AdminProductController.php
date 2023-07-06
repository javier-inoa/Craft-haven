<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index($user){
        $products = Product::where('state','visible')->get();
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            return view('admin.products.index',compact('user','products'));
        } else {
            return redirect()->route('products.index');
        }        
    }
}
