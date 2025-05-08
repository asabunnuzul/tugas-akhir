<?php

namespace App\Livewire\Admin;

use App\Models\KategoriNilai;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Atur Kategori Nilai')]
class AturKategoriNilai extends Component
{
    public $nama;

    protected $rules = ['nama' => 'required'];
    protected $messages = ['*.required' => 'Tidak boleh Kosong'];

    public function render()
    {
        return view('livewire.admin.atur-kategori-nilai');
    }

    public function simpan()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            KategoriNilai::create(['nama' => $this->nama]);
            $this->reset();
            flash('Berhasil Tambah Kategori Nilai');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    #[Computed()]
    public function listKategori()
    {
        return KategoriNilai::query()
            ->orderBy('nama')
            ->get();
    }
}
