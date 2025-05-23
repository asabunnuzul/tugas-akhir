@props(['listHubin'])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>nama hubin</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Hubin</option>
        @foreach ($listHubin as $hubin)
            <option value="{{ $hubin->id }}">{{ $hubin->nama }}</option>
        @endforeach
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
