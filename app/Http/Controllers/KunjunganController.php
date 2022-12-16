<?php

namespace App\Http\Controllers;

use App\DetailKunjungan;
use App\Dokter;
use App\Kunjungan;
use App\Rekam;
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
    public function index(Kunjungan $model)
    {
        $this->authorize('manage-items', User::class);

        return view('kunjungan.index', ['kunjungans' => $model->all()]);
        // $rekams = Kunjungan::with('rekams')->get();
        // $kunjungans = Rekam::with('kunjungans')->get();

        // $rekam = Kunjungan::select('no_rm')->leftJoin('rekam', 'kunjungans.rekam_medis_id', '=', 'rekam_medis.id')->get();

        // return view(
        //     'kunjungan.index',
        //     [
        //         'kunjungans' => $kunjungans->all(),
        //         'rekam' => $rekams
        //     ]
        // );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rekam $rekamModel, Dokter $dokterModel)
    {
        return view('kunjungan.create', [
            'rekams' => $rekamModel->get(['id', 'no_rm', 'nama']),
            'dokters' => $dokterModel->get(['id', 'nama_dokter'])
        ]);
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
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        // return $kunjungan;
        return view('kunjungan.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan, Rekam $rekamModel, Dokter $dokterModel, DetailKunjungan $kunjungs)
    {
        // return $rekamModel;
        return view('kunjungan.edit', compact('kunjungan', 'kunjungs'), [
            'rekams' => $rekamModel->get(['id', 'no_rm', 'nama']),
            'dokters' => $dokterModel->get(['id', 'nama_dokter'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunjungan $kunjungan)
    {
        //
    }
}
