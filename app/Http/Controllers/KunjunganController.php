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
    public function index(Kunjungan $model, Rekam $rekamModel, Dokter $dokterModel)
    {
        $this->authorize('manage-items', User::class);

        // $members = Member::with('user')->get();
        // $details = Kunjungan::with('details')->get();
        $details = Kunjungan::with('details', 'rekams')->get();
        $rekamms =  Rekam::with('kunjungans')->get();
        $kunjungans = $model->all();
        $rekams = $rekamModel->get(['id', 'no_rm', 'nama']);
        $dokters = $dokterModel->get(['id', 'nama_dokter']);

        $data = Kunjungan::select('kunjungans.id', 'kunjungans.created_at', 'detail_kunjungans.shift', 'detail_kunjungans.jaminan', 'rekams.no_rm', 'rekams.nama')
            ->Join('detail_kunjungans', 'kunjungans.detail_kunjungan_id', '=', 'detail_kunjungans.id')
            ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
            ->Join('dokters', 'kunjungans.dokter_id', '=', 'dokters.id')
            ->orderBy('kunjungans.id', 'asc')->get();

        // return $data;
        // return $details;
        // return $rekamms;
        // return $kunjungans;

        return view('kunjungan.index', compact('data', 'details', 'kunjungans', 'rekams', 'dokters'));

        // return view('kunjungan.index', [
        //     'kunjungans' => $model->all(),
        //     'rekams' => $rekamModel->get(['id', 'no_rm', 'nama']),
        //     'dokters' => $dokterModel->get(['id', 'nama_dokter'])
        // ]);
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
    public function store(Request $request, Kunjungan $kunjungan, DetailKunjungan $detail)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();

        $detail['_token'] = $request['_token'];
        $detail['shift'] = $request['shift'];
        $detail['jaminan'] = $request['jaminan'];
        $detail['poli'] = $request['poli'];
        $detail['created_at'] = $request['created_at'];
        $detail['updated_at'] = $request['updated_at'];

        // $detail->create(['$detail->_token', '$detail->shift', '$detail->jaminan', '$detail->poli', '$detail->created_at', '$detail->updated_at']);
        // return redirect()->route('kunjungan.index')->withStatus(__('detail successfully created.'));
        // $model->create($request->all());
        // return $detail;
        // return redirect()->route('rekam.index')->withStatus(__('Rekam Medis successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        $data = Kunjungan::select('kunjungans.id', 'kunjungans.created_at', 'detail_kunjungans.shift', 'detail_kunjungans.jaminan', 'rekams.no_rm', 'rekams.nama')
            ->Join('detail_kunjungans', 'kunjungans.detail_kunjungan_id', '=', 'detail_kunjungans.id')
            ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
            ->Join('dokters', 'kunjungans.dokter_id', '=', 'dokters.id')
            ->orderBy('kunjungans.id', 'asc')
            ->where('kunjungans.id', $kunjungan->id)
            ->get();

        // return $data;
        // return $kunjungan;
        return view('kunjungan.show', compact('data'));
    }

    public function biaya(Kunjungan $kunjungan)
    {
        // return "tes";
        return view('kunjungan.biaya');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan)
    {
        // return $rekamModel;
        // return 'tes';
        return view('kunjungan.edit', compact('kunjungan'));
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
