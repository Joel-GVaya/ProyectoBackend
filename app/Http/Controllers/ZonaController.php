<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function index()
    {
        $zonas = Zona::all();
        return view('zonas.index', compact('zonas'));
    }

    public function create()
    {
        return view('zonas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:zonas',
            'descripcion' => 'nullable|string',
        ]);

        Zona::create($request->all());
        return redirect()->route('zonas.index')->with('success', 'Zona creada con éxito.');
    }

    public function edit(Zona $zona)
    {
        return view('zonas.edit', compact('zona'));
    }

    public function update(Request $request, Zona $zona)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:zonas,nombre,' . $zona->id,
            'descripcion' => 'nullable|string',
        ]);

        $zona->update($request->all());
        return redirect()->route('zonas.index')->with('success', 'Zona actualizada con éxito.');
    }

    public function destroy(Zona $zona)
    {
        $zona->delete();
        return redirect()->route('zonas.index')->with('success', 'Zona eliminada con éxito.');
    }
}
