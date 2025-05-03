<?php

namespace App\Imports\Admin;

use App\Models\Biodata;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportDataSiswa implements ToCollection,WithHeadingRow, SkipsEmptyRows
{
    use SkipsErrors;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $password = bcrypt('12345678');
        
        foreach($collection as $data)
        {
            $user = User::create([
                'nis' => $data['nis'],
                'name' => $data['name'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'password' => $password
            ]);

            $user->assignRole('Siswa');

            Biodata::create([
                'nis' => $data['nis'],
                'nisn' => $data['nisn'],
                'nik' => $data['nik'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'nama_ayah' => $data['nama_ayah'],
                'nama_ibu' => $data['nama_ibu'],
                'alamat' => $data['alamat'],
                'rt' => $data['rt'],
                'rw' => $data['rw'],
                'desa' => $data['desa'],
                'kecamatan' => $data['kecamatan'],
                // 'kabupaten' => $data['kabupaten'],
                // 'provinsi' => $data['provinsi'],
            ]);

            Siswa::create([
                'tahun' => '2024 / 2025',
                'kelas_id' => $data['kelas_id'],
                'nis' => $data['nis'],
                'tingkat' => $data['tingkat']
            ]);
        }
    }
}
