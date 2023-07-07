<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class CreatorQuestionController extends Controller
{
    public function update(Request $request,$user,$product,$question){
        if (User::where('id', $user)->where('type', 'seller')->exists()) {
            $question=Question::find($question);
            $request->validate([
                'answer'=>'nullable|min:10|max:500'
            ]);
            $question->update([
                'answer'=>$request->answer,
            ]);
            return redirect()->route('creator.products.show',['user'=>$user,'product'=>$product]);
        } else {
            return redirect()->route('products.index');
        }
    }
}
