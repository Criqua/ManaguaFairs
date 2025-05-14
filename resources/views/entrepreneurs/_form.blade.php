@php($readonly = $readonly ?? false)

<div class="space-y-4">
  <div>
    <label class="block text-gray-300 mb-1">Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', '') }}" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2" placeholder="e.g. Alan Smithee"/>
  </div>

  <div>
    <label class="block text-gray-300 mb-1">Teléfono</label>
    <input type="tel" name="telefono" value="{{ old('telefono', '') }}" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2" placeholder="e.g. 8888-8888"/>
  </div>

  <div>
    <label class="block text-gray-300 mb-1">Rubro</label>
    <input type="text" name="rubro" value="{{ old('rubro', '') }}" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2" placeholder="e.g. Comida artesanal"/>
  </div>

  <div>
    <label class="block text-gray-300 mb-1">Ferias</label>
    <select name="ferias[]" multiple class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2">
      <!-- Ejemplo temporal de opciones -->
      <option value="1">Feria de Artesanías</option>
      <option value="2">Feria de Tecnología</option>
      <option value="3">Feria de Alimentos</option>
    </select>
  </div>
</div>