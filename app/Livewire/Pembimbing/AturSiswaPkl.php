<?php

namespace App\Livewire\Pembimbing;

use App\Models\Hubin;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaPkl;
use App\Models\User;
use App\Traits\InitTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Atur Siswa PKL')]
class AturSiswaPkl extends Component
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

    protected $rules = [
        'tahun' => 'required',
        'kelas_id' => 'required',
        'nis' => 'required',
        'hubin_id' => 'required',
        'user_hubin_id' => 'required',
        'pembimbing_id' => 'required',
    ];

    public function mount()
    {
        $this->tahun = $this->data_tahun();
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
    }

    public function render()
    {
        return view('livewire.pembimbing.atur-siswa-pkl');
    }

    public function tambah()
    {
        $validated = $this->validate();
        $cek = SiswaPkl::query()
            ->whereTahun($this->tahun)
            ->whereNis($this->nis)
            ->first();

        if ($cek) {
            sweetalert()->error('Siswa Sudah Terdaftar Kelas PKL');
            return;
        }
        
        DB::beginTransaction();

        try {
            SiswaPkl::create($validated);
            DB::commit();
            flash('Berhasil Tambah Siswa PKL');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function hapus($id)
    {
        DB::beginTransaction();

        try {
            SiswaPkl::destroy($id);
            DB::commit();
            flash()->warning('Berhasil Hapus Siswa PKL');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    #[Computed()]
    public function listSiswaPkl()
    {
        return SiswaPkl::query()
            ->whereTahun($this->tahun)
            ->whereHubinId($this->hubin_id)
            ->wherePembimbingId($this->pembimbing_id)
            ->with([
                'hubin:id,nama',
                'kelas:id,nama',
                'pembimbing:id,name',
                'siswa:nis,name',
                'userHubin:id,name',
            ])
            ->get();
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
