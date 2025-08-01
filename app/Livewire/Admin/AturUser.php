<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

#[Title('Atur User')]
class AturUser extends Component
{
    public User $user;
    public $user_id;

    public $name;
    public $username;
    public $password;
    public $password_confirmation;

    public $role;
    public $listRole = [];

    public function mount($id)
    {
        $this->user_id = $id;
        $this->user = User::find($id);

        $this->listRole = Role::query()
            ->orderBy('name')
            ->get();

        $this->name = $this->user->name;
        $this->username = $this->user->username;
    }

    public function render()
    {
        return view('livewire.admin.atur-user');
    }

    public function update_data()
    {
        $this->validate([
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($this->user_id),
            ],
        ]);

        $this->user->name = $this->name;
        $this->user->username = $this->username;
        $this->user->save();

        flash()->info('Berhasil Update Data');
    }

    public function simpan()
    {
        $this->validate([
            'user_id' => 'required',
            'role' => 'required'
        ]);

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
    public function listRoles()
    {
        return User::with('roles')
            ->find($this->user_id);
    }
}
