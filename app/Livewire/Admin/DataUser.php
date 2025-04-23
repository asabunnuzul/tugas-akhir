<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class DataUser extends Component
{

    public function render()
    {
        return view('livewire.admin.data-user');
    }

    #[Computed()]
    public function listUser()
    {
        return User::query()
            ->whereNotNull('username')
            ->with('roles')
            ->orderBy('name')
            ->get();
    }

    public function hapus($id)
    {
        User::destroy($id);
        flash()->addWarning('Berhasil Hapus User');
    }
}
