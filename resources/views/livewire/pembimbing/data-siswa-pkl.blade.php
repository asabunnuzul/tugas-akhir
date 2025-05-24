<x-siakad.card>
    <x-siakad.header>data siswa PKL</x-siakad.header>
    <div class="space-y-3 md:grid md:grid-cols-3 md:gap-2 md:space-y-0">
        <x-siakad.tahun wire:model.live='tahun' name='tahun' />
        <x-siakad.list-hubin wire:model.live='hubin_id' name='hubin_id' :listHubin="$listHubin" />
    </div>
    <div class="my-3" x-data="{
        fetchData() {
            if ($wire.search == '') { $wire.cari() }
        }
    }">
        <x-siakad.input-icon-search label='Cari' wire:model='search' wire:keyup.enter='cari' placeholder='Cari . . .'
            @input="fetchData" />
    </div>
    <x-siakad.skeleton />
    <div class="pt-2 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Nama
                    </th>
                    <th scope='col' class="px-2 py-3">
                        Kelas
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Nama Hubin
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Alamat
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Pembimbing Hubin
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Pembimbing Sekolah
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listSiswa as $key => $siswa)
                    <tr :key="$key" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $this->listSiswa->firstItem() + $key }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->siswa?->name }}
                        </td>
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $siswa->kelas?->nama }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->hubin?->nama }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->hubin?->alamat }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->userHubin?->name }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $siswa->pembimbing?->name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{ $this->listSiswa->links() }}
    </div>
</x-siakad.card>
