<?php

namespace App\Http\Controllers;

use App\Rekam;
use Illuminate\Http\Request;

class RekamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Rekam::class);
    }

    public function index(Rekam $model)
    {

        $this->authorize('manage-users', User::class);

        return view('rekam.index', ['rekams' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Rekam $model)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());
        // return $request;
        return redirect()->route('rekam.index')->withStatus(__('Rekam Medis successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function show(Rekam $rekam)
    {
        return view('rekam.show', compact('rekam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekam $rekam)
    {
        return view('rekam.edit', compact('rekam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekam $rekam)
    {
        $rekam->update($request->all());

        return redirect()->route('rekam.index')->withStatus(__('Rekam Medis successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rekam  $rekam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekam $rekam)
    {
        $rekam->delete();

        return redirect()->route('rekam.index')->withStatus(__('Rekam Medis successfully deleted.'));
    }
}
