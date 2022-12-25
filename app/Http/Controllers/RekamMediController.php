<?php

namespace App\Http\Controllers;

use App\User;
use App\RekamMedi;
use Illuminate\Http\Request;

class RekamMediController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(RekamMedi::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(RekamMedi $model)
    {
        $this->authorize('manage-users', User::class);

        return view('rms.index', ['rekammedis' => $model->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RekamMedi $model)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());
        // return $request;
        return redirect()->route('rekammedis.index')->withStatus(__('Rekam Medis successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RekamMedi  $rekamMedi
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedi $rekamMedi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RekamMedi  $rekamMedi
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedi $rekamMedi)
    {
        return view('rms.edit', compact('rekamMedi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RekamMedi  $rekamMedi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedi $rekamMedi)
    {
        $rekamMedi->update($request->all());

        return redirect()->route('rekammedis.index')->withStatus(__('Rekam Medis successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RekamMedi  $rekamMedi
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedi $rekamMedi)
    {
        // return $rekamMedi;
        $rekamMedi->delete();

        return redirect()->route('rekammedis.index')->withStatus(__('Rekam Medis successfully deleted.'));
    }
}
