<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AturUser extends Component
{
    public $user_id;
    public $role;
    public $listUser = [];
    public $listRole = [];

    protected $rules = [
        'user_id' => 'required',
        'role' => 'required',
    ];

    public function mount()
    {
        $this->listRole = Role::query()
            ->orderBy('name')
            ->get();
        $this->listUser = User::query()
            ->whereNotNull('username')
            ->orderBy('name')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.atur-user');
    }

    public function simpan()
    {
        $this->validate();

        $user = User::find($this->user_id);
        $user->assignRole($this->role);
        flash('Berhasil Atur User');
    }

    public function hapus($id)
    {
        User::find($id[0])
            ->removeRole($id[1]);

        flash()->addInfo('Berhasil Update Data Role');
    }

    #[Computed()]
    public function listUser()
    {
        return User::query()
            ->with('roles')
            ->orderBy('name')
            ->get();
    }
}
