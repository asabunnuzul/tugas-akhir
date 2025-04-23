@props(['listElemen' => []])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>Elemen Pembelajaran</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Elemen</option>
        @foreach ($listElemen as $elemen)
            <option value="{{ $elemen->elemen_pembelajaran_id ?? $elemen->id }}">
                {{ $elemen->elemen?->nama ?? $elemen->nama }}</option>
        @endforeach
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
