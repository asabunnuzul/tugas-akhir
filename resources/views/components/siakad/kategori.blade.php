@props(['label' => 'kategori nilai', 'listKategori', 'isAlpine' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Kategori</option>
        @if ($isAlpine)
            <template x-for="kategori in $wire.listKategori">
                <option x-text="kategori.kategori ?? kategori.nama" :value="kategori.kategori_nilai_id ?? kategori.id">
                </option>
            </template>
        @else
            @foreach ($listKategori as $kategori)
                <option value="{{ $kategori->kategori_nilai_id ?? ($kategori->kategori_sikap_id ?? $kategori->id) }}">
                    {{ $kategori->kategori?->nama ?? $kategori->nama }}</option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
