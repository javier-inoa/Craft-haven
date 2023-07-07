<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class VisitorScoreController extends Controller
{
    public function update(Request $request, $user, $product)
    {
        $score = Score::where('user_id', $user)->where('product_id', $product)->first();
        if ($score) {
            $score->update([
                'score'=>$request->score
            ]);
        } else {
            $newScore = new Score();
            $newScore->score = $request->score;
            $newScore->user_id = $user;
            $newScore->product_id = $product;
            $newScore->save();
        }
        return redirect()->route('visitor.products.show', ['user' => $user, 'product' => $product]);
    }
}
