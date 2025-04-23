@props(['listElemen' => []])

<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>Elemen P5</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Elemen</option>
        {{-- Define all available options --}}
        @php
            $elemenOptions = [
                1 => 'Beriman dan bertaqwa kepada Tuhan Yang Maha Esa',
                2 => 'Berkebhinekaan global',
                3 => 'Gotong royong',
                4 => 'Mandiri',
                5 => 'Bernalar Kritis',
                6 => 'Kreatif',
            ];
        @endphp

        {{-- Display filtered options if listElemen is provided, otherwise show all options --}}
        @foreach (($listElemen ?: array_keys($elemenOptions)) as $elemen)
            @if (isset($elemenOptions[$elemen]))
                <option value="{{ $elemen }}">{{ $elemenOptions[$elemen] }}</option>
            @endif
        @endforeach
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
