@props(['label' => 'jenis penilaian', 'listJenis', 'isAlpine' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-200 focus:border-none">
        <option value="">Pilih Jenis</option>
        @if ($isAlpine)
            <template x-for="jenis in $wire.listJenis">
                <option x-text="jenis.jenis" :value="jenis.jenis_penilaian_id"></option>
            </template>
        @else
            @foreach ($listJenis as $jenis)
                <option value="{{ $jenis->jenis_penilaian_id ?? ($jenis->jenis_sikap_id ?? $jenis->id) }}">
                    {{ $jenis->jenis?->nama ?? $jenis->nama }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
