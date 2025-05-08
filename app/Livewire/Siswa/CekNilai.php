<?php

namespace App\Livewire\Siswa;

use App\Models\KategoriNilai;
use App\Models\Penilaian;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cek Nilai')]
class CekNilai extends Component
{
    public $listKategori = [];

    public function mount()
    {
        $this->listKategori = KategoriNilai::query()
            ->orderBy('nama')
            ->get();
    }

    public function render()
    {
        return view('livewire.siswa.cek-nilai');
    }

    #[Computed()]
    public function listNilai()
    {
        return Penilaian::query()
            ->whereNis(auth()->user()->nis)
            ->get();
    }
}
