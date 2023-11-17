<?php

namespace App\Http\Controllers;

use App\Biaya;
use App\User;
use App\Rekam;
use App\Kunjungan;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

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
        $bulan = bulan_angka();

        $rekamms =  Rekam::with('kunjungans')->get();
        $rekams = $rekamModel->get(['id', 'no_rm', 'nama']);
        $dokters = $dokterModel->where('role_id', 3)->get(['id', 'name']);

        $data = Kunjungan::select('kunjungans.id', 'kunjungans.created_at', 'kunjungans.shift', 'kunjungans.jaminan', 'rekams.no_rm', 'rekams.nama')
            ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
            ->orderBy('kunjungans.created_at', 'asc')
            ->whereMonth('kunjungans.created_at', $bulan)
            ->get();

        return view('kunjungan.index', compact('data', 'rekams', 'dokters'));
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
        $request['tanggal'] = now();
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
    public function alldata(Kunjungan $kunjungan)
    {
        $data = Kunjungan::select('kunjungans.id', 'kunjungans.created_at', 'kunjungans.shift', 'kunjungans.jaminan', 'rekams.no_rm', 'rekams.nama')
            ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
            ->orderBy('kunjungans.created_at', 'asc')
            ->get();

        // $data = Kunjungan::with('rekams')->get();
        // return $data;
        return view('kunjungan.all', compact('data'));
    }

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

    public function statistik(Kunjungan $kunjungan)
    {
        $kal = CAL_GREGORIAN;
        $bln = bulan_angka();
        $thn = tahun_now();
        $jml_hari = cal_days_in_month($kal, $bln, $thn);

        $labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];

        if ($jml_hari == 31) {
            $labels = $labels;
        } else if ($jml_hari == 30) {
            array_pop($labels);
        } else if ($jml_hari == 29) {
            array_pop($labels);
            array_pop($labels);
        } else if ($jml_hari == 28) {
            array_pop($labels);
            array_pop($labels);
            array_pop($labels);
        }

        $jml = Kunjungan::select(DB::raw('count(*) as jml_kunjungan'), 'tanggal')
            // ->where('tanggal', '=', 1)
            ->groupBy('tanggal')
            ->get();

        // return cuma_tanggal($jml['0']['tanggal']);

        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,];
        // return $data[1];

        for ($i = 0; $i < count($jml); $i++) {
            for ($j = 1; $j <= 31; $j++) {
                if (cuma_tanggal($jml['0']['tanggal']) == $j) {
                    $data[$j] = $jml[$i]['jml_kunjungan'];
                }
            }
        }

        // foreach ($jml as $item) {
        //     array_push($data, $item->jml_kunjungan);
        // }


        // return $data;
        return view('kunjungan.statistik', compact('labels', 'data'));
    }



    public function laporan(Kunjungan $kunjungan)
    {
        // template data regular
        $regular = [
            [
                'jumlah' => 0,
                'poli' => 'home care',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'umum',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'kb',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'gigi',
                'perbulan' => 0,
                'tanggal' => ''
            ]
        ];

        // return $regular;

        // input data regular dimulai
        // input data regular perhari
        $data_regular = Kunjungan::select(DB::raw('count(*) as jumlah'), 'poli', 'tanggal')
            // ->where('tanggal', '=', 1)
            ->groupBy('tanggal')
            ->groupBy('poli')
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->get();

        // return $data_regular;

        // input data regular perbulan
        $data_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->get();

        // return $data_perbulan;

        // memasukkan data perbulan ke data perhari
        for ($i = 0; $i < count($data_perbulan); $i++) {
            $data_regular[$i]['perbulan'] = '';
            for ($j = 0; $j < count($data_regular); $j++) {
                if ($data_perbulan[$i]['poli'] == $data_regular[$j]['poli']) {
                    // $regular[$j] = $data_regular[$i];
                    $data_regular[$j]['perbulan'] = $data_perbulan[$i]['jumlah_perbulan'];
                }
            }
        }

        // return $data_regular;

        // memasukkan data perhari ke template
        for ($i = 0; $i < count($data_regular); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_regular[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j] = $data_regular[$i];
                }
            }
        }

        // return $regular;

        // end input data regular


        // input data bpjs dimulai
        // template data bpjs
        $bpjs = [
            [
                'jumlah' => 0,
                'poli' => 'home care',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'umum',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'kb',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'gigi',
                'perbulan' => 0,
                'tanggal' => ''
            ]
        ];

        // input data bpjs perhari
        $data_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'), 'poli', 'tanggal')
            // ->where('tanggal', '=', 1)
            ->groupBy('tanggal')
            ->groupBy('poli')
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'BPJS')
            ->get();
        // return $data_bpjs;

        // input data perbulan bpjs
        $data_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'BPJS')
            ->get();

        // return $data_perbulan_bpjs;

        // memasukkan data perbulan ke data perhari bpjs
        for ($i = 0; $i < count($data_perbulan_bpjs); $i++) {
            $data_bpjs[$i]['perbulan'] = '';
            for ($j = 0; $j < count($data_bpjs); $j++) {
                if ($data_perbulan_bpjs[$i]['poli'] == $data_bpjs[$j]['poli']) {
                    $data_bpjs[$j]['perbulan'] = $data_perbulan_bpjs[$i]['jumlah_perbulan'];
                }
            }
        }

        // memasukkan data perhari bpjs ke template
        for ($i = 0; $i < count($data_bpjs); $i++) {
            for ($j = 0; $j < count($bpjs); $j++) {
                if ($data_bpjs[$i]['poli'] == $bpjs[$j]['poli']) {
                    $bpjs[$j] = $data_bpjs[$i];
                }
            }
        }
        // return $bpjs;

        $jumlah_perhari = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->first();

        $jumlah_perhari_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();

        $jumlah_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->first();

        $jumlah_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();
        // return $jumlah_perbulan;

        // return count($data_regular);


        // return $data_regular;


        // return $item;
        // return $data_regular;
        return view('kunjungan.laporan', compact('regular', 'jumlah_perhari', 'jumlah_perhari_bpjs', 'jumlah_perbulan', 'jumlah_perbulan_bpjs', 'bpjs'));
    }

    public function laporanCetak()
    {
        $regular = [
            [
                'jumlah' => 0,
                'poli' => 'home care',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'umum',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'kb',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'gigi',
                'perbulan' => 0,
                'tanggal' => ''
            ]
        ];

        // return $regular;

        // input data regular dimulai
        // input data regular perhari
        $data_regular = Kunjungan::select(DB::raw('count(*) as jumlah'), 'poli', 'tanggal')
            // ->where('tanggal', '=', 1)
            ->groupBy('tanggal')
            ->groupBy('poli')
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->get();

        // return $data_regular;

        // input data regular perbulan
        $data_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->get();

        // return $data_perbulan;

        // memasukkan data perbulan ke data perhari
        for ($i = 0; $i < count($data_perbulan); $i++) {
            if ($data_regular == null) {
                $data_regular[0]['perbulan'] = '';
            }
            $data_regular[$i]['perbulan'] = '';
            for ($j = 0; $j < count($data_regular); $j++) {
                if ($data_perbulan[$i]['poli'] == $data_regular[$j]['poli']) {
                    // $regular[$j] = $data_regular[$i];
                    $data_regular[$j]['perbulan'] = $data_perbulan[$i]['jumlah_perbulan'];
                }
            }
        }

        // return $data_regular;

        // memasukkan data perhari ke template
        for ($i = 0; $i < count($data_regular); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_regular[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j] = $data_regular[$i];
                }
            }
        }

        // return $regular;

        // end input data regular


        // input data bpjs dimulai
        // template data bpjs
        $bpjs = [
            [
                'jumlah' => 0,
                'poli' => 'home care',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'umum',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'kb',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'gigi',
                'perbulan' => 0,
                'tanggal' => ''
            ]
        ];

        // input data bpjs perhari
        $data_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'), 'poli', 'tanggal')
            // ->where('tanggal', '=', 1)
            ->groupBy('tanggal')
            ->groupBy('poli')
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'BPJS')
            ->get();
        // return $data_bpjs;

        // input data perbulan bpjs
        $data_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'BPJS')
            ->get();

        // return $data_perbulan_bpjs;

        // memasukkan data perbulan ke data perhari bpjs
        for ($i = 0; $i < count($data_perbulan_bpjs); $i++) {
            $data_bpjs[$i]['perbulan'] = '';
            for ($j = 0; $j < count($data_bpjs); $j++) {
                if ($data_perbulan_bpjs[$i]['poli'] == $data_bpjs[$j]['poli']) {
                    $data_bpjs[$j]['perbulan'] = $data_perbulan_bpjs[$i]['jumlah_perbulan'];
                }
            }
        }

        // memasukkan data perhari bpjs ke template
        for ($i = 0; $i < count($data_bpjs); $i++) {
            for ($j = 0; $j < count($bpjs); $j++) {
                if ($data_bpjs[$i]['poli'] == $bpjs[$j]['poli']) {
                    $bpjs[$j] = $data_bpjs[$i];
                }
            }
        }
        // return $bpjs;

        $jumlah_perhari = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->first();

        $jumlah_perhari_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();

        $jumlah_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'regular')
            ->first();

        $jumlah_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();
        // return $jumlah_perbulan;


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('kunjungan.cetakLaporan', ['regular' => $regular, 'jumlah_perhari' => $jumlah_perhari, 'jumlah_perhari_bpjs' => $jumlah_perhari_bpjs, 'jumlah_perbulan' => $jumlah_perbulan, 'jumlah_perbulan_bpjs' => $jumlah_perbulan_bpjs, 'bpjs' => $bpjs])->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        // return PDF::loadFile(public_path() . '/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
    }

    public function laporanKeuangan(Kunjungan $kunjungan, Biaya $biaya)
    {
        $regular = [
            [
                'jumlah' => 0,
                'poli' => 'home care',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'umum',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'kb',
                'perbulan' => 0,
                'tanggal' => ''
            ],
            [
                'jumlah' => 0,
                'poli' => 'gigi',
                'perbulan' => 0,
                'tanggal' => ''
            ]
        ];

        $data_regular = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as jumlah'), 'tanggal', 'poli')
            ->groupBy('kunjungans.tanggal')
            ->groupBy('kunjungans.poli')
            ->where('kunjungans.jaminan', 'regular')
            ->where('kunjungans.tanggal', tanggal(now()))
            ->get();

        // return $data_regular;

        for ($i = 0; $i < count($regular); $i++) {
            for ($j = 0; $j < count($data_regular); $j++) {
                if ($regular[$i]['poli'] == $data_regular[$j]['poli']) {
                    $regular[$i] = $data_regular[$j];
                }
            }
        }

        // return $regular;

        $data_perbulan = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as perbulan'), 'poli')
            ->groupBy('kunjungans.poli')
            ->where('kunjungans.jaminan', 'regular')
            ->whereMonth('kunjungans.tanggal', bulan_angka())
            ->get();

        // return $data_perbulan;

        for ($i = 0; $i < count($regular); $i++) {
            for ($j = 0; $j < count($data_perbulan); $j++) {
                if ($regular[$i]['poli'] == $data_perbulan[$j]['poli']) {
                    $regular[$i]['perbulan'] = $data_perbulan[$j]['perbulan'];
                }
            }
        }

        // return $data_regular;
        // return $regular;

        // $biaya = $biaya->select('*')
        //     ->with('kunjungans')
        //     ->whereDay('kunjungans.tanggal', tanggal_now())
        //     ->get();

        // return $biaya;
        $jumlah_perhari = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as total_perhari'))
            ->where('kunjungans.jaminan', 'regular')
            ->whereDay('kunjungans.tanggal', cuma_tanggal(now()))
            ->get()->first();

        // return $jumlah_perhari;

        $jumlah_perbulan = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as total_perbulan'))
            ->where('kunjungans.jaminan', 'regular')
            ->whereMonth('kunjungans.tanggal', bulan_angka())
            ->get()->first();



        return view('kunjungan.laporanKeuangan', compact('regular', 'jumlah_perbulan', 'jumlah_perhari'));
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

        // foreach ($biaya as $item) {
        //     $total = $item->adm + $item->obat + $item->tuslah + $item->jasa_dokter + $item->injeksi + $item->jasa_tindakan + $item->bahp + $item->lab + $item->pasang_infus + $item->cairan_infus + $item->akomodasi + $item->jasa_perawat + $item->diit + $item->lain_lain + $item->pembulat;
        // }

        // return $total;
        // return $biaya;
        return view('kunjungan.Printbiaya', compact('kunjungan', 'biaya', 'id'));
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

        return redirect()->route('kunjungan.index', $kunjungan)->withStatus(__('Kunjungan successfully updated.'));
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
