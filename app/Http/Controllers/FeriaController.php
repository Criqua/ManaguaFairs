<?php

namespace App\Http\Controllers;

use App\Models\Emprendedor;
use App\Models\Feria;
use Illuminate\Http\Request;

class EmprendedorController extends Controller
{
    public function index(Request $request)
    {
        $query = Emprendedor::query();

        if ($request->has('feria_id')) {
            $query->whereHas('ferias', function ($q) use ($request) {
                $q->where('feria_id', $request->feria_id);
            });
        }

        $emprendedores = $query->with('ferias')->get();
        return view('emprendedores.index', compact('emprendedores'));
    }

    public function create()
    {
        $ferias = Feria::all();
        return view('emprendedores.create', compact('ferias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'rubro' => 'required',
            'descripcion' => 'nullable',
            'contacto' => 'required',
            'ferias' => 'array',
        ]);

        $emprendedor = Emprendedor::create($data);
        $emprendedor->ferias()->sync($data['ferias']);

        return redirect()->route('emprendedores.index');
    }

    public function show(Emprendedor $emprendedor)
    {
        return view('emprendedores.show', compact('emprendedor'));
    }

    public function edit(Emprendedor $emprendedor)
    {
        $ferias = Feria::all();
        return view('emprendedores.edit', compact('emprendedor', 'ferias'));
    }

    public function update(Request $request, Emprendedor $emprendedor)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'rubro' => 'required',
            'descripcion' => 'nullable',
            'contacto' => 'required',
            'ferias' => 'array',
        ]);

        $emprendedor->update($data);
        $emprendedor->ferias()->sync($data['ferias']);

        return redirect()->route('emprendedores.index');
    }

    public function destroy(Emprendedor $emprendedor)
    {
        $emprendedor->delete();
        return redirect()->route('emprendedores.index');
    }
}
