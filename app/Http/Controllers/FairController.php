<?php

namespace App\Http\Controllers;

use App\Models\Fair;
use App\Models\Entrepreneur;
use Illuminate\Http\Request;

class FairController extends Controller
{
    public function index()
    {
        $fairs = Fair::with('entrepreneurs')->get();
        return view('fairs.index', compact('fairs'));
    }

    public function create()
    {
        $entrepreneurs = Entrepreneur::all(); // Necesario para el select múltiple
        return view('fairs.create', compact('entrepreneurs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:150',
            'event_date'    => 'required|date',
            'location'      => 'required|string|max:255',
            'description'   => 'nullable|string',
            'entrepreneurs' => 'sometimes|array',
            'entrepreneurs.*' => 'exists:entrepreneurs,id',
        ], [
            'name.required'            => 'El nombre de la feria es obligatorio.',
            'name.max'                 => 'El nombre no debe exceder los 150 caracteres.',
            'event_date.required'      => 'La fecha del evento es obligatoria.',
            'event_date.date'          => 'La fecha del evento debe ser una fecha válida.',
            'location.required'        => 'El lugar es obligatorio.',
            'location.max'             => 'El lugar no debe exceder los 255 caracteres.',
        ]);

        if (!empty($data['entrepreneurs'])) {
            $fair->entrepreneurs()->sync($data['entrepreneurs']);
        }

        return redirect()->route('fairs.index');
    }

    public function show(Fair $fair)
    {
        $fair->load('entrepreneurs');
        return view('fairs.show', compact('fair'));
    }

    public function edit(Fair $fair)
    {
        $entrepreneurs = Entrepreneur::all();
        return view('fairs.edit', compact('fair', 'entrepreneurs'));
    }

    public function update(Request $request, Fair $fair)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'event_date'    => 'required|date',
            'location'      => 'required|string|max:255',
            'description'   => 'nullable|string',
            'entrepreneurs' => 'sometimes|array',
            'entrepreneurs.*' => 'exists:entrepreneurs,id',
        ]);

        $fair->update([
            'name'        => $data['name'],
            'event_date'  => $data['event_date'],
            'location'    => $data['location'],
            'description' => $data['description'] ?? null,
        ]);

        $fair->entrepreneurs()->sync($data['entrepreneurs'] ?? []);

        return redirect()->route('fairs.index')->with('success', 'Feria actualizada correctamente.');
    }

    public function destroy(Fair $fair)
    {
        $fair->delete();
        return redirect()->route('fairs.index');
    }
}
