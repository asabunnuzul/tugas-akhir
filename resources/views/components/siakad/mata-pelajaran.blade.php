@props(['listMataPelajaran', 'isAlpine' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>mata pelajaran</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Mata Pelajaran</option>
        @if ($isAlpine)
            <template x-for="mapel in $wire.listMataPelajaran">
                <option x-text="mapel.mapel ?? mapel.nama" :value="mapel.mata_pelajaran_id ?? mapel.id">
                </option>
            </template>
        @else
            @foreach ($listMataPelajaran as $mapel)
                <option value="{{ $mapel->mata_pelajaran_id ?? ($mapel->id ?? $mapel['mata_pelajaran_id']) }}">
                    {{ $mapel->mapel?->nama ?? ($mapel->nama ?? $mapel['mapel']) }}
                </option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
