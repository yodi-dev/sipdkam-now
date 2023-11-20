<?php

namespace App\Http\Controllers;

use App\Utang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Utang::class);
    }

    public function index(Utang $utang)
    {
        $this->authorize('manage-items', User::class);
        $bulan = bulan_angka();
        // return $bulan;

        $data = Utang::whereMonth('tanggal', $bulan)->get();
        // return $data;


        return view('utang.index', compact('data', 'bulan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('utang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Utang $model)
    {
        // return $request;
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());
        // return $request;

        return redirect()->route('utang.index')->withStatus(__('Utang successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function alldata(Utang $utang)
    {
        // return $utang->all();
        return view('utang.show', ['data' => $utang->all()]);
    }

    public function show(Utang $utang)
    {
        // return $utang;
        // return view('utang.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function edit(Utang $utang)
    {
        return view('utang.edit', compact('utang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utang $utang)
    {
        $utang->update($request->all());

        return redirect()->route('utang.index')->withStatus(__('Utang successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utang $utang)
    {
        $utang->delete();

        return redirect()->route('utang.index')->withStatus(__('Utang successfully deleted.'));
    }
}
