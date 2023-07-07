<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class VisitorTagController extends Controller
{
    public function index($user)
    {
        $tags = Tag::all();
        return view('tags.index', compact('user','tags'));
    }

    public function show($user,$tag)
    {
        $tags = Tag::find($tag)->products;
        $tag =Tag::find($tag);
        return view('tags.show', compact('user','tags','tag'));
    }
}
