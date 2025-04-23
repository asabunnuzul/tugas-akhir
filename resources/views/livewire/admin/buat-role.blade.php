<div class="space-y-5">
    <x-header>Buat Role</x-header>

    <form wire:submit.prevent='simpan' class="space-y-5">
        <div class="space-y-3 lg:grid lg:grid-cols-2 lg:gap-2 lg:space-y-0">
            <div class="flex flex-col space-y-1">
                <x-input-label value="Nama Role"/>
                <x-text-input wire:model='nama' label='Role' autofocus />
            </div>
        </div>
        <x-primary-button type='submit' wire:click.prevent='simpan'>Simpan</x-primary-button>
    </form>
    <div class="mt-5 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Role
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listRole as $key => $role)
                    <tr :key="$key" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $role->name }}
                        </td>
                        <td class="inline-flex px-2 py-2 space-x-3 font-medium text-slate-600">
                            <x-hapus :id="$role->id" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
