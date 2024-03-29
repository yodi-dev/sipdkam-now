<?php

namespace App\Http\Controllers;

use App\Alatmedis;
use Illuminate\Http\Request;

class AlatmedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Alatmedis::class);
    }

    public function index(Alatmedis $data)
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
    public function store(Request $request, Alatmedis $model)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());
        // return $request;

        return redirect()->route('alatmedis.index')->withStatus(__('Alat Medis successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alatmedis  $alatmedis
     * @return \Illuminate\Http\Response
     */
    public function show(Alatmedis $alatmedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alatmedis  $alatmedis
     * @return \Illuminate\Http\Response
     */
    public function edit(Alatmedis $alatmedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alatmedis  $alatmedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alatmedis $alatmedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alatmedis  $alatmedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alatmedis $alatmedis)
    {
        //
    }
}
