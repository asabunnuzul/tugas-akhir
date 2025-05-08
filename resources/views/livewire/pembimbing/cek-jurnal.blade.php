<x-siakad.card>
    <x-siakad.header>cek jurnal pkl</x-siakad.header>
    <div class="py-3 space-y-2 md:grid md:grid-cols-4 md:gap-2 md:space-y-0">
        <x-siakad.tahun wire:model.live='tahun' />
        <x-siakad.list-hubin :listHubin="$listHubin" wire:model.live='hubin_id' />
        <div class="col-span-2">
            <x-siakad.list-siswa wire:model.live='nis' :listSiswa="$this->listSiswa" />
        </div>
    </div>
    <div class="py-3 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Tanggal
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Pembimbing
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Keterangan Kegiatan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listJurnal as $key => $jurnal)
                    <tr :key="$key" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ hariTanggal($jurnal->tanggal) }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $jurnal->pembimbing?->name }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $jurnal->keterangan }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
