@extends('layouts.app')

@section('content')
<div class="bg-slate-800 min-h-screen px-20 py-8">
    <h1 class="text-2xl font-semibold text-gray-100 mb-6">
        {{ __('Ferias registradas') }}
    </h1>

    <a href="{{ route('fairs.create') }}"
       class="mb-4 inline-block px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-500 transition duration-200">
        <i class="fa-solid fa-plus mr-2"></i>
        {{ __('Nueva feria') }}
    </a>

    <div class="overflow-x-auto bg-gray-900 shadow-lg rounded-lg">
        <table class="min-w-full divide-y divide-gray-800">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Lugar</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Descripción</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Emprendedores</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-800">
                @forelse ($fairs as $fair)
                    <tr class="even:bg-gray-800">
                        <td class="px-6 py-4 text-gray-300">{{ $fair->name }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ \Carbon\Carbon::parse($fair->event_date)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $fair->location }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ Str::limit($fair->description, 50) }}</td>
                        <td class="px-6 py-4 text-gray-300">
                            @forelse ($fair->entrepreneurs as $entrepreneur)
                                <span class="inline-block px-2 py-1 bg-gray-700 text-gray-200 rounded text-xs mr-1">
                                    {{ $entrepreneur->name }}
                                </span>
                            @empty
                                <span class="text-sm text-gray-400">{{ __('Sin emprendedores') }}</span>
                            @endforelse
                        </td>
                        <td class="px-4 py-4">
                            <!-- Activación de modales haciendo uso de Alpine.js para visualizar el detalle de una feria o eliminarla -->
                            <div x-data="{ showModal{{ $fair->id }}: false, deleteModal{{ $fair->id }}: false }"
                                class="flex flex-col md:flex-row items-center justify-center gap-2">

                            <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                                <button @click="showModal{{ $fair->id }} = true" title="Ver" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-teal-600 text-white hover:bg-teal-500 transition">
                                    <i class="fas fa-eye text-sm"></i>
                                </button>

                                <!-- Modal de vista -->
                                <div x-show="showModal{{ $fair->id }}" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                    <div @click.outside="showModal{{ $fair->id }} = false" class="bg-gray-900 text-white w-full max-w-2xl mx-4 p-6 rounded shadow-lg overflow-y-auto max-h-[90vh]">
                                        <div class="flex justify-between items-center mb-4">
                                            <h2 class="text-xl font-semibold">Detalles de la feria</h2>
                                            <button @click="showModal{{ $fair->id }} = false" class="text-gray-400 hover:text-gray-200 transition text-xl">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                        
                                        @include('fairs._form', ['fair' => $fair, 'readonly' => true])
                                        
                                        <div class="mt-6 text-right">
                                            <button @click="showModal{{ $fair->id }} = false" class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
                                                {{ __('Cerrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
            
                                <a href="{{ route('fairs.edit', $fair->id) }}" title="Editar"
                                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-500 text-white hover:bg-yellow-400 transition">
                                    <i class="fas fa-pen text-sm"></i>
                                </a>

                                <button @click="deleteModal{{ $fair->id }} = true" title="Eliminar" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-500 text-white hover:bg-red-400 transition">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>

                                <!-- Modal de confirmación de eliminación -->
                                <div x-show="deleteModal{{ $fair->id }}" x-cloak
                                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"> 
                                    <div @click.outside="deleteModal{{ $fair->id }} = false"
                                        class="bg-gray-900 text-white w-full max-w-md mx-4 p-6 rounded shadow-lg space-y-4 text-center">

                                        <h2 class="text-xl font-semibold mb-4">{{ __('¿Eliminar esta feria?') }}</h2>

                                        <p class="text-gray-300">
                                            {{ __('Esta acción no se puede deshacer. ¿Deseas eliminar') }}
                                            <span class="font-semibold text-red-400">{{ $fair->name }}</span>?
                                        </p>

                                        <div class="flex justify-center gap-2 mt-6">
                                            <button @click="deleteModal{{ $fair->id }} = false" class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
                                                {{ __('Cancelar') }}
                                            </button>

                                            <form action="{{ route('fairs.destroy', $fair->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded transition">
                                                    {{ __('Sí, eliminar') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-gray-400 text-center">No hay ferias registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
