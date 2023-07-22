<?php

namespace App\Http\Controllers;

use App\User;
use App\Rekam;
use App\Kunjungan;
use Carbon\Carbon;
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
    public function index(Kunjungan $model, Rekam $rekamModel, User $dokterModel)
    {
        // $this->authorize('manage-items', User::class);

        $rekamms =  Rekam::with('kunjungans')->get();
        $kunjungans = $model->all();
        $rekams = $rekamModel->get(['id', 'no_rm', 'nama']);
        $dokters = $dokterModel->where('role_id', 3)->get(['id', 'name']);

        $data = Kunjungan::select('kunjungans.id', 'kunjungans.created_at', 'kunjungans.shift', 'kunjungans.jaminan', 'rekams.no_rm', 'rekams.nama')
            ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
            ->orderBy('kunjungans.id', 'asc')
            ->get();

        return view('kunjungan.index', compact('data', 'kunjungans', 'rekams', 'dokters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rekam $rekamModel, User $userModel)
    {
        $date = now()->format('H:i:s');
        if ($date >= '00:00:00' && $date <= '08:00:00') {
            $shift = 1;
        } else if ($date >= '08:00:01' && $date <= '16:00:00') {
            $shift = 2;
        } else {
            $shift = 3;
        }

        // return $shift;
        return view('kunjungan.create', [
            'rekams' => $rekamModel->get(['id', 'no_rm', 'nama']),
            'dokters' => $userModel->where('role_id', 3)->get(['id', 'name']),
        ], compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kunjungan $model)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());

        return redirect()->route('kunjungan.index')->withStatus(__('Kunjungan successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function show(Kunjungan $kunjungan)
    {
        $data = Kunjungan::select('kunjungans.*', 'users.name as nama_dokter', 'rekams.no_rm', 'rekams.nama', 'rekams.kelamin', 'rekams.dusun', 'rekams.desa', 'rekams.kecamatan', 'rekams.tgl_lahir')
            ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
            ->Join('users', 'kunjungans.dokter_id', '=', 'users.id')
            ->orderBy('kunjungans.id', 'asc')
            ->where('kunjungans.id', $kunjungan->id)->get();

        foreach ($data as $tgl) {
            $years = Carbon::parse($tgl->tgl_lahir)->age;
        }

        // return $data;
        // return $years;
        return view('kunjungan.show', compact('data', 'years'));
    }

    public function biaya(Kunjungan $kunjungan, $id)
    {
        $kunjungan = Kunjungan::select('*')->where('id', $id)->get();

        $biaya = Kunjungan::select('biayas.*')
            ->Join('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->where('biayas.id', $id)
            ->get();

        // return $kunjungan;
        return view('kunjungan.biaya', compact('kunjungan', 'biaya', 'id'));
    }

    public function Printbiaya(Kunjungan $kunjungan, $id)
    {
        $kunjungan = Kunjungan::select('*')->where('id', $id)->get();

        $biaya = Kunjungan::select('biayas.*')
            ->Join('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->where('biayas.id', $id)
            ->get();

        foreach ($biaya as $item) {
            $total = $item->adm + $item->obat + $item->tuslah + $item->jasa_dokter + $item->injeksi + $item->jasa_tindakan + $item->bahp + $item->lab + $item->pasang_infus + $item->cairan_infus + $item->akomodasi + $item->jasa_perawat + $item->diit + $item->lain_lain + $item->pembulat;
        }

        // return $total;
        // return $biaya;
        return view('kunjungan.Printbiaya', compact('kunjungan', 'biaya', 'id', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunjungan $kunjungan, Rekam $rekamModel, User $dokterModel)
    {
        // return $kunjungan;
        // return 'tes';
        return view(
            'kunjungan.edit',
            compact('kunjungan'),
            [
                'rekams' => $rekamModel->get(['id', 'no_rm', 'nama']),
                'dokters' => $dokterModel->where('role_id', 3)->get(['id', 'name'])
            ]
        );
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
        // return $request;
        $kunjungan->update($request->all());

        return redirect()->route('kunjungan.show', $kunjungan)->withStatus(__('Kunjungan successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kunjungan  $kunjungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        return redirect()->route('kunjungan.index')->withStatus(__('Kunjungan successfully deleted.'));
    }
}
