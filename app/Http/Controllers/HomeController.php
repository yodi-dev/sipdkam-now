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
        // if (auth()->user()->role_id == 3) {
        //     return redirect('kunjungan');
        // }


        $dokters = DB::table('jadwals')
            ->select('nama', 'shift')
            ->whereMonth('tanggal', bulan_angka())
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'dokter umum')
            ->get();

        $petugass = DB::table('jadwals')
            ->select('shift', 'nama')
            ->whereMonth('tanggal', bulan_angka())
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'petugas')
            ->get();

        $rumahtanggas = DB::table('jadwals')
            ->select('shift', 'nama')
            ->whereMonth('tanggal', bulan_angka())
            ->whereDay('tanggal', tanggal_now())
            ->where('bagian', 'kerumahtanggaan')
            ->get();

        $keamanan = DB::table('jadwals')
            ->select('shift', 'nama')
            ->whereMonth('tanggal', bulan_angka())
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

        // data per shift
        // data shift 1 
        $data_shift1 = DB::table('kunjungans')
            ->select(DB::raw('count(*) as jumlah'), 'poli', 'shift')
            ->groupBy('poli')
            ->groupBy('shift')
            ->whereDay('tanggal', tanggal_now())
            ->where('shift', '1')
            ->get();

        $total_shift1 = DB::table('kunjungans')
            ->select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->where('shift', '1')
            ->get()->first();;

        $shift1 = [null, null, null, null, $total_shift1->jumlah];

        foreach ($data_shift1 as $key => $value) {
            if ($value->poli == 'umum') {
                $shift1[0] = $value->jumlah;
            } else if ($value->poli == 'gigi') {
                $shift1[1] = $value->jumlah;
            } else if ($value->poli == 'kb') {
                $shift1[2] = $value->jumlah;
            } else if ($value->poli == 'home care') {
                $shift1[3] = $value->jumlah;
            }
        }

        // data shift 2 
        $data_shift2 = DB::table('kunjungans')
            ->select(DB::raw('count(*) as jumlah'), 'poli', 'shift')
            ->groupBy('poli')
            ->groupBy('shift')
            ->whereDay('tanggal', tanggal_now())
            ->where('shift', '2')
            ->get();

        $total_shift2 = DB::table('kunjungans')
            ->select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->where('shift', '2')
            ->get()->first();;

        $shift2 = [null, null, null, null, $total_shift2->jumlah];

        foreach ($data_shift2 as $key => $value) {
            if ($value->poli == 'umum') {
                $shift2[0] = $value->jumlah;
            } else if ($value->poli == 'gigi') {
                $shift2[1] = $value->jumlah;
            } else if ($value->poli == 'kb') {
                $shift2[2] = $value->jumlah;
            } else if ($value->poli == 'home care') {
                $shift2[3] = $value->jumlah;
            }
        }

        // data shift 3
        $data_shift3 = DB::table('kunjungans')
            ->select(DB::raw('count(*) as jumlah'), 'poli', 'shift')
            ->groupBy('poli')
            ->groupBy('shift')
            ->whereDay('tanggal', tanggal_now())
            ->where('shift', '3')
            ->get();

        $total_shift3 = DB::table('kunjungans')
            ->select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->where('shift', '3')
            ->get()->first();;

        $shift3 = [null, null, null, null, $total_shift3->jumlah];

        foreach ($data_shift3 as $key => $value) {
            if ($value->poli == 'umum') {
                $shift3[0] = $value->jumlah;
            } else if ($value->poli == 'gigi') {
                $shift3[1] = $value->jumlah;
            } else if ($value->poli == 'kb') {
                $shift3[2] = $value->jumlah;
            } else if ($value->poli == 'home care') {
                $shift3[3] = $value->jumlah;
            }
        }



        // return $shift3;

        return view('home', compact('shift1', 'shift2', 'shift3', 'dokters', 'petugass', 'rumahtanggas', 'keamanan', 'regular', 'bpjs'), ['rekams' => $rekam->count(), 'kunjung' => $kunjung->count()]);
    }
}
