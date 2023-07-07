<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CreatorProductController extends Controller
{
    public function show($user,$product){
        if (User::where('id', $user)->where('type', 'seller')->exists()) {
            $product = Product::find($product);
            return view('creator.products.show', compact('user', 'product'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function create($user)
    {
        if (User::where('id', $user)->where('type', 'seller')->exists()) {
            $categories = Category::all();
            $tags = Tag::all();
            return view('creator.products.create', compact('user', 'categories', 'tags'));
        } else {
            return redirect()->route('products.index');
        }
    }

    public function store(Request $request, $user)
    {
        if (User::where('id', $user)->where('type', 'seller')->exists()) {
            $request->validate([
                'name' => 'required|min:10|max:200',
                'description' => 'nullable|min:10|max:500',
                'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
                'state' => 'required',
                'category' => 'required',
                'img1' => 'required|url',
                'img2' => 'nullable|url',
                'img3' => 'nullable|url',
            ]);
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->state = $request->state;
            $product->user_id = $user;
            $product->category_id = $request->category;
            $product->save();
            $productID = $product->id;

            if (!is_null($request->img1)) {
                $image = new Image();
                $image->name = $request->img1;
                $image->product_id = $productID;
                $image->save();
            }
            if (!is_null($request->img2)) {
                $image = new Image();
                $image->name = $request->img1;
                $image->product_id = $productID;
                $image->save();
            }
            if (!is_null($request->img3)) {
                $image = new Image();
                $image->name = $request->img1;
                $image->product_id = $productID;
                $image->save();
            }
            $tags = $request->input('tags', []);
            $product->tags()->attach($tags);
            return redirect()->route('users.show', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
    public function edit($user, $product)
    {
        if (User::where('id', $user)->where('type', 'seller')->exists()) {
            $product = Product::find($product);
            $categories = Category::all();
            $tags = Tag::all();
            return view('creator.products.edit', compact('user', 'categories', 'tags', 'product'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function update(Request $request, $user, $product)
    {
        if (User::where('id', $user)->where('type', 'seller')->exists()) {
            $product = Product::find($product);
            $request->validate([
                'name' => 'required|min:10|max:200',
                'description' => 'nullable|min:10|max:500',
                'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
                'state' => 'required',
                'category' => 'required',
                'img1' => 'required|url',
                'img2' => 'nullable|url',
                'img3' => 'nullable|url',
            ]);
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'state' => $request->state,
                'category_id' => $request->category
            ]);
            foreach ($product->images as $image) {
                $image->delete();
            }
            if (!is_null($request->img1)) {
                $image = new Image();
                $image->name = $request->img1;
                $image->product_id = $product->id;
                $image->save();
            }
            if (!is_null($request->img2)) {
                $image = new Image();
                $image->name = $request->img1;
                $image->product_id = $product->id;
                $image->save();
            }
            if (!is_null($request->img3)) {
                $image = new Image();
                $image->name = $request->img1;
                $image->product_id = $product->id;
                $image->save();
            }
            $tags = $request->input('tags', []);
            $product->tags()->sync($tags);
            return redirect()->route('users.show', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
    public function destroy($user,$product){
        if (User::where('id', $user)->where('type', 'seller')->exists()) {
            $product = Product::find($product);
            $product->delete();
            return redirect()->route('users.show', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
}
