@php($readonly = $readonly ?? false)

<div class="space-y-4">
    <div>
        <label class="block text-gray-300 mb-1">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', 'Parque de Ferias de Managua') }}" placeholder="e.g.: Feria de Verano" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2"/>
    </div>

    <div>
        <label class="block text-gray-300 mb-1">Fecha</label>
        <input type="date" name="fecha" value="{{ old('fecha', '2025-05-25') }}" placeholder="e.g. 2025-05-25" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2 filter [&::-webkit-calendar-picker-indicator]:invert"/>
    </div>

    <div>
        <label class="block text-gray-300 mb-1">Lugar</label>
        <input type="text" name="lugar" value="{{ old('lugar', 'Pista Suburbana, Barrio San Juan') }}" placeholder="e.g.: Pista Suburbuna..." class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2"/>
    </div>

    <div>
        <label class="block text-gray-300 mb-1">Descripción</label>
        <textarea name="descripcion" rows="4" placeholder="e.g. Evento para promover productos locales" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2">Evento para emprendedores locales con productos artesanales, alimentos y más.</textarea>
    </div>

    <div>
        <label class="block text-gray-300 mb-1">Emprendedores</label>
        <select name="emprendedores[]" multiple placeholder="e.g.: Seleccione los emprendedores participantes" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2">
            <!-- Ejemplo temporal de opciones -->
            <option value="1" selected>Juan Pérez</option>
            <option value="2">María López</option>
            <option value="3">José Martínez</option>
        </select>
    </div>
</div>
