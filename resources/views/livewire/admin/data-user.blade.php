<div class="space-y-5">
    <x-header>Data User</x-header>
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
