<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;

#[Title('Buat Role')]
class BuatRole extends Component
{
    #[Validate('required')]
    public $nama;

    public function mount() {}

    public function render()
    {
        return view('livewire.admin.buat-role');
    }

    public function hapus($id)
    {
        DB::beginTransaction();

        try {
            Role::destroy($id);
            DB::commit();
            flash()->addWarning('Berhasil Hapus Role');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function simpan()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            Role::create([
                'name' => $this->nama,
                'guard_name' => 'web',
            ]);
            DB::commit();
            flash('Berhasil Simpan Role');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    #[Computed()]
    public function listRole()
    {
        return Role::query()
            ->orderBy('name')
            ->get();
    }
}
