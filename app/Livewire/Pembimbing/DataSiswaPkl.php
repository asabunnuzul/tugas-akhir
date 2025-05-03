<?php

namespace App\Livewire\Pembimbing;

use App\Models\User;
use App\Models\Hubin;
use App\Models\SiswaPkl;
use Livewire\Component;
use App\Traits\InitTrait;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Data Siswa PKL')]
class DataSiswaPkl extends Component
{
    use InitTrait;
    use WithPagination;

    #[Url(history: true)]
    public $search;

    #[Url(history: true)]
    public $tahun;

    #[Url(history: true)]
    public $hubin_id;

    public $listHubin = [];

    public function mount()
    {
        $this->tahun = $this->data_tahun();
        $this->listHubin = Hubin::query()
            ->orderBy('nama')
            ->get();
    }

    public function render()
    {
        return view('livewire.pembimbing.data-siswa-pkl');
    }

    public function cari()
    {
        $this->resetPage();
        $this->listSiswa();
    }

    #[Computed()]
public function listSiswa()
{
    $nisList = User::query()
        ->where('name', 'like', '%' . $this->search . '%')
        ->pluck('nis');

    return SiswaPkl::query()
        ->where('tahun', $this->tahun)
        ->when($this->hubin_id, fn($q) => $q->whereHubinId($this->hubin_id))
        ->whereIn('siswa_pkls.nis', $nisList)
        ->join('users as siswa', 'siswa_pkls.nis', '=', 'siswa.nis')
        ->join('kelas', 'siswa_pkls.kelas_id', '=', 'kelas.id')
        ->with([
            'hubin:id,nama,alamat',
            'kelas:id,nama',
            'pembimbing:id,name',
            'userHubin:id,name',
            'siswa:id,nis,name',
        ])
        ->select(
            'siswa_pkls.*',
        )
        ->orderBy('kelas.nama')
        ->orderBy('siswa.name')
        ->paginate(10);
}
}
