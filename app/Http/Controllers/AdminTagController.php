<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    //admin
    public function index($user)
    {
        $tags = Tag::all();
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            return view('admin.tags.index', compact('user','tags'));
        } else {
            return redirect()->route('products.index');
        }   
    }

    public function create($user)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            return view('admin.tags.create', compact('user'));
        } else {
            return redirect()->route('products.index');
        }
    }

    public function store(Request $request, $user)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $request->validate([
                'name' => 'required|max:50|unique:tags',
                'description' => 'nullable|min:10|max:500'
            ]);
            $category = new Tag();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            return redirect()->route('admin.tags', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
    public function edit($user, $tag)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $tag = Tag::find($tag);
            return view('admin.tags.edit', compact('user', 'tag'));
        } else {
            return redirect()->route('products.index');
        }
    }

    public function update(Request $request, $user, $tag)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $tag = Tag::find($tag);
            $request->validate([
                'name' => ['required','max:50',Rule::unique('tags')->ignore($tag->id)],
                'description' => ['nullable','min:10','max:500'],
            ]);
            $tag->update([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
            return redirect()->route('admin.tags', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
    public function destroy($user,$tag){
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $tag = tag::find($tag);
            $tag->delete();
            return redirect()->route('admin.tags', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
}
