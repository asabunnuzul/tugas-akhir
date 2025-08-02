<x-siakad.card>
    <x-siakad.header>input nilai</x-siakad.header>
    <div class="py-3 space-y-2 md:grid md:grid-cols-3 md:gap-2 md:space-y-0">
        <x-siakad.tahun wire:model.live='tahun' />
        <x-siakad.list-hubin :listHubin="$listHubin" wire:model.live='hubin_id' />
        <x-siakad.kategori wire:model.live='kategori_nilai_id' :listKategori="$listKategori" />
    </div>
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
                        Kelas
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Nilai
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listSiswa as $key => $siswa)
                    <tr :key="$key" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->siswa?->name }}
                        </td>
                        <td class="px-2 py-2 flex gap-2 font-medium text-slate-600">
                            {{ $siswa->kelas?->nama }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            <x-siakad.input type="number" max="100" min="0"
                                oninput="this.value = this.value > 100 ? 100 : this.value"
                                wire:model="listNilai.{{ $siswa->nis }}" />

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-5" x-show="$wire.tahun && $wire.hubin_id">
            <x-siakad.button label='simpan' wire:click.prevent='simpan' spinner="simpan" />
        </div>
    </div>
</x-siakad.card>
