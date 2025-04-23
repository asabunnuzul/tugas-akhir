<div>
    <x-header>Atur User</x-header>

    {{-- Main Layout --}}
    <div class="md:grid md:grid-cols-2 md:gap-2 md:space-y-0 mb-3 p-5">
        <!-- username Address -->
        <x-listuser :listUser="$listUser" wire:model="user_id" label="User" />

        <!-- Password -->
        <x-listrole :listRole="$listRole" wire:model="role" />
    </div>

    <div class="my-3">
        <x-primary-button wire:click.prevent='simpan' wire:loading.attr='disabled' class="ms-3">
            {{ __('Simpan') }}
        </x-primary-button>
    </div>
    <div class="my-3">
        <x-skeleton />
    </div>
    <div class="p-2">
        <table class="w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-left">Nama</th>
                    <th class="text-left">Username</th>
                    <th class="text-left">Roles & Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->listUser as $key => $user)
                    <tr :key="$key">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            <ul class=" list-inside">
                                @foreach ($user->roles as $index => $role)
                                    <li class="flex space-x-2 list-disc" :key="$index">{{ $role->name }}
                                        <div>
                                            <x-hapus-array :pertama="$user->id" :kedua="$role->name" />
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
