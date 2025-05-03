<?php

use Carbon\Carbon;

function getDynamicTahun($tahun, $tingkat)
{
    $tahunParts = explode(" / ", $tahun);
    $startYear = (int) $tahunParts[0];
    $endYear = (int) $tahunParts[1];

    // Adjust based on tingkat
    if ($tingkat == 7) {
        $startYear -= 2;
        $endYear -= 2;
    } elseif ($tingkat == 8) {
        $startYear -= 1;
        $endYear -= 1;
    }

    // Return the dynamic tahun
    return "{$startYear} / {$endYear}";
}

function rupiah($angka)
{
    return 'Rp. ' . number_format($angka, 0, ',', '.');
}

function formatUang($angka)
{
    return number_format($angka, 0, ',', '.');
}

function ambilAngka($string)
{
    return str_replace(['Rp. ', '.'], '', $string);
}

function tanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('d F Y');
}

function tanggalSingkat($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('d M Y');
}

function hariTanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('l, d F Y');
}
function imageToBase64($path)
{
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
    return '';
}


function jam($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('H:i:s');
}

function jamTanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('d M Y - H:i:s');
}

function namaHari($hari)
{
    $nama_hari = '';

    switch ($hari) {
        case '1':
            $nama_hari = 'Senin';
            break;
        case '2':
            $nama_hari = 'Selasa';
            break;
        case '3':
            $nama_hari = 'Rabu';
            break;
        case '4':
            $nama_hari = 'Kamis';
            break;
        case '5':
            $nama_hari = 'Jumat';
            break;
        case '6':
            $nama_hari = 'Sabtu';
            break;

        default:
            // code...
            break;
    }

    return $nama_hari;
}

function namaBulan($bulan)
{
    $bulan ?
        $return = Carbon::parse(date('Y-' . $bulan . '-d'))->translatedFormat('F') :
        $return = null;

    return $return;
}

function namaGunabayar($gunabayarId)
{
    $gunabayar = '';

    switch ($gunabayarId) {
        case '01':
            $gunabayar = 'Juli';
            break;
        case '02':
            $gunabayar = 'Agustus';
            break;
        case '03':
            $gunabayar = 'September';
            break;
        case '04':
            $gunabayar = 'Oktober';
            break;
        case '05':
            $gunabayar = 'November';
            break;
        case '06':
            $gunabayar = 'Desember';
            break;
        case '07':
            $gunabayar = 'Januari';
            break;
        case '08':
            $gunabayar = 'Februari';
            break;
        case '09':
            $gunabayar = 'Maret';
            break;
        case '10':
            $gunabayar = 'April';
            break;
        case '11':
            $gunabayar = 'Mei';
            break;
        case '12':
            $gunabayar = 'Juni';
            break;

        default:
            // code...
            break;
    }

    return $gunabayar;
}

function arrayBulan()
{
    return json_decode(json_encode([
        [
            'id' => '01',
            'nama' => 'Januari',
        ],
        [
            'id' => '02',
            'nama' => 'Februari',
        ],
        [
            'id' => '03',
            'nama' => 'Maret',
        ],
        [
            'id' => '04',
            'nama' => 'April',
        ],
        [
            'id' => '05',
            'nama' => 'Mei',
        ],
        [
            'id' => '06',
            'nama' => 'Juni',
        ],
        [
            'id' => '07',
            'nama' => 'Juli',
        ],
        [
            'id' => '08',
            'nama' => 'Agustus',
        ],
        [
            'id' => '09',
            'nama' => 'September',
        ],
        [
            'id' => '10',
            'nama' => 'Oktober',
        ],
        [
            'id' => '11',
            'nama' => 'November',
        ],
        [
            'id' => '12',
            'nama' => 'Desember',
        ],

    ]), false);
}

function arrayHari($hari)
{

    return json_decode(json_encode([
        [
            'id' => $hari . '1',
            'hari' => $hari,
            'jam' => '1-2',
        ],
        [
            'id' => $hari . '3',
            'hari' => $hari,
            'jam' => '3-4',
        ],
        [
            'id' => $hari . '5',
            'hari' => $hari,
            'jam' => '5-6',
        ],
        [
            'id' => $hari . '7',
            'hari' => $hari,
            'jam' => '7-8',
        ],
    ]));
}

function arrayJam()
{
    return ['1-2', '3-4', '5-6', '7-8'];
}

function arrayJenisIbadah()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'nama' => 'Dhuha',
            ],
            [
                'id' => 2,
                'nama' => 'Dhuhur',
            ],
            [
                'id' => 3,
                'nama' => 'Tadarus',
            ],
        ]
    ), false);
}

function arrayKategoriPenilaianGuru()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'nama' => 'Guru',
            ],
            [
                'id' => 2,
                'nama' => 'Karyawan',
            ],
        ]
    ), false);
}

function arrayKategoriPenilaianGuruRole()
{
    return json_decode(json_encode(
        [
            [
                'id' => 'Guru',
                'nama' => 'Guru',
            ],
            [
                'id' => 'Karyawan',
                'nama' => 'Karyawan',
            ],
        ]
    ), false);
}

function arrayKehadiran()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'nama' => 'Hadir',
            ],
            [
                'id' => 2,
                'nama' => 'Sakit',
            ],
            [
                'id' => 3,
                'nama' => 'Izin',
            ],
            [
                'id' => 4,
                'nama' => 'Alpha',
            ],
            [
                'id' => 5,
                'nama' => 'Bolos',
            ],
            [
                'id' => 6,
                'nama' => 'Izin Pulang',
            ],
        ]
    ), false);
}

function arrayKehadiranTanpaSakit()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'nama' => 'Hadir',
            ],
            [
                'id' => 3,
                'nama' => 'Izin',
            ],
            [
                'id' => 4,
                'nama' => 'Alpha',
            ],
            [
                'id' => 5,
                'nama' => 'Bolos',
            ],
            [
                'id' => 6,
                'nama' => 'Izin Pulang',
            ],
        ]
    ), false);
}

function arrayKehadiranGuru()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'nama' => 'Hadir',
            ],
            [
                'id' => 2,
                'nama' => 'Izin',
            ],
            [
                'id' => 3,
                'nama' => 'Alpha',
            ],
        ]
    ), false);
}

function namaKehadiranGuru($id)
{
    switch ($id) {
        case '1':
            return 'Hadir';
        case '2':
            return 'Izin';
        case '3':
            return 'Alpha';
        default:
            return '';
    }
}

function switchBulanKeGunabayar($monthId)
{
    $gunabayar = '';

    switch ($monthId) {
        case '01':
            $gunabayar = '07';
            break;
        case '02':
            $gunabayar = '08';
            break;
        case '03':
            $gunabayar = '09';
            break;
        case '04':
            $gunabayar = '10';
            break;
        case '05':
            $gunabayar = '11';
            break;
        case '06':
            $gunabayar = '12';
            break;
        case '07':
            $gunabayar = '01';
            break;
        case '08':
            $gunabayar = '02';
            break;
        case '09':
            $gunabayar = '03';
            break;
        case '10':
            $gunabayar = '04';
            break;
        case '11':
            $gunabayar = '05';
            break;
        case '12':
            $gunabayar = '06';
            break;

        default:
            // code...
            break;
    }

    return $gunabayar;
}
