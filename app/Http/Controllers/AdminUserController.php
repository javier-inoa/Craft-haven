<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{

    public function index($admin)
    {
        $users = User::all();
        if (User::where('id', $admin)->where('type', 'administrator')->exists()) {
            return view('admin.users.index', compact('admin', 'users'));
        } else {
            return redirect()->route('products.index');
        }
    }

    public function edit($admin, $user)
    {
        if (User::where('id', $admin)->where('type', 'administrator')->exists()) {
            $user = User::find($user);
            return view('admin.users.edit', compact('admin', 'user'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function update(Request $request, $admin, $user)
    {
        if (User::where('id', $admin)->where('type', 'administrator')->exists()) {
            $user = User::find($user);
            $user->update([
                'type'=>$request->type,
            ]);
            return redirect()->route('admin.users', $admin);
        } else {
            return redirect()->route('products.index');
        }
    }
}
