@props(['label' => '', 'listWilayah', 'isAlpine' => false, 'disabled' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none {{ $disabled ? 'bg-gray-200' : '' }}"
        {{ $attributes }} {{ $disabled ? 'disabled' : '' }}>
        <option value="">Pilih {{ $label }}</option>
        @if ($isAlpine)
            <template x-for="wilayah in $wire.listWilayah">
                <option x-text="wilayah.name" :value="wilayah.name">
                </option>
            </template>
        @else
            @foreach ($listWilayah as $wilayah)
                <option value="{{ $wilayah->name }}">{{ $wilayah->name }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
