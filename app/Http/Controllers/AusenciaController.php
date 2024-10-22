<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ausencia;

class AusenciaController extends Controller
{
    public function index()
    {
        $ausencias = Ausencia::all();
        return view('ausencias.index', compact('ausencias'));
    }

    public function create()
    {
        return view('ausencias.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'tipoausencia' => 'required|string|max:255',
        ]);

        Ausencia::create($request->all());

        return redirect()->back()->with('success', 'Tipo de ausencia guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ausencia  $ausencia
     * @return \Illuminate\Http\Response
     */
    public function show(Ausencia $ausencia)
    {
        return view('ausencias.show', compact('ausencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ausencia  $ausencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Ausencia $ausencia)
    {
        return view('ausencias.edit', compact('ausencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ausencia  $ausencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ausencia $ausencia)
    {
        $request->validate([
            'tipoausencia' => 'required|string|max:255',
        ]);

        $ausencia->update($request->all());

        return redirect()->route('ausencias.index')->with('success', 'Ausencia actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ausencia  $ausencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ausencia $ausencia)
    {
        $ausencia->delete();

        return redirect()->route('ausencias.index')->with('success', 'Ausencia eliminada exitosamente.');
    }
}
