<?php

namespace App\Http\Controllers;

use App\Alatmedis;
use Illuminate\Http\Request;

class AlatMedisController extends Controller
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

    public function index()
    {
        $this->authorize('manage-items', User::class);

        return view('alatmedis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
