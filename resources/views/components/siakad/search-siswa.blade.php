@props(['listSiswa' => []])
<div wire:ignore class="flex flex-col space-y-1 capitalize text-md text-slate-600">
    <div>pilih siswa</div>
    <select {{ $attributes }}
        class="border rounded-md shadow-md shadow-emerald-400 border-slate-200 focus:ring focus:ring-emerald-300 focus:border-none">
        <option value="">pilih siswa</option>
        @foreach ($listSiswa as $siswa)
            <option value="{{ $siswa->nis }}">{{ $siswa->siswa?->name ?? $siswa->name }} ( {{ $siswa->kelas?->nama }} )
            </option>
        @endforeach
    </select>
</div>
