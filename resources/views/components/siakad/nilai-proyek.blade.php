@props(['value' => '', 'label' => ''])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Nilai</option>
        <option value="BB" {{ $value == 'BB' ? 'selected' : '' }}>BB</option>
        <option value="MB" {{ $value == 'MB' ? 'selected' : '' }}>MB</option>
        <option value="BSH" {{ $value == 'BSH' ? 'selected' : '' }}>BSH</option>
        <option value="SB" {{ $value == 'SB' ? 'selected' : '' }}>SB</option>
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
