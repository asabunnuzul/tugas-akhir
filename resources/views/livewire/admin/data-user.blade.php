<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-left">Nama</th>
                                <th class="text-left">Username</th>
                                <th class="text-left">Roles</th>
                                <th>Aksi</th>
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
                                                <li class=" list-disc" :key="$index">{{ $role->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="flex justify-center"><x-hapus :id="$user->id" /></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
