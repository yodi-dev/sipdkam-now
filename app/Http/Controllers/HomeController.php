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
use Illuminate\Support\Facades\DB;

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


        $dokters = DB::table('jadwals')
            ->select('nama', 'shift')
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'dokter umum')
            ->get();

        $petugass = DB::table('jadwals')
            ->select('shift', 'nama')
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'petugas')
            ->get();

        $rumahtanggas = DB::table('jadwals')
            ->select('shift', 'nama')
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'kerumahtanggaan')
            ->get();

        $keamanan = DB::table('jadwals')
            ->select('shift', 'nama')
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'keamanan')
            ->get();

        $data_regular = Kunjungan::select(DB::raw('count(*) as jumlah'), 'poli')
            ->groupBy('poli')
            ->whereDay('tanggal', tanggal_now())
            ->where('jaminan', 'regular')
            ->get();

        $total_regular = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->where('jaminan', 'regular')
            ->get()->first();


        $regular = [0, 0, 0, 0, $total_regular->jumlah];

        foreach ($data_regular as $key => $value) {
            if ($value->poli == 'umum') {
                $regular[0] = $value->jumlah;
            } else if ($value->poli == 'gigi') {
                $regular[1] = $value->jumlah;
            } else if ($value->poli == 'kb') {
                $regular[2] = $value->jumlah;
            } else if ($value->poli == 'home care') {
                $regular[3] = $value->jumlah;
            }
        }

        $data_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'), 'poli')
            ->groupBy('poli')
            ->whereDay('tanggal', tanggal_now())
            ->where('jaminan', 'bpjs')
            ->get();

        $total_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->where('jaminan', 'bpjs')
            ->get()->first();


        $bpjs = [0, 0, 0, 0, $total_bpjs->jumlah];

        foreach ($data_bpjs as $key => $value) {
            if ($value->poli == 'umum') {
                $bpjs[0] = $value->jumlah;
            } else if ($value->poli == 'gigi') {
                $bpjs[1] = $value->jumlah;
            } else if ($value->poli == 'kb') {
                $bpjs[2] = $value->jumlah;
            } else if ($value->poli == 'home care') {
                $bpjs[3] = $value->jumlah;
            }
        }

        // return $bpjs;

        return view('home', compact('dokters', 'petugass', 'rumahtanggas', 'keamanan', 'regular', 'bpjs'), ['rekams' => $rekam->count(), 'kunjung' => $kunjung->count()]);
    }
}
