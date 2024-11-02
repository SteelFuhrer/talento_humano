<?php

namespace App\Http\Controllers;

use App\Models\Ctipoes;
use Illuminate\Http\Request;

class CtipoesController extends Controller
{
    public function index()
    {
        $ctipoes = Ctipoes::all();
        return view('ctipoes.index', compact('ctipoes'));
    }

    public function create()
    {
        return view('ctipoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipoes' => 'required|min:5',
        ]);

        Ctipoes::create($request->all());

        return redirect()->route('ctipoes.index')->with('success', 'Tipo creado correctamente.');
    }

    public function show(Ctipoes $ctipoe)
    {
        return view('ctipoes.show', compact('ctipoe'));
    }

    public function edit($id)
    {
        
        $ctipoe = Ctipoes::findOrFail($id);
        return view('ctipoes.edit', compact('ctipoe'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'tipoes' => 'required|min:10|max:100',
        ]);

        
        $ctipoe = Ctipoes::findOrFail($id);

       
        $ctipoe->update($request->all());

        return redirect()->route('ctipoes.index')->with('success', 'Tipo actualizado correctamente.');
    }

    public function destroy($id)
    {
        
        $ctipoe = Ctipoes::findOrFail($id);
        
       
        $ctipoe->delete();

        return redirect()->route('ctipoes.index')->with('success', 'Tipo eliminado correctamente.');
    }
}
