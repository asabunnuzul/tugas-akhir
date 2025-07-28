<x-siakad.card>
    <x-siakad.header>absensi siswa PKL</x-siakad.header>
    <div class="py-3 space-y-2 md:grid md:grid-cols-3 md:gap-2 md:space-y-0">
        <x-siakad.tahun wire:model.live='tahun' />
        <x-siakad.input type='date' label='Tanggal' wire:model.live='tanggal' />
    </div>
    <div class="py-3" x-show="$wire.tanggal && $wire.tahun">
        <x-siakad.button label='Set Kehadiran' wire:click.prevent='nihil' spinner='nihil' />
    </div>
    <x-siakad.skeleton />
    <div class="py-3 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Nama
                    </th>
                    <th scope='col' class="px-2 py-3 text-left ">
                        Kehadiran
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Hubin
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listSiswa as $siswa)
                    <tr :key="$siswa - > nis" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->siswa?->name }}
                        </td>
                        <td class="px-2 py-2 flex gap-2 font-medium text-slate-600">

                            @if ($siswa->absensi?->id)
                                <x-siakad.kehadiran wire:loading.remove :key="$siswa->nis"
                                    wire:target='kehadiran.{{ $siswa->nis }}'
                                    wire:model="kehadiran.{{ $siswa->nis }}"
                                    @change="$wire.simpan($event.target.value, {{ $siswa->absensi?->id }}, {{ $siswa->nis }})" />
                                <x-siakad.hapus wire:loading.remove :id="$siswa->absensi?->id" />
                            @else
                                <x-siakad.kehadiran :listKehadiran="arrayKehadiranTanpaSakit()" :key="$siswa->nis" disabled />
                            @endif
                            <x-siakad.loading-inline :key="$siswa->nis" wire:target='kehadiran.{{ $siswa->nis }}' />
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->absensi?->userHubin?->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
