<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class VisitorQuestionController extends Controller
{
    public function store(Request $request, $user, $product)
    {
        $request->validate([
            'question'=>'required|min:10|max:500'
        ]);
        $question=new Question();
        $question->question=$request->question;
        $question->user_id=$user;
        $question->product_id=$product;
        $question->save();
        return redirect()->route('visitor.products.show',['user'=>$user,'product'=>$product]);
    }
}
