@props(['label' => 'Pilih Siswa', 'listSiswa', 'withKelas' => false, 'isLoading' => true])
<div class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>{{ $label }}</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">Pilih Siswa</option>
        @if ($withKelas)
            @foreach ($listSiswa as $siswa)
                <option value="{{ $siswa->nis }}">{{ $siswa->siswa?->name ?? $siswa->name }} ({{ $siswa->kelas?->nama }})
                </option>
            @endforeach
        @else
            @foreach ($listSiswa as $siswa)
                <option value="{{ $siswa->nis }}">{{ $siswa->siswa?->name ?? $siswa->name }}
                </option>
            @endforeach
        @endif
    </select>
    @error($attributes['wire:model'] ?? $attributes['wire:model.live'])
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
