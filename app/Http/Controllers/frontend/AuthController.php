<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        $categories = Category::all();
        return view('frontend.auth.register', compact('categories'));
    }

    public function registerStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password',
        ]);
        // dd($request->all());
        // die;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('frontend.index');
        }
        return redirect()->route('register')->with('error', 'error while registering');
    }

    public function view()
    {
        $categories = Category::all();
        return view('frontend.auth.login', compact('categories'));
    }

    public function login(Request $request)
    {
        // return "aa";
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect()->route('frontend.index');
        // }

        if (Auth::attempt($request->only(['email', 'password']))) {
            if (Auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            else {
                return redirect()->route('frontend.index');
            }
        }
        return redirect()->route('frontend.index')->withErrors('error', 'login details are  not valid');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
