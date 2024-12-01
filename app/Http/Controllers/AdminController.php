<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('admin', $credentials['name']);
            
            return redirect()->route('web.admin.dashboard');
        }

        return back()->withErrors([
            'name' => 'Неверный логин или пароль.',
        ]);
    }

    

    public function dashboard(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect()->route('login');
        }

        return view('dashboard');
    }
}
