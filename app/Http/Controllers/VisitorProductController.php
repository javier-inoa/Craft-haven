<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class VisitorProductController extends Controller
{
    public function index($user){
        $products = Product::where('state','visible')->get();
        return view('home',compact('user','products'));
    }
    public function show($user,$variable){
        $product =Product::find($variable);
        return  view('products_show',compact('user','product'));
    }
}
