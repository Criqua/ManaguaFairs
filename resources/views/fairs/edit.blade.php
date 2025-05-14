@extends('layouts.app')

@section('content')
<div class="bg-slate-800 min-h-screen px-20 py-8">
    <h1 class="text-2xl font-semibold text-gray-100 mb-6">
        Editar Feria
    </h1>

    <form action="#" method="POST"
          class="bg-gray-900 shadow-lg rounded-lg p-6 space-y-6">
        @method('PUT')

        @include('fairs._form')

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