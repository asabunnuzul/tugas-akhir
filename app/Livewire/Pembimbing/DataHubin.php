<?php

namespace App\Livewire\Pembimbing;

use App\Models\Hubin;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Data Hubin')]
class DataHubin extends Component
{
    public $nama;

    public $alamat;

    protected $rules = [
        'nama' => 'required',
        'alamat' => 'required'
    ];

    protected $messages = ['*.required' => 'Silahkan Diisi'];

    public function render()
    {
        return view('livewire.pembimbing.data-hubin');
    }

    public function simpan()
    {
        $validated = $this->validate();

        DB::beginTransaction();

        try {
            Hubin::create($validated);
            DB::commit();
            flash('Berhasil Simpan Data Hubin');
            $this->reset('nama', 'alamat');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function hapus($id)
    {

        DB::beginTransaction();

        try {
            Hubin::destroy($id);
            DB::commit();

            flash()->warning('Berhasil Hapus Data Hubin');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    #[Computed()]
    public function listHubin()
    {
        return Hubin::query()
            ->orderBy('nama')
            ->get();
    }
}
