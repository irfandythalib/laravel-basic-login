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
    private function app_id()
    {
        $app_id = '324511123123123';
        // if (env('APP_ENV') == 'production') {
        //     $app_id = Profil::where('url_host', request()->getHost())->first()->app_id;
        // }
        return $app_id;
    }
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
            $request['app_id'] = $this->app_id();

            $credentials = $request->only('email', 'password', 'app_id');
            
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
