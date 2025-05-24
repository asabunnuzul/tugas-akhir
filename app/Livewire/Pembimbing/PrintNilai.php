<?php

namespace App\Livewire\Pembimbing;

use Livewire\Component;
use App\Models\SiswaPkl;
use App\Traits\InitTrait;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Print Nilai')]
class PrintNilai extends Component
{
    use InitTrait;

    public $tahun;

    public function mount()
    {
        $this->tahun = $this->data_tahun();
    }

    public function render()
    {
        return view('livewire.pembimbing.print-nilai');
    }

    #[Computed()]
    public function listSiswa()
    {
        return SiswaPkl::query()
            ->whereTahun($this->tahun)
            ->with([
                'kelas:id,nama',
                'siswa:nis,name'
            ])
            ->get()
            ->sortBy('siswa.name')
            ->values();
    }
}
