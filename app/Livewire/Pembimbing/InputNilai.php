<?php

namespace App\Livewire\Pembimbing;

use App\Models\Hubin;
use App\Models\KategoriNilai;
use App\Models\Penilaian;
use App\Models\SiswaPkl;
use App\Traits\InitTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Input Nilai')]
class InputNilai extends Component
{
    use InitTrait;

    public $tahun;
    #[Url(history: true)]
    public $hubin_id;
    #[Url(history: true)]
    public $kategori_nilai_id;

    public $listHubin = [];
    public $listKategori = [];
    public $listNilai = [];

    public function mount()
    {
        $this->tahun = $this->data_tahun();
        $this->listKategori = KategoriNilai::query()
            ->orderBy('nama')
            ->get();
        $this->listHubin = Hubin::query()
            ->orderBy('nama')
            ->get();
    }

    public function render()
    {
        return view('livewire.pembimbing.input-nilai');
    }

    public function simpan()
    {
        DB::beginTransaction();

        try {
            foreach ($this->listNilai as $key => $nilai) {
                Penilaian::updateOrCreate(
                    [
                        'nis' => $key,
                        'tahun' => $this->tahun,
                        'kategori_nilai_id' => $this->kategori_nilai_id,
                    ],
                    [
                        'nilai' => $nilai,
                        'pembimbing_id' => auth()->user()->id,
                        'hubin_id' => $this->hubin_id
                    ]
                );
            }
            flash('Berhasil Simpan Data Nilai');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    #[Computed()]
    public function listSiswa()
    {
        return SiswaPkl::query()
            ->whereTahun($this->tahun)
            ->whereHubinId($this->hubin_id)
            ->with([
                'kelas:id,nama',
                'penilaian' => fn($q) => $q->whereKategoriNilaiId($this->kategori_nilai_id),
                'siswa:nis,name'
            ])
            ->get()
            ->each(
                fn($q) =>
                $this->listNilai[$q->nis] = $q->penilaian?->nilai
            );
    }
}
