<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use App\Models\Invoice;
use Exception;


class Login extends Controller
{
    public function index()
    {
        if (Auth::check()) { // Check if login or not
            return redirect('/');
        } else {
            return view('login', []);
        }
    }
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|max:100',
                'password' => 'required|min:7'
            ]);

            $credentials = $request->only('email', 'password');
            
            if (Auth::attempt($credentials)) {
                $user = Auth::user(); // Data dari user yang login
                session(['user_ses' => $user]);

                return redirect('/');
            }
            return redirect('/login')->with('error', 'Username atau password salah');
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
