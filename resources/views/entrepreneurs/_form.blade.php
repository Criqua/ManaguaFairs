@php($readonly = $readonly ?? false)

<div class="space-y-4">
    <div>
        <label class="block text-gray-300 mb-1">{{ __('Nombre del emprendedor') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded">{{ $entrepreneur->name }}</p>
        @else
            <input type="text" name="name" value="{{ old('name', $entrepreneur->name ?? '') }}" placeholder="e.g.: Alan Smithee" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2" />
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <div>
        <label class="block text-gray-300 mb-1">{{ __('Teléfono') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded">{{ $entrepreneur->phone ?? '-' }}</p>
        @else
            <input type="tel" name="phone" value="{{ old('phone', $entrepreneur->phone ?? '') }}" placeholder="e.g.: 8888-8888" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2" />
            @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <div>
        <label class="block text-gray-300 mb-1">{{ __('Rubro') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded">{{ $entrepreneur->category ?? '-' }}</p>
        @else
            <input type="text" name="category" value="{{ old('category', $entrepreneur->category ?? '') }}" placeholder="e.g.: Comida artesanal" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2" />
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <div>
        <label class="block text-gray-300 mb-1">{{ __('Descripción') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded">{{ $entrepreneur->description ?? '-' }}</p>
        @else
            <textarea name="description" rows="4" class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2">{{ old('description', $entrepreneur->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <div>
        <label class="block text-gray-300 mb-1">{{ __('Ferias asociadas') }}</label>
        @if ($readonly)
            @if($entrepreneur->fairs->isNotEmpty())
                <div class="flex flex-wrap gap-2">
                    @foreach($entrepreneur->fairs as $fair)
                        <span class="px-2 py-1 bg-gray-700 text-gray-200 rounded text-sm">
                            {{ $fair->name }}
                        </span>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-400">{{ __('No hay ferias asociadas') }}</p>
            @endif
        @else
          <div class="space-y-2">
              @forelse ($fairs ?? [] as $fair)
                  <label class="flex items-center gap-2 text-gray-200">
                      <input type="checkbox"
                            name="fairs[]"
                            value="{{ $fair->id }}"
                            class="accent-teal-600"
                            @if(isset($entrepreneur) && $entrepreneur->fairs->pluck('id')->contains($fair->id)) checked @endif>
                      {{ $fair->name }}
                  </label>
              @empty
                  <p class="text-sm text-gray-400">{{ __('No hay ferias disponibles') }}</p>
              @endforelse
          </div>
            @error('fairs')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @error('fairs.*')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>
</div>
