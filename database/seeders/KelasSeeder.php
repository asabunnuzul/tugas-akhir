<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '10 PBS 1',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '10 PBS 2',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '10 PBS 3',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '10 TKJ 1',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '10 TKJ 2',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '10 TKJ 3',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '10 TKR 1',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '10 TKR 2',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '10 TKR 3',
                'tingkat' => 10,
            ],
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '11 PBS 1',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '11 PBS 2',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '11 PBS 3',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '11 TKJ 1',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '11 TKJ 2',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '11 TKJ 3',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '11 TKR 1',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '11 TKR 2',
                'tingkat' => 11,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '11 TKR 3',
                'tingkat' => 11,
            ],

            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '12 PBS 1',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '12 PBS 2',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'PBS',
                'nama_keahlian' => 'Perbankan Syariah',
                'nama' => '12 PBS 3',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '12 TKJ 1',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '12 TKJ 2',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'TKJ',
                'nama_keahlian' => 'Teknik Komputer dan Jaringan',
                'nama' => '12 TKJ 3',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '12 TKR 1',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '12 TKR 2',
                'tingkat' => 12,
            ],
            [
                'kode_keahlian' => 'TKR',
                'nama_keahlian' => 'Teknik Kendaraan Ringan',
                'nama' => '12 TKR 3',
                'tingkat' => 12,
            ],
        ];
        collect($data)->each(
            fn($kelas) => Kelas::create($kelas)
        );
    }
}
