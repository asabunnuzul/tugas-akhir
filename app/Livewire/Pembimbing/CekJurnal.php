<?php

namespace App\Livewire\Pembimbing;

use App\Models\Hubin;
use App\Models\Jurnal;
use App\Models\SiswaPkl;
use App\Traits\InitTrait;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cek Jurnal')]
class CekJurnal extends Component
{
    use InitTrait;

    public $tahun;
    public $nis;
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
        return view('livewire.pembimbing.cek-jurnal');
    }

    #[Computed()]
    public function listSiswa()
    {
        return SiswaPkl::query()
            ->whereTahun($this->tahun)
            ->whereHubinId($this->hubin_id)
            ->with([
                'siswa:nis,name'
            ])
            ->get();
    }

    #[Computed()]
    public function listJurnal()
    {
        return Jurnal::query()
            ->whereNis($this->nis)
            ->with([
                'pembimbing:id,name'
            ])
            ->orderBy('tanggal')
            ->get();
    }
}
