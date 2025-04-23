<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class TambahUser extends Component
{

    public $nama;
    public $username;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'nama' => 'required',
        'username' => 'required|unique:users,username',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ];

    protected $messages = [
        '*.required' => 'Silahkan Diisi',
        '*.unique' => 'Username Sudah Dipakai, Silahkan Ganti Yang Lain'
    ];

    public function render()
    {
        return view('livewire.admin.tambah-user');
    }

    public function simpan(){

        $this->validate();

        User::create([
            'name' => $this->nama,
            'username' => $this->username,
            'password' => bcrypt($this->password)
        ]);
        flash('Berhasil Tambah User');


    }
}
