<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories =Category::all();
        return view('categories.index',compact('categories'));
    }
    public function show($variable){
        $categories =Category::find($variable)->products;
        $category =Category::find($variable);

        return  view('categories.show',compact('categories','category'));
    }
    
}
