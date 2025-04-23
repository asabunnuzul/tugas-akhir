@props(['label' => 'jam'])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih jam</option>
        <option value="1-2">1-2</option>
        <option value="3-4">3-4</option>
        <option value="5-6">5-6</option>
        <option value="7-8">7-8</option>
        <option value="Semua">1-8 (Full)</option>
        <option value="Perwalian">Perwalian</option>
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
