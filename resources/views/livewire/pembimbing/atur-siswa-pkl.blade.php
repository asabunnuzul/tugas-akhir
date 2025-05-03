<x-siakad.card>
    <x-siakad.header>Atur Siswa PKL</x-siakad.header>

    <div class="md:grid md:grid-cols-3 md:gap-2 md:space-y-0 mb-3">
        <x-siakad.tahun wire:model.live='tahun' />
        <x-siakad.list-hubin :listHubin="$listHubin" wire:model.live='hubin_id' />
        <x-siakad.list-user :listUser="$listUserHubin" wire:model.live="user_hubin_id" label="Pembimbing Hubin" />
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-2 md:space-y-0 mb-3">
        <x-siakad.list-user :listUser="$listPembimbing" wire:model.live="pembimbing_id" label="Pembimbing Sekolah" />
        <x-siakad.kelas :listKelas="$listKelas" wire:model.live='kelas_id' />
        <x-siakad.list-siswa :listSiswa="$this->listSiswa" wire:model.live="nis" />
    </div>
    <div class="my-3">
        <x-siakad.button wire:click.prevent='tambah' spinner="tambah" wire:loading.attr='disabled' label='tambah' />
    </div>
    <div class="pt-2 mt-5 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Nama Siswa
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Kelas
                    </th>
                    <th scope='col' class="px-2 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listSiswaPkl as $index => $siswa)
                    <tr wire:key="{{ $index }}" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->siswa?->name }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->kelas?->nama }}
                        </td>
                        <td class="px-2 py-2 font-medium flex justify-center text-slate-600">
                            <x-siakad.hapus :id="$siswa->id" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
