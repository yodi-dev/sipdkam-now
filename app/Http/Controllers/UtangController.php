<?php

namespace App\Http\Controllers;

use App\Utang;
use Illuminate\Http\Request;

class UtangController extends Controller
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

    public function index(Utang $data)
    {
        $this->authorize('manage-items', User::class);
        return view('utang.index', ['data' => $data->all()]);
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
     * @param  \App\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function show(Utang $utang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function edit(Utang $utang)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Utang  $utang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utang $utang)
    {
        //
    }
}
