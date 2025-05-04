<?php

namespace App\Livewire\Siswa;

use App\Models\Jurnal;
use App\Models\SiswaPkl;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Input Jurnal')]
class InputJurnal extends Component
{
    public $tanggal;
    public $keterangan;

    protected $rules = [
        'tanggal' => 'required',
        'keterangan' => 'required',
    ];

    protected $messages = ['*.required' => 'Tidak Boleh Kosong'];

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.siswa.input-jurnal');
    }

    public function simpan()
    {
        $this->validate();

        DB::beginTransaction();

        $cekData = SiswaPkl::query()
            ->whereNis(auth()->user()->nis)
            ->first();

        if (blank($cekData)) {
            sweetalert()->error('Belum Terdaftar Sebagai Siswa PKL, Silahkan Hubungi Guru Pembimbing');
            return;
        }

        try {
            Jurnal::updateOrCreate(
                ['tanggal' => $this->tanggal],
                [
                    'nis' => auth()->user()->nis,
                    'tahun' => $cekData->tahun,
                    'kelas_id' => $cekData->kelas_id,
                    'hubin_id' => $cekData->hubin_id,
                    'pembimbing_id' => $cekData->pembimbing_id,
                    'keterangan' => $this->keterangan
                ]
            );
            DB::commit();
            flash('Berhasil Simpan Jurnal');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function hapus($id)
    {
        DB::beginTransaction();

        try {
            Jurnal::destroy($id);
            flash()->warning('Berhasil Hapus Jurnal');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    #[Computed()]
    public function listJurnal()
    {
        return Jurnal::query()
            ->whereNis(auth()->user()->nis)
            ->with([
                'hubin:id,nama',
            ])
            ->orderBy('tanggal')
            ->get();
    }
}
