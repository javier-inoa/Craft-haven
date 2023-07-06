<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function show($tag)
    {
        $tags = Tag::find($tag)->products;
        $tag =Tag::find($tag);
        return view('tags.show', compact('tags','tag'));
    }

    
}
