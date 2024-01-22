<?php

namespace App\Http\Controllers;

use App\Imports\JadwalsImport;
use App\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Jadwal::class);
    }

    public function index(Jadwal $jadwal)
    {
        $this->authorize('manage-items', User::class);

        // $jadwal = DB::table('jadwals')
        //     ->select('*')
        //     ->whereMonth('tanggal', bulan_angka())
        //     ->get();

        // return $jadwal;

        $jadwal = $jadwal
            ->whereMonth('tanggal', bulan_angka())
            ->get();

        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shift = shift();
        return view('jadwal.create', compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Jadwal $model)
    {
        // return $request;

        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());
        // return $request;

        return redirect()->route('jadwal.index')->withStatus(__('Jadwal successfully created.'));
    }

    public function import_jadwal(Request $request)
    {
        // return $request;
        // Validate the uploaded file
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);

        // Get the uploaded file
        // $file = $request->file('file');

        // Process the Excel file

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_jadwal', $nama_file);

        // import data
        Excel::import(new JadwalsImport, public_path('/file_jadwal/' . $nama_file));

        // Excel::import(new JadwalsImport, $request->file);
        return redirect()->route('jadwal.index')->withStatus(__('Excel file imported successfully!'));
        // return redirect()->back()->with('success', 'Excel file imported successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->withStatus(__('Jadwal successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')->withStatus(__('Jadwal successfully deleted.'));
    }
}
