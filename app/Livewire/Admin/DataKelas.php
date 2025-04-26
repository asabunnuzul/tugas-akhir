<?php

namespace App\Livewire\Admin;

use App\Models\Kelas;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Data Kelas')]
class DataKelas extends Component
{
    public function render()
    {
        return view('livewire.admin.data-kelas');
    }

    public function hapus($id)
    {
        Kelas::destroy($id);

        flash()->warning('Berhasil Hapus Kelas');
    }

    #[Computed()]
    public function listKelas()
    {
        return Kelas::query()
            ->orderBy('nama')
            ->get();
    }
}
