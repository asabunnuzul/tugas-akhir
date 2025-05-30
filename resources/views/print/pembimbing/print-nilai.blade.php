@extends('layouts.print.app')
@section('content')
    <div class="py-10">
        <div class="text-center font-bold text-xl">
            LEMBAR PENILAIAN PRAKTEK KERJA LAPANGAN
        </div>
        <div class="py-10">
            <table class="w-full text-sm text-slate-600">
                <thead class="text-sm text-slate-600 bg-gray-50">
                    <tr>
                        <th scope='col' class="px-2 py-3 border border-collapse border-black">
                            No
                        </th>
                        <th scope='col' class="px-2 py-3 border border-collapse border-black">
                            Aspek Penilaian
                        </th>
                        <th scope='col' class="px-2 py-3 border border-collapse border-black">
                            Nilai (1-100)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listNilai as $nilai)
                        <tr class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                            <td
                                class="px-2 py-2 font-medium text-center text-slate-600 border border-collapse border-black">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-2 py-2 font-medium text-slate-600 border border-collapse border-black">
                                {{ $nilai->kategori?->nama }}
                            </td>
                            <td
                                class="px-2 py-2 text-center font-medium text-slate-600 border border-collapse border-black">
                                {{ $nilai->nilai }}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-white border-b hover:bg-slate-300 odd:bg-slate-200">
                        <td colspan="2" class="px-2 py-2 font-bold text-center text-slate-600 border border-collapse border-black">
                            Rata - Rata
                        </td>
                        <td class="px-2 py-2 text-center font-medium text-slate-600 border border-collapse border-black">
                            {{ $listNilai->avg('nilai') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="justify-end flex">
            <div class="flex flex-col items-center justify-center">
                <div class="text-center">
                    Limbangan, {{ tanggal(date('Y-m-d')) }} <br>
                    Pimpinan Industri
                </div>
                <div class="py-10">&nbsp;</div>
                <div class="text-center">
                    ..............................................
                </div>
            </div>
        </div>
    </div>
@endsection
