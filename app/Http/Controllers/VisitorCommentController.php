<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class VisitorCommentController extends Controller
{
    public function store(Request $request, $user, $product)
    {
        $request->validate([
            'comment'=>'required|min:10|max:500'
        ]);
        $comment=new Comment();
        $comment->comment=$request->comment;
        $comment->user_id=$user;
        $comment->product_id=$product;
        $comment->save();
        return redirect()->route('visitor.products.show',['user'=>$user,'product'=>$product]);
    }
}
