<?php

namespace App\Http\Controllers;

use App\Alatmedik;
use Illuminate\Http\Request;

class AlatmedikController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Alatmedik::class);
    }

    public function index(Alatmedik $data)
    {
        $this->authorize('manage-items', User::class);

        return view('alatmedis.index', ['data' => $data->all()]);
    }

    public function create()
    {
        return view('alatmedis.create');
    }

    public function store(Request $request, Alatmedik $model)
    {
        $request['created_at'] = now();
        $request['updated_at'] = now();
        $model->create($request->all());

        return redirect()->route('alatmedik.index')->withStatus(__('Alat Medis successfully created.'));
    }

    public function show(Alatmedik $alatmedik)
    {
        //
    }

    public function edit(Alatmedik $alatmedik)
    {
        return view('alatmedis.edit', compact('alatmedik'));
    }

    public function update(Request $request, Alatmedik $alatmedik)
    {
        $alatmedik->update($request->all());

        return redirect()->route('alatmedik.index')->withStatus(__('Alat Medis successfully updated.'));
    }

    public function destroy(Alatmedik $alatmedik)
    {
        $alatmedik->delete();

        return redirect()->route('alatmedik.index')->withStatus(__('Alat Medis successfully deleted.'));
    }
}
