<?php

namespace App\Livewire\Pembimbing;

use App\Models\Hubin;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Data Perusahaan')]
class DataHubinEdit extends Component
{
    public Hubin $hubin;

    public $nama;

    public $alamat;

    protected $rules = [
        'nama' => 'required',
        'alamat' => 'required'
    ];

    protected $messages = ['*.required' => 'Silahkan Diisi'];

    public function mount($id)
    {
        $this->hubin = Hubin::find($id);
        $this->nama = $this->hubin->nama;
        $this->alamat = $this->hubin->alamat;
    }

    public function render()
    {
        return view('livewire.pembimbing.data-hubin-edit');
    }

    public function simpan()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            $this->hubin->nama = $this->nama;
            $this->hubin->alamat = $this->alamat;
            $this->hubin->save();

            DB::commit();

            flash('Berhasil Update Data Perusahaan');

            $this->redirectRoute('data-hubin', navigate: true);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            $this->redirectRoute('data-hubin', navigate: true);
        }
    }
}
