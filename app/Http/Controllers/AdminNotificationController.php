<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function index($user)
    {
        $notifications = Notification::where('user_id', $user)->get();
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            return view('admin.notifications.index', compact('user', 'notifications'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function create($user, $product)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $product = Product::find($product);
            return view('admin.notifications.create', compact('user', 'product'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function store(Request $request, $user, $product)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $request->validate([
                'notification' => 'required|max:500|min:15'
            ]);
            $notification = new Notification();
            $notification->notification = $request->notification;
            $notification->user_id = $user;
            $notification->product_id = $product;
            $notification->save();
            return redirect()->route('admin.notifications', compact('user'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function edit($user,$notification)
    {
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $notification = Notification::find($notification);
            return view('admin.notifications.edit', compact('user','notification'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function update(Request $request, $user, $notification){
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $notification = Notification::find($notification);
            $request->validate([
                'notification' => 'required|max:500|min:15'
            ]);
            $notification->update([
                'notification'=>$request->notification,
            ]);
            return redirect()->route('admin.notifications', compact('user'));
        } else {
            return redirect()->route('products.index');
        }
    }
    public function destroy($user,$notification){
        if (User::where('id', $user)->where('type', 'administrator')->exists()) {
            $notification = Notification::find($notification);
            $notification->delete();
            return redirect()->route('admin.notifications', $user);
        } else {
            return redirect()->route('products.index');
        }
    }
}
