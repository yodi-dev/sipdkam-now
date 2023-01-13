<?php

namespace App\Http\Controllers;

use App\Biaya;
use App\Kunjungan;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Biaya::class);
    }

    public function create()
    {
        return view('biaya.create');
    }

    public function store(Request $request, Biaya $model, Kunjungan $kunjungan)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();

        // return $request;

        $model->create($request->all());
        // $kunjungan->insert(['biaya_id' => '$request->id']);
        $kunjungan->where('id', $request->id)->update(['biaya_id' => $request->id]);

        // return $kunjungan;
        return redirect()->route('biaya.show', $request->id)->withStatus(__('Biaya successfully created.'));
    }

    public function show(Biaya $biaya)
    {
        // $data = Kunjungan::select('kunjungans.*', 'dokters.nama_dokter', 'rekams.no_rm', 'rekams.nama', 'rekams.kelamin', 'rekams.dusun', 'rekams.desa', 'rekams.kecamatan', 'rekams.tgl_lahir')
        // ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
        // ->Join('dokters', 'kunjungans.dokter_id', '=', 'dokters.id')
        // ->orderBy('kunjungans.id', 'asc')
        //     ->where('kunjungans.id', $kunjungan->id)->get();

        // foreach ($data as $tgl) {
        //     $years = Carbon::parse($tgl->tgl_lahir)->age;
        // }

        // return $id;
        // return $years;
        return view('biaya.show');
    }
}
