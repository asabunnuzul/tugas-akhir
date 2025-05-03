<?php

namespace App\Livewire\Pembimbing;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use App\Traits\InitTrait;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;

#[Title('Biodata Siswa')]
class BiodataSiswa extends Component
{
    use InitTrait;
    use WithPagination;

    #[Url(history: true)]
    public $search;

    #[Url(history: true)]
    public $tahun;

    #[Url(history: true)]
    public $kelas_id;

    public $listKelas = [];

    public function mount()
    {
        $this->tahun = $this->data_tahun();
        $this->listKelas = Kelas::query()
            ->whereHas('siswa')
            ->orderBy('nama')
            ->get();
    }

    public function render()
    {
        return view('livewire.pembimbing.biodata-siswa');
    }

    public function cari()
    {
        $this->resetPage();
        $this->listSiswa();
    }

    #[Computed()]
    public function listSiswa()
    {
        $nis = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->pluck('nis');

        return Siswa::query()
            ->whereTahun($this->tahun)
            ->when(
                $this->kelas_id,
                fn($q) => $q->whereKelasId($this->kelas_id)
            )
            ->whereIn('siswas.nis', $nis)
            ->with([
                'biodata',
                'kelas:id,nama',
                'siswa:id,nis,name',
            ])
            ->join('users', 'siswas.nis', '=', 'users.nis')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select(
                'siswas.nis',
                'siswas.tahun',
                'siswas.kelas_id',
                'users.id',
                'users.nis',
                'users.name',
                'kelas.id',
                'kelas.nama',
            )
            ->orderBy('kelas.nama')
            ->orderBy('users.name')
            ->paginate(10);
    }
}
