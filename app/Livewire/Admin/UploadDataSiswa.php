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
    public function render()
    {
        return view('livewire.admin.upload-data-siswa');
    }
}
