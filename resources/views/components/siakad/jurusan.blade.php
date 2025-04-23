@props(['label' => 'Jurusan'])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih</option>
        <option value="Busana">Busana</option>
        <option value="Kuliner">Kuliner</option>
        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
        <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
        <option value="Teknik Otomotif">Teknik Otomotif</option>
        <option value="Umum">Umum</option>
        <option value="Pilihan">Mapel Pilihan</option>
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
