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

        $request['total'] = $request['adm'] + $request['obat'] + $request['tuslah'] + $request['jasa_dokter'] + $request['injeksi'] + $request['jasa_tindakan'] + $request['bahp'] + $request['lab'] + $request['pasang_infus'] + $request['cairan_infus'] + $request['akomodasi'] + $request['jasa_perawat'] + $request['diit'] + $request['lain_lain'] + $request['pembulat'];
        // foreach ($request as $item) {
        //     return $itemtotal;
        // }

        // return $request;

        $request['created_at'] = now();
        $request['updated_at'] = now();

        // return $request;

        $model->create($request->all());
        // $kunjungan->insert(['biaya_id' => '$request->id']);
        $kunjungan->where('id', $request->id)->update(['biaya_id' => $request->id]);

        // return $kunjungan;
        return redirect()->route('biaya.kunjungan', $request->id)->withStatus(__('Biaya successfully created.'));
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
