<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use App\Models\Invoice;
use Exception;


class Admin extends Controller
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
        // if(!Auth::check()){
        //     return "not login";
        // }else{
        //     return "login";
        // }
        try {
            if (!Auth::check()) {
                return redirect('/login')->with('message', 'Anda tidak punya akses ke halaman ini');
            }
// return "halo";
            // $daftar_uuid_kelas = Kelas::where('app_id', $this->app_id())->pluck('uuid')->toArray();

            // $profil = Profil::where('app_id', $this->app_id())->first();
            // $product_sold = Invoice::where('terbayar', '=', 1)->whereIn('uuid_kelas', $daftar_uuid_kelas)->count();
            // $total_omzet = Invoice::where('terbayar', '=', 1)->whereIn('uuid_kelas', $daftar_uuid_kelas)->sum('harga');
            // $total_user = Users::where('app_id', '=', $this->app_id())->count();
            // $total_kelas = Kelas::where('app_id', '=', $this->app_id())->count();
            return view('home', []);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
