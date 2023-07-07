<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }
    public function show($variable)
    {
        $user = User::find($variable);
        switch ($user->type) {
            case 'seller':
                return view('creator.index', compact('user'));
                break;
            case 'administrator':
                return view('admin.index', compact('user'));
                break;
            case 'visitor':
                return redirect()->route('visitor.index',$user);
                break;
            default:
                return redirect()->route('products.index');
                break;
        }
    }
}
