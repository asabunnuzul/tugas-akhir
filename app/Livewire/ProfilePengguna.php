<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;

#[Title('Profile Pengguna')]
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
        $this->user = Auth::user();
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

        if (!Hash::check($this->old_password, Auth::user()->getAuthPassword())) {
            $this->addError('old_password', 'Password lama tidak sesuai.');
            return;
        }

        User::find(Auth::user()->id)
            ->update(['password' => bcrypt($this->password)]);

        $this->reset('password', 'password_confirmation');

        flash()->addInfo('Berhasil Ganti Password');
    }
}
