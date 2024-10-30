<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cmotivopase;

class CmotivopaseController extends Controller
{
    public function index()
    {
        $cmotivopases = cmotivopase::all();
        return view('cmotivopases.index', compact('cmotivopases'));
    }

    public function create()
    {
        return view('cmotivopases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'motivopase' => 'required|string|max:255|min:10',
        ]);

        cmotivopase::create($request->all());

        return redirect()->route('cmotivopases.index')->with('success', 'Motivo Pase creado exitosamente.');
    }

    public function show(cmotivopase $cmotivopase)
    {
        return view('cmotivopases.show', compact('cmotivopase'));
    }

    public function edit(cmotivopase $cmotivopase)
    {
        return view('cmotivopases.edit', compact('cmotivopase'));
    }

    public function update(Request $request, cmotivopase $cmotivopase)
    {
        $request->validate([
            'motivopase' => 'required|string|max:255|min:10',
        ]);

        $cmotivopase->update($request->all());

        return redirect()->route('cmotivopases.index')->with('success', 'Motivo Pase actualizado exitosamente.');
    }

    public function destroy(cmotivopase $cmotivopase)
    {
        $cmotivopase->delete();

        return redirect()->route('cmotivopases.index')->with('success', 'Motivo Pase eliminado exitosamente.');
    }
}
