<?php
/*

=========================================================
* Argon Dashboard PRO - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro-laravel
* Copyright 2018 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)

* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/

namespace App\Http\Controllers;

use App\Kunjungan;
use App\Rekam;
use App\RekamMedis;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Rekam $rekam, Kunjungan $kunjung)
    {
        // return auth()->user()->role_id;
        if (auth()->user()->role_id == 3) {
            return redirect('kunjungan');
        }

        $tgl = Carbon::now()->format('d-M-Y');

        return view('home', compact('tgl'), ['rekams' => $rekam->count(), 'kunjung' => $kunjung->count()]);
    }
}
