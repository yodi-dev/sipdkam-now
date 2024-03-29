<?php

namespace App\Http\Controllers;

use App\User;
use App\Biaya;
use App\Rekam;
use App\Kunjungan;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

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

        $data = Kunjungan::select('kunjungans.id', 'kunjungans.created_at', 'kunjungans.shift', 'kunjungans.jaminan', 'rekams.no_rm', 'rekams.nama', 'tanggal')
            ->Join('rekams', 'kunjungans.rekam_id', '=', 'rekams.id')
            ->orderBy('kunjungans.tanggal', 'asc')
            ->whereMonth('kunjungans.tanggal', $bulan)
            ->get();

        // $rekam = DB::table('rekams')
        //     ->select('no_rm')
        //     ->get()->toArray();

        // $random = Arr::random($rekam);

        // return strval($random->no_rm);

        return view('kunjungan.index', compact('data', 'rekams', 'dokters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rekam $rekamModel, User $userModel)
    {
        $shift = shift();
        $data_dokter = Kunjungan::get_jadwal_dokter();

        // return $data_dokter;

        // return $shift;
        return view('kunjungan.create', [
            'rekams' => $rekamModel->get(['id', 'no_rm', 'nama']),
            'dokters' => $userModel->where('role_id', 3)->get(['id', 'name']),
            'jadwal_dokter' => $data_dokter,
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
            ->whereMonth('tanggal', bulan_angka())
            ->get();

        // return $jml;

        // return cuma_tanggal($jml['0']['tanggal']);

        $data = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,];
        // return $data[1];

        for ($i = 0; $i < count($jml); $i++) {
            for ($j = 1; $j <= count($data); $j++) {
                if (cuma_tanggal($jml[$i]['tanggal']) == $j) {
                    $data[$j - 1] = $jml[$i]['jml_kunjungan'];
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
            ->where('jaminan', 'reguler')
            ->get();

        // return $data_regular;

        // memasukkan data perhari ke template
        for ($i = 0; $i < count($data_regular); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_regular[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j] = $data_regular[$i];
                }
            }
        }

        // return $data_regular;

        // input data regular perbulan
        $data_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->get();

        // return $data_perbulan;

        // memasukkan data perbulan ke data regular
        for ($i = 0; $i < count($data_perbulan); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_perbulan[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j]['perbulan'] = $data_perbulan[$i]['jumlah_perbulan'];
                }
            }
        }

        // return $data_regular;



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

        // memasukkan data perhari bpjs ke template
        for ($i = 0; $i < count($data_bpjs); $i++) {
            for (
                $j = 0;
                $j < count($bpjs);
                $j++
            ) {
                if (
                    $data_bpjs[$i]['poli'] == $bpjs[$j]['poli']
                ) {
                    $bpjs[$j] = $data_bpjs[$i];
                }
            }
        }
        // return $bpjs;

        // input data perbulan bpjs
        $data_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'BPJS')
            ->get();

        // return $data_perbulan_bpjs;

        // memasukkan data perbulan ke data perhari bpjs
        for ($i = 0; $i < count($data_perbulan_bpjs); $i++) {
            for ($j = 0; $j < count($bpjs); $j++) {
                if ($data_perbulan_bpjs[$i]['poli'] == $bpjs[$j]['poli']) {
                    $bpjs[$j]['perbulan'] = $data_perbulan_bpjs[$i]['jumlah_perbulan'];
                }
            }
        }


        $jumlah_perhari = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->first();

        $jumlah_perhari_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();

        $jumlah_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
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
            ->where('jaminan', 'reguler')
            ->get();

        // memasukkan data perhari ke template
        for ($i = 0; $i < count($data_regular); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_regular[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j] = $data_regular[$i];
                }
            }
        }

        // return $data_regular;

        // input data regular perbulan
        $data_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->get();

        // return $data_perbulan;

        // memasukkan data perbulan ke data regular
        for ($i = 0; $i < count($data_perbulan); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_perbulan[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j]['perbulan'] = $data_perbulan[$i]['jumlah_perbulan'];
                }
            }
        }

        // return $data_regular;



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

        // memasukkan data perhari bpjs ke template
        for ($i = 0; $i < count($data_bpjs); $i++) {
            for (
                $j = 0;
                $j < count($bpjs);
                $j++
            ) {
                if (
                    $data_bpjs[$i]['poli'] == $bpjs[$j]['poli']
                ) {
                    $bpjs[$j] = $data_bpjs[$i];
                }
            }
        }
        // return $bpjs;

        // input data perbulan bpjs
        $data_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'BPJS')
            ->get();

        // return $data_perbulan_bpjs;

        // memasukkan data perbulan ke data perhari bpjs
        for ($i = 0; $i < count($data_perbulan_bpjs); $i++) {
            for ($j = 0; $j < count($bpjs); $j++) {
                if ($data_perbulan_bpjs[$i]['poli'] == $bpjs[$j]['poli']) {
                    $bpjs[$j]['perbulan'] = $data_perbulan_bpjs[$i]['jumlah_perbulan'];
                }
            }
        }

        $jumlah_perhari = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->first();

        $jumlah_perhari_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();

        $jumlah_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->first();

        $jumlah_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();
        // return $jumlah_perbulan;


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView(
            'kunjungan.cetakLaporan',
            ['regular' => $regular, 'jumlah_perhari' => $jumlah_perhari, 'jumlah_perhari_bpjs' => $jumlah_perhari_bpjs, 'jumlah_perbulan' => $jumlah_perbulan, 'jumlah_perbulan_bpjs' => $jumlah_perbulan_bpjs, 'bpjs' => $bpjs]
        )
            ->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        // return PDF::loadFile(public_path() . '/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
    }

    public function laporanKeuanganCetak()
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
            ->where('jaminan', 'reguler')
            ->get();

        // memasukkan data perhari ke template
        for ($i = 0; $i < count($data_regular); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_regular[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j] = $data_regular[$i];
                }
            }
        }

        // return $data_regular;

        // input data regular perbulan
        $data_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->get();

        // return $data_perbulan;

        // memasukkan data perbulan ke data regular
        for ($i = 0; $i < count($data_perbulan); $i++) {
            for ($j = 0; $j < count($regular); $j++) {
                if ($data_perbulan[$i]['poli'] == $regular[$j]['poli']) {
                    $regular[$j]['perbulan'] = $data_perbulan[$i]['jumlah_perbulan'];
                }
            }
        }

        // return $data_regular;



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

        // memasukkan data perhari bpjs ke template
        for ($i = 0; $i < count($data_bpjs); $i++) {
            for (
                $j = 0;
                $j < count($bpjs);
                $j++
            ) {
                if (
                    $data_bpjs[$i]['poli'] == $bpjs[$j]['poli']
                ) {
                    $bpjs[$j] = $data_bpjs[$i];
                }
            }
        }
        // return $bpjs;

        // input data perbulan bpjs
        $data_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah_perbulan'), 'poli')
            ->groupBy('poli')
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'BPJS')
            ->get();

        // return $data_perbulan_bpjs;

        // memasukkan data perbulan ke data perhari bpjs
        for ($i = 0; $i < count($data_perbulan_bpjs); $i++) {
            for ($j = 0; $j < count($bpjs); $j++) {
                if ($data_perbulan_bpjs[$i]['poli'] == $bpjs[$j]['poli']) {
                    $bpjs[$j]['perbulan'] = $data_perbulan_bpjs[$i]['jumlah_perbulan'];
                }
            }
        }

        $jumlah_perhari = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->first();

        $jumlah_perhari_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereDay('tanggal', tanggal_now())
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();

        $jumlah_perbulan = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'reguler')
            ->first();

        $jumlah_perbulan_bpjs = Kunjungan::select(DB::raw('count(*) as jumlah'))
            ->whereMonth('tanggal', bulan_angka())
            ->where('jaminan', 'bpjs')
            ->first();
        // return $jumlah_perbulan;

        return view('kunjungan.Print_laporan_keuangan', compact('regular', 'jumlah_perhari', 'jumlah_perbulan', 'bpjs', 'jumlah_perhari_bpjs', 'jumlah_perbulan_bpjs'));



        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView(
            'kunjungan.cetakLaporan',
            ['regular' => $regular, 'jumlah_perhari' => $jumlah_perhari, 'jumlah_perhari_bpjs' => $jumlah_perhari_bpjs, 'jumlah_perbulan' => $jumlah_perbulan, 'jumlah_perbulan_bpjs' => $jumlah_perbulan_bpjs, 'bpjs' => $bpjs]
        )
            ->setPaper('a4', 'portrait');
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
            ->where('kunjungans.jaminan', 'reguler')
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
            ->where('kunjungans.jaminan', 'reguler')
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

        $data_bpjs = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as jumlah'), 'tanggal', 'poli')
            ->groupBy('kunjungans.tanggal')
            ->groupBy('kunjungans.poli')
            ->where('kunjungans.jaminan', 'bpjs')
            ->where('kunjungans.tanggal', tanggal(now()))
            ->get();

        for ($i = 0; $i < count($bpjs); $i++) {
            for ($j = 0; $j < count($data_bpjs); $j++) {
                if ($bpjs[$i]['poli'] == $data_bpjs[$j]['poli']) {
                    $bpjs[$i] = $data_bpjs[$j];
                }
            }
        }

        $data_perbulan_bpjs = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as perbulan'), 'poli')
            ->groupBy('kunjungans.poli')
            ->where('kunjungans.jaminan', 'bpjs')
            ->whereMonth('kunjungans.tanggal', bulan_angka())
            ->get();

        // return $data_perbulan_bpjs;

        for ($i = 0; $i < count($bpjs); $i++) {
            for ($j = 0; $j < count($data_perbulan_bpjs); $j++) {
                if ($bpjs[$i]['poli'] == $data_perbulan_bpjs[$j]['poli']) {
                    $bpjs[$i]['perbulan'] = $data_perbulan_bpjs[$j]['perbulan'];
                }
            }
        }


        // return $biaya;
        $jumlah_perhari = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as total_perhari'))
            ->where('kunjungans.jaminan', 'reguler')
            ->whereDay('kunjungans.tanggal', cuma_tanggal(now()))
            ->get()->first();

        $jumlah_perhari_bpjs = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as total_perhari'))
            ->where('kunjungans.jaminan', 'bpjs')
            ->whereDay('kunjungans.tanggal', cuma_tanggal(now()))
            ->get()->first();

        // return $jumlah_perhari;

        $jumlah_perbulan = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as total_perbulan'))
            ->where('kunjungans.jaminan', 'reguler')
            ->whereMonth('kunjungans.tanggal', bulan_angka())
            ->get()->first();

        $jumlah_perbulan_bpjs = $kunjungan->rightJoin('biayas', 'kunjungans.biaya_id', '=', 'biayas.id')
            ->select(DB::raw('sum(total) as total_perbulan'))
            ->where('kunjungans.jaminan', 'bpjs')
            ->whereMonth('kunjungans.tanggal', bulan_angka())
            ->get()->first();



        return view('kunjungan.laporanKeuangan', compact('regular', 'bpjs', 'jumlah_perbulan', 'jumlah_perbulan_bpjs',  'jumlah_perhari',  'jumlah_perhari_bpjs'));
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
            // ->whereNotNull('updated_at')
            ->where('biayas.id', $id)
            ->get();


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
