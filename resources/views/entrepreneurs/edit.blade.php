@extends('layouts.app')

@section('content')
<div class="bg-slate-800 min-h-screen px-20 py-8">
  <h1 class="text-2xl font-semibold text-gray-100 mb-6">
    Editar Emprendedor
  </h1>

  <form action="#" method="POST" class="bg-gray-900 shadow-lg rounded-lg p-6 space-y-6">
    @csrf
    @method('PUT')

    <div class="space-y-4">
      <div>
        <label class="block text-gray-300 mb-1">Nombre</label>
        <input type="text" name="nombre"
               value="Juan Pérez"
               class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2"/>
      </div>

      <div>
        <label class="block text-gray-300 mb-1">Teléfono</label>
        <input type="text" name="telefono"
               value="8888-1234"
               class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2"/>
      </div>

      <div>
        <label class="block text-gray-300 mb-1">Rubro</label>
        <input type="text" name="rubro"
               value="Artesanías"
               class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2"/>
      </div>

      <div>
        <label class="block text-gray-300 mb-1">Ferias</label>
        <select name="ferias[]" multiple
                class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2">
          <option value="1" selected>Feria de Artesanías</option>
          <option value="2" selected>Feria de Comida</option>
          <option value="3">Feria de Tecnología</option>
        </select>
      </div>
    </div>

    <div class="flex items-center justify-end gap-2">
      <button type="submit"
              class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-500 transition">
        Actualizar
      </button>
      <a href="#"
         class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-500 transition">
        Cancelar
      </a>
    </div>
  </form>
</div>
@endsection
