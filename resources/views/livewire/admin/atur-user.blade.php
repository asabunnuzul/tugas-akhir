<x-siakad.card>
    <x-siakad.header>Atur User</x-siakad.header>
    <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">
        <x-siakad.card>
            <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">
                <x-siakad.input wire:model='name' label="Nama" />
                <x-siakad.input wire:model='username' label="username" />
            </div>

            <div class="my-3 flex gap-2">
                <x-siakad.button wire:click.prevent='update_data' spinner="update_data" wire:loading.attr='disabled'
                    label='update data' />
                <x-siakad.button red href="{{ route('data-user') }}" wire:navigate label="batal" />
            </div>
        </x-siakad.card>
        <x-siakad.card>
            <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">
                <x-siakad.list-role :listRole="$listRole" wire:model="role" />
            </div>

            <div class="my-3">
                <x-siakad.button wire:click.prevent='simpan' spinner="simpan" wire:loading.attr='disabled'
                    label='tambah otoritas' />
            </div>
        </x-siakad.card>
    </div>
    <div class="pt-2 mt-5 overflow-x-auto">
        <table class="w-full text-sm text-slate-600">
            <thead class="text-sm text-slate-600 bg-gray-50">
                <tr>
                    <th scope='col' class="px-2 py-3">
                        No
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Otoritas
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listRoles->roles->sortBy('name') as $index => $role)
                    <tr wire:key="{{ $index }}" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $role->name }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            <x-siakad.hapus-array :pertama="$user_id" :kedua="$role->name" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
