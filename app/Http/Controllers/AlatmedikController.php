<?php

namespace App\Http\Controllers;

use App\Alatmedik;
use Illuminate\Http\Request;

class AlatmedikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Alatmedik::class);
    }

    public function index(Alatmedik $data)
    {
        $this->authorize('manage-items', User::class);

        return view('alatmedis.index', ['data' => $data->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alatmedis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Alatmedik $model)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());
        // return $request;

        return redirect()->route('alatmedik.index')->withStatus(__('Alat Medis successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Http\Response
     */
    public function show(Alatmedik $alatmedik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Http\Response
     */
    public function edit(Alatmedik $alatmedik)
    {
        return view('alatmedis.edit', compact('alatmedik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alatmedik $alatmedik)
    {
        $alatmedik->update($request->all());

        return redirect()->route('alatmedik.index')->withStatus(__('Alat Medis successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alatmedik $alatmedik)
    {
        $alatmedik->delete();

        return redirect()->route('alatmedik.index')->withStatus(__('Alat Medis successfully deleted.'));
    }
}
