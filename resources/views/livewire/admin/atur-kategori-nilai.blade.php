<x-siakad.card>
    <x-siakad.header>atur kategori nilai</x-siakad.header>
    <form wire:submit.prevent='simpan' class="space-y-5">
        <x-siakad.input type='text' label='Nama Kategori Nilai' wire:model='nama' />
        <x-siakad.button label='simpan' spinner="simpan" />
    </form>
    <div class="py-3 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Nama Kategori
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listKategori as $key => $kategori)
                    <tr :key="$key" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $kategori->nama }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
