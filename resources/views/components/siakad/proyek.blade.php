@props(['label' => 'Kegiatan'])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih {{ $label }}</option>
        <option value="1">Kegiatan 1</option>
        <option value="2">Kegiatan 2</option>
        <option value="3">Kegiatan 3</option>
        <option value="4">Kegiatan 4</option>
        <option value="5">Kegiatan 5</option>
        <option value="6">Kegiatan 6</option>
        <option value="7">Kegiatan 7</option>
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
