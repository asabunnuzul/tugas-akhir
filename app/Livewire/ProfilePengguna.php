<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class ProfilePengguna extends Component
{
    use WithFileUploads;

    public User $user;

    public $nama;

    public $old_password;

    public $password;

    public $password_confirmation;

    public function render()
    {
        return view('livewire.profile-pengguna');
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->nama = $this->user->name;
    }

    public function simpanNama()
    {
        $this->user->update([
            'name' => $this->nama,
        ]);

        flash()->addInfo('Berhasil Ganti Nama');
        $this->redirectRoute('profile-pengguna', navigate: true);
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|confirmed',
        ]);

        if (!Hash::check($this->old_password, auth()->user()->password)) {
            $this->addError('old_password', 'Password lama tidak sesuai.');
            return;
        }

        User::find(auth()->user()->id)
            ->update(['password' => bcrypt($this->password)]);

        $this->reset('password', 'password_confirmation');

        flash()->addInfo('Berhasil Ganti Password');
    }
}
