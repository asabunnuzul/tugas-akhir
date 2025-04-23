<x-siakad.card>
    <x-siakad.header>Atur User</x-siakad.header>

    {{-- Main Layout --}}
    <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3">
        <x-listuser :listUser="$listUser" wire:model="user_id" label="User" />
        <x-listrole :listRole="$listRole" wire:model="role" />
    </div>

    <div class="my-3">
        <x-siakad.button wire:click.prevent='simpan' spinner="simpan" wire:loading.attr='disabled' label='Simpan' />
    </div>
    <div wire:loading.remove class="pt-2 mt-5 overflow-x-auto">
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
                        Username
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Role & Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listUser as $index => $user)
                    <tr wire:key="{{ $index }}" class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td class="px-2 py-2 font-medium text-center text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $user->name }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            {{ $user->username }}
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            @foreach ($user->roles as $r)
                                <li wire:key="{{ $r->id }}" class='flex items-center justify-between border-b border-slate-400'>
                                    <div>
                                        {{ $loop->iteration }}. {{ $r->name }}
                                    </div>
                                    <div>
                                        <x-siakad.hapus-array :pertama="$user->id" :kedua="$r->name" />
                                    </div>
                                </li>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
