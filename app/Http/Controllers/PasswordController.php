<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('admin.password.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8|current_password:web',
            'password' => 'required|min:8|confirmed'
        ]);

        if(Auth::check()){
            if(Hash::check($request->old_password, Auth::user()->password)){
                $user = Auth::user();
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('change-password')->with('msg', 'Password has been changed');
            }else{
                return redirect()->route('change-password')->with('emsg', 'Old password is incorrect');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
