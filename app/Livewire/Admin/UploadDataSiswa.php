<?php

namespace App\Livewire\Admin;

use App\Imports\Admin\ImportDataSiswa;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

#[Title('Upload Data Siswa')]
class UploadDataSiswa extends Component
{
    use WithFileUploads;

    public $file_upload;

    public function render()
    {
        return view('livewire.admin.upload-data-siswa');
    }

    public function upload_siswa()
    {
        $this->resetErrorBag();
        $this->validate(['file_upload' => 'required|mimes:xls,xlsx']);
        Excel::import(new ImportDataSiswa(), $this->file_upload);
        flash('Berhasil Upload Data Siswa');
        $this->reset();
    }
}
