@php($readonly = $readonly ?? false)

<div class="space-y-4">
    <!-- Campo de nombre -->
    <div>
        <label class="block text-gray-300 mb-1">{{ __('Nombre de la feria') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded">{{ $fair->name }}</p>
        @else
            <input type="text" name="name" value="{{ old('name', $fair->name ?? '') }}"
                   placeholder="e.g.: Feria de Verano"
                   class="w-full !bg-gray-800 !text-gray-200 border border-gray-700 rounded px-3 py-2"/>
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <!-- Campo de fecha del evento -->
    <div>
        <label class="block text-gray-300 mb-1">{{ __('Fecha del evento') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded">
                {{ \Carbon\Carbon::parse($fair->event_date)->format('d/m/Y') }}
            </p>
        @else
            <input type="date" name="event_date"
                   value="{{ old('event_date', isset($fair->event_date) ? \Carbon\Carbon::parse($fair->event_date)->format('Y-m-d') : '') }}"
                   class="w-full bg-gray-800 text-gray-200 border border-gray-700 rounded px-3 py-2 filter [&::-webkit-calendar-picker-indicator]:invert"/>
            @error('event_date')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <!-- Campo de lugar -->
    <div>
        <label class="block text-gray-300 mb-1">{{ __('Lugar') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded">{{ $fair->location }}</p>
        @else
            <input type="text" name="location" value="{{ old('location', $fair->location ?? '') }}"
                   placeholder="e.g.: Pista Suburbana..."
                   class="w-full !bg-gray-800 !text-gray-200 border border-gray-700 rounded px-3 py-2"/>
            @error('location')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <!-- Campo de descripción -->
    <div>
        <label class="block text-gray-300 mb-1">{{ __('Descripcion') }}</label>
        @if ($readonly)
            <p class="text-gray-100 bg-gray-800 px-3 py-2 rounded whitespace-normal break-words">
                {{ $fair->description ?? '-' }}
            </p>
        @else
            <textarea name="description" rows="4"
                      class="w-full !bg-gray-800 !text-gray-200 border border-gray-700 rounded px-3 py-2 whitespace-normal break-words">{{ old('description', $fair->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>

    <!-- Campo de selección múltiple de emprendedores -->
    <div>
        <label class="block text-gray-300 mb-1">{{ __('Emprendedores') }}</label>
        @if ($readonly)
            @if($fair->entrepreneurs->isNotEmpty())
                <div class="flex flex-wrap gap-2">
                    @foreach($fair->entrepreneurs as $entrepreneur)
                        <span class="px-2 py-1 bg-gray-700 text-gray-200 rounded text-sm">
                            {{ $entrepreneur->name }}
                        </span>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-400">{{ __('No hay emprendedores asociados') }}</p>
            @endif
        @else
            <div class="space-y-2">
                @forelse ($entrepreneurs ?? [] as $entrepreneur)
                    <label class="flex items-center gap-2 text-gray-200">
                        <input type="checkbox"
                            name="entrepreneurs[]"
                            value="{{ $entrepreneur->id }}"
                            class="accent-teal-600"
                            @if(isset($fair) && $fair->entrepreneurs->pluck('id')->contains($entrepreneur->id)) checked @endif>
                        {{ $entrepreneur->name }}
                    </label>
                @empty
                    <p class="text-sm text-gray-400">{{ __('No hay emprendedores disponibles') }}</p>
                @endforelse
            </div>
            @error('entrepreneurs')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        @endif
    </div>
</div>
