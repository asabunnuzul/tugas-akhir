<?php

namespace App\Livewire\Hubin;

use App\Models\Absensi;
use Livewire\Component;
use App\Models\SiswaPkl;
use App\Traits\InitTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Absensi Siswa')]
class AbsensiSiswa extends Component
{
    use InitTrait;

    public $tahun;
    public $tanggal;
    public $hubin_id;
    public $kehadiran = [];

    protected $rules = [
        'tanggal' => 'required',
        'tahun' => 'required',
        'hubin_id' => 'required',
    ];

    protected $messages = ['*.required' => 'Silahkan Dipilih'];

    public function mount()
    {
        $this->tahun = $this->data_tahun();
        $this->hubin_id = SiswaPkl::query()
            ->whereTahun($this->tahun)
            ->whereUserHubinId(Auth::id())
            ->latest()
            ->first()
            ->hubin_id;
        $this->tanggal = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.hubin.absensi-siswa');
    }

    public function nihil()
    {
        $this->validate();

        SiswaPkl::whereTahun($this->tahun)
            ->whereHubinId($this->hubin_id)
            ->whereDoesntHave(
                'absensis',
                fn($q) => $q->whereTanggal($this->tanggal)
            )
            ->get()
            ->each(
                fn($siswa) => Absensi::create([
                    'nis' => $siswa->nis,
                    'kelas_id' => $siswa->kelas_id,
                    'tahun' => $this->tahun,
                    'tanggal' => $this->tanggal,
                    'kehadiran_id' => 1,
                    'hubin_id' => Auth::id(),
                ])
            );

        flash()->addSuccess('Berhasil Set Kehadiran');
    }

    public function simpan($value, $id)
    {
        if (empty($value)) {
            Absensi::find($id)
                ->delete();
        } else {
            Absensi::find($id)
                ->update(
                    [
                        'kehadiran_id' => $value,
                        'hubin_id' => Auth::id(),
                    ]
                );
        }

        flash()->addInfo('Berhasil Simpan Absensi');
    }

    #[Computed()]
    public function listSiswa()
    {
        return SiswaPkl::query()
            ->whereTahun($this->tahun)
            ->whereHubinId($this->hubin_id)
            ->with([
                'absensi' => fn($q) =>
                $q->whereTanggal($this->tanggal),
                'absensi.userHubin:id,name',
                'kelas:id,nama',
                'siswa:nis,name'
            ])
            ->get()
            ->sortBy('siswa.name')
            ->values()
            ->each(
                fn($q) => $this->kehadiran[$q->nis] = $q->absensi->kehadiran_id
            );
    }
}
