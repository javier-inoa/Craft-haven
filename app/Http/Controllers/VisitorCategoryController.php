<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class VisitorCategoryController extends Controller
{
    public function index($user){
        $categories =Category::all();
        return view('categories.index',compact('user','categories'));
    }
    public function show($user,$category){
        $categories = Category::find($category)->products()->where('state', 'visible')->get();
        $category =Category::find($category);
        return  view('categories.show',compact('user','categories','category'));
    }
}
