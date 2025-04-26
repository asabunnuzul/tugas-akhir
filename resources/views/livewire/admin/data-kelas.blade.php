<x-siakad.card>
    <x-siakad.header>data kelas</x-siakad.header>
    <x-siakad.skeleton />
    <div class="py-3 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Kelas
                    </th>
                    <th scope='col' class="px-2 py-3 text-left ">
                        Keahlian
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listKelas as $key => $kelas)
                    <tr :key="$key" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $kelas->nama }}
                        </td>
                        <td class="px-2 py-2 flex gap-2 font-medium text-slate-600">
                            {{ $kelas->nama_keahlian }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            <x-siakad.hapus :id="$kelas->id" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
