<?php

namespace App\Http\Controllers;

use App\Inventori;
use App\User;
use Illuminate\Http\Request;

class InventoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Inventori::class);
    }

    public function index(Inventori $data)
    {
        $this->authorize('manage-items', User::class);
        return view('inventori.index', ['data' => $data->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inventori $model)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());
        // return $request;

        return redirect()->route('inventori.index')->withStatus(__('Inventori successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Http\Response
     */
    public function show(Inventori $inventori)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventori $inventori)
    {
        return view('inventori.edit', compact('inventori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventori $inventori)
    {
        $inventori->update($request->all());

        return redirect()->route('inventori.index')->withStatus(__('Inventori successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventori $inventori)
    {
        $inventori->delete();

        return redirect()->route('inventori.index')->withStatus(__('Inventori successfully deleted.'));
    }
}
