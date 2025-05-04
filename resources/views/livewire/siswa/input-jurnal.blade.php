<x-siakad.card>
    <x-siakad.header>input jurnal</x-siakad.header>
    <div class="md:grid md:grid-cols-3 md:gap-2 md:space-y-0 space-y-3 mb-3">
        <x-siakad.input type='date' label='tanggal' wire:model.live='tanggal' />
    </div>
    <div class="mb-3">
        <x-siakad.textarea rows='3' wire:model='keterangan' label='keterangan' />
    </div>

    <x-siakad.button label='simpan' wire:click.prevent='simpan' spinner='simpan' />

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
                        Keterangan Kegiatan
                    </th>
                    <th scope='col' class="px-2 py-3">
                        Hubin
                    </th>
                    <th scope='col' class="px-2 py-3">
                        Aksi
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
                            {{ $jurnal->keterangan }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $jurnal->hubin?->nama }}
                        </td>
                        <td class="px-2 py-2 font-medium flex justify-center text-slate-600">
                            <x-siakad.hapus :id="$jurnal->id" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
