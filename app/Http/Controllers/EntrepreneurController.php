<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use App\Models\Fair;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    public function index(Request $request)
    {
        $query = Entrepreneur::query();

        if ($request->has('fair_id')) {
            $query->whereHas('fairs', function ($q) use ($request) {
                $q->where('fair_id', $request->fair_id);
            });
        }

        $entrepreneurs = $query->with('fairs')->get();

        return view('entrepreneurs.index', compact('entrepreneurs'));
    }

    public function create()
    {
        $fairs = Fair::all();
        return view('entrepreneurs.create', compact('fairs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:50',
            'category'    => 'required|string|max:255',
            'fairs'       => 'sometimes|array',
            'fairs.*'     => 'exists:fairs,id',
        ]);

        $entrepreneur = Entrepreneur::create([
            'name'        => $data['name'],
            'phone'       => $data['phone'],
            'category'    => $data['category'],
        ]);

        if (! empty($data['fairs'])) {
            $entrepreneur->fairs()->sync($data['fairs']);
        }

        return redirect()->route('entrepreneurs.index');
    }

    public function show(Entrepreneur $entrepreneur)
    {
        return view('entrepreneurs.show', compact('entrepreneur'));
    }

    public function edit(Entrepreneur $entrepreneur)
    {
        $fairs = Fair::all();
        return view('entrepreneurs.edit', compact('entrepreneur', 'fairs'));
    }

    public function update(Request $request, Entrepreneur $entrepreneur)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'phone'       => 'required|string|max:20',
            'category'    => 'required|string|max:50',
            'fairs'       => 'sometimes|array',
            'fairs.*'     => 'exists:fairs,id',
        ], [
            'name.required'     => 'El nombre del emprendedor es obligatorio.',
            'name.max'          => 'El nombre no debe exceder los 150 caracteres.',
            'phone.required'    => 'El teléfono es obligatorio.',
            'phone.max'         => 'El teléfono no debe exceder los 20 caracteres.',
            'category.required' => 'El rubro es obligatorio.',
            'category.max'      => 'El rubro no debe exceder los 50 caracteres.',
        ]);

        $entrepreneur->update([
            'name'        => $data['name'],
            'phone'       => $data['phone'],
            'category'    => $data['category'],
        ]);

        if (! empty($data['fairs'])) {
            $entrepreneur->fairs()->sync($data['fairs']);
        }

        return redirect()->route('entrepreneurs.index');
    }

    public function destroy(Entrepreneur $entrepreneur)
    {
        $entrepreneur->delete();
        return redirect()->route('entrepreneurs.index');
    }
}
