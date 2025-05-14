@extends('layouts.app')

@section('content')
<div class="bg-slate-800 min-h-screen px-20 py-8">
    <h1 class="text-2xl font-semibold text-gray-100 mb-6">
        {{ __('Emprendedores registrados') }}
    </h1>

    <a href="{{ route('entrepreneurs.create') }}"
       class="mb-4 inline-block px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-500 transition duration-200">
        <i class="fa-solid fa-plus mr-2"></i>
        {{ __('Nuevo emprendedor') }}
    </a>

    <div class="overflow-x-auto bg-gray-900 shadow-lg rounded-lg">
        <table class="min-w-full divide-y divide-gray-800">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Teléfono</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Rubro</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Ferias</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-800">
                <!-- Ejemplo de fila 1 -->
                <tr class="even:bg-gray-800">
                    <td class="px-6 py-4 text-gray-300">Juan Pérez</td>
                    <td class="px-6 py-4 text-gray-300">8888-1234</td>
                    <td class="px-6 py-4 text-gray-300">Artesanías</td>
                    <td class="px-6 py-4 text-gray-300">
                        <span class="inline-block px-2 py-1 bg-gray-700 text-gray-200 rounded text-xs mr-1">
                            Feria de Artesanías
                        </span>
                        <span class="inline-block px-2 py-1 bg-gray-700 text-gray-200 rounded text-xs">
                            Feria de Comida
                        </span>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                            <a href="#" title="Ver"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-teal-600 text-white hover:bg-teal-500 transition">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <a href="{{ route('entrepreneurs.edit') }}" title="Editar"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-500 text-white hover:bg-yellow-400 transition">
                                <i class="fas fa-pen text-sm"></i>
                            </a>
                            <a href="#" title="Eliminar"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-500 text-white hover:bg-red-400 transition">
                                <i class="fas fa-trash text-sm"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <!-- Ejemplo de fila 2 -->
                <tr>
                    <td class="px-6 py-4 text-gray-300">María López</td>
                    <td class="px-6 py-4 text-gray-300">7777-5678</td>
                    <td class="px-6 py-4 text-gray-300">Comida artesanal</td>
                    <td class="px-6 py-4 text-gray-300">
                        <span class="inline-block px-2 py-1 bg-gray-700 text-gray-200 rounded text-xs mr-1">
                            Feria de Alimentos
                        </span>
                        <span class="inline-block px-2 py-1 bg-gray-700 text-gray-200 rounded text-xs">
                            Feria de Tecnología
                        </span>
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                            <a href="#" title="Ver"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-teal-600 text-white hover:bg-teal-500 transition">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <a href="" title="Editar"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-500 text-white hover:bg-yellow-400 transition">
                                <i class="fas fa-pen text-sm"></i>
                            </a>
                            <a href="#" title="Eliminar"
                               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-500 text-white hover:bg-red-400 transition">
                                <i class="fas fa-trash text-sm"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
