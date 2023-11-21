<?php

namespace App\Http\Controllers;

use App\Imports\JadwalsImport;
use App\Jadwal;
use Illuminate\Http\Request;
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

        $jadwal = $jadwal->all();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal.create');
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
        return $request;
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Process the Excel file
        Excel::import(new JadwalsImport, $file);

        return redirect()->back()->with('success', 'Excel file imported successfully!');
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
