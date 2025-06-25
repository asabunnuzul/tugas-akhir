<x-siakad.card>
    <form wire:submit.prevent='simpan' class="space-y-3">
        <x-siakad.header>data hubin</x-siakad.header>
        <x-siakad.input label="Nama hubin" wire:model='nama' />
        <x-siakad.textarea label="alamat hubin" wire:model='alamat' rows="3" />
        <x-siakad.button label="Ganti Nama" spinner='simpan' type='submit' />
    </form>
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
                    <th scope='col' class="px-2 py-3 text-left">
                        Alamat
                    </th>
                    <th scope='col' class="px-2 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listHubin as $key => $hubin)
                    <tr :key="$key" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $hubin->nama }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $hubin->alamat }}
                        </td>
                        <td class="px-2 py-2 font-medium flex gap-3 justify-center text-slate-600">
                            <x-siakad.link-edit href="{{ route('data-hubin.edit', $hubin->id) }}" wire:navigate />
                            <x-siakad.hapus :id="$hubin->id" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
