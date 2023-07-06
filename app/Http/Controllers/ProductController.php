<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('state','visible')->get();
        return view('home',compact('products'));
    }
    public function show($variable){
        $product =Product::find($variable);
        return  view('products_show',compact('product'));
    }

}
