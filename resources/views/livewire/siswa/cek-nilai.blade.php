<x-siakad.card>
    <x-siakad.header>cek nilai</x-siakad.header>
    <div class="py-3 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Kategori Nilai
                    </th>
                    <th scope='col' class="px-2 py-3 text-left ">
                        Nilai
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listKategori as $kategori)
                    <tr :key="$kategori->id" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $kategori->nama }}
                        </td>
                        <td class="px-2 py-2 flex gap-2 font-medium text-slate-600">
                            {{ $this->listNilai->where('kategori_nilai_id', $kategori->id)->first()?->nilai }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
