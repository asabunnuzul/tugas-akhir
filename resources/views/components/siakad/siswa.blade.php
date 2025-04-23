@props(['label' => 'siswa', 'listSiswa', 'isAlpine' => false])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Siswa</option>
        @if ($isAlpine)
            <template x-for="siswa in $wire.listSiswa">
                <option x-text="siswa.siswa ?? siswa.nama" :value="siswa.nis">
                </option>
            </template>
        @else
            @foreach ($listSiswa as $siswa)
                <option value="{{ $siswa->nis }}">{{ $siswa->siswa?->name ?? ($siswa->siswa?->name ?? $siswa->name) }}
                </option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
    <x-siakad.loading-inline wire:target="{{ $attributes['wire:model'] ?? $attributes['wire:model.live'] }}" />
</div>
