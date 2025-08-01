<x-siakad.card>
    <x-siakad.header>Data User</x-siakad.header>
    <div class="py-5">
        <x-siakad.button href="{{ route('tambah-user') }}" wire:navigate label="Tambah User" />
    </div>
    <div class="pt-2 mt-5 overflow-x-auto">
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
                        Role
                    </th>
                    <th scope='col' class="px-2 py-3 text-left">
                        Aksi
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
                                <li wire:key="{{ $r->id }}" class='flex items-center justify-between'>
                                    <div>
                                        {{ $loop->iteration }}. {{ $r->name }}
                                    </div>
                                </li>
                            @endforeach
                        </td>
                        <td class="px-2 py-2 font-medium text-slate-600">
                            <div class="flex gap-2">
                                <x-siakad.link-edit href="{{ route('atur-user', $user->id) }}"
                                    wire:navigate />
                                <x-siakad.hapus :id="$user->id" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-siakad.card>
