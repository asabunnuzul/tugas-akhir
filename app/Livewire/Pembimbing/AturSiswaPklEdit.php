<?php

namespace App\Livewire\Pembimbing;

use App\Models\User;
use App\Models\Hubin;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use App\Models\SiswaPkl;
use App\Traits\InitTrait;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Edit Siswa PKL')]
class AturSiswaPklEdit extends Component
{
    use InitTrait;

    public $tahun;
    public $kelas_id;
    public $nis;
    public $hubin_id;
    public $user_hubin_id;
    public $pembimbing_id;

    public $listHubin = [];
    public $listKelas = [];
    public $listUserHubin = [];
    public $listPembimbing = [];

    public SiswaPkl $siswaPkl;

    protected $rules = [
        'tahun' => 'required',
        'kelas_id' => 'required',
        'nis' => 'required',
        'hubin_id' => 'required',
        'user_hubin_id' => 'required',
        'pembimbing_id' => 'required',
    ];

    public function mount($id)
    {
        $this->listHubin = Hubin::query()
            ->orderBy('nama')
            ->get();

        $this->listKelas = Kelas::query()
            ->orderBy('nama')
            ->get();

        $this->listUserHubin = User::query()
            ->role('Hubin')
            ->orderBy('name')
            ->get();

        $this->listPembimbing = User::query()
            ->role('Pembimbing')
            ->orderBy('name')
            ->get();

        $this->siswaPkl = SiswaPkl::find($id);

        $this->tahun = $this->siswaPkl->tahun;
        $this->kelas_id = $this->siswaPkl->kelas_id;
        $this->nis = $this->siswaPkl->nis;
        $this->hubin_id = $this->siswaPkl->hubin_id;
        $this->user_hubin_id = $this->siswaPkl->user_hubin_id;
        $this->pembimbing_id = $this->siswaPkl->pembimbing_id;
    }

    public function render()
    {
        return view('livewire.pembimbing.atur-siswa-pkl-edit');
    }

    public function simpan()
    {
        $this->validate();

        $this->siswaPkl->update([
            'hubin_id' => $this->hubin_id,
            'user_hubin_id' => $this->user_hubin_id,
            'pembimbing_id' => $this->pembimbing_id,
        ]);
        flash()->info('Berhasil Update Siswa PKL');
        $this->redirectRoute('data-siswa-pkl', navigate: true);
    }

    #[Computed()]
    public function listSiswa()
    {
        return Siswa::query()
            ->whereTahun($this->tahun)
            ->whereKelasId($this->kelas_id)
            ->with([
                'siswa:nis,name'
            ])
            ->get();
    }
}
