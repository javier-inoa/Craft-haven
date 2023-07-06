<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
{
    //admin
    public function index($user)
    {
        $categories = Category::all();
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            return view('admin.categories.index', compact('user', 'categories'));
        } else {
            return redirect()->route('products.index');
        }
    }

    public function create($user)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            return view('admin.categories.create', compact('user'));
        } else {
            return redirect()->route('products.index');
        }
    }

    public function store(Request $request, $user)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $request->validate([
                'name' => 'required|max:50|unique:categories',
                'description' => 'nullable|min:10|max:500'
            ]);
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            return redirect()->route('admin.categories', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
    public function edit($user, $category)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $category = Category::find($category);
            return view('admin.categories.edit', compact('user', 'category'));
        } else {
            return redirect()->route('products.index');
        }
    }

    public function update(Request $request, $user, $category)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $category = Category::find($category);
            $request->validate([
                'name' => ['required','max:50',Rule::unique('categories')->ignore($category->id)],
                'description' => ['nullable','min:10','max:500'],
            ]);
            $category->update([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
            return redirect()->route('admin.categories', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
    public function destroy($user,$category){
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $category = Category::find($category);
            $category->delete();
            return redirect()->route('admin.categories', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
}
