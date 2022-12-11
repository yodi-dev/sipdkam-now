<?php

namespace App\Http\Controllers;

use App\DetailKunjungan;
use App\Kunjungan;
use App\RekamMedis;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Kunjungan::class);
    }

    public function index(Kunjungan $kunjungans)
    {
        $rekammedis = Kunjungan::with('rekam_medis')->get();
        $kunjunganss = RekamMedis::with('kunjungans')->get();

        $rekam = Kunjungan::select('no_rm')->leftJoin('rekam_medis', 'kunjungans.rekam_medis_id', '=', 'rekam_medis.id')->get();

        return view(
            'kunjungan.index',
            [
                'kunjungans' => $kunjungans->all(),
                'rekam' => $rekam
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kunjungan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
