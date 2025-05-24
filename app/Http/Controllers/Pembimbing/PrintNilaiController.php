<?php

namespace App\Http\Controllers\Pembimbing;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PrintNilaiController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = [
            'listNilai' => Penilaian::query()
                ->whereNis($request->nis)
                ->with(['kategori:id,nama'])
                ->get()
        ];
        return view('print.pembimbing.print-nilai',$data);
    }
}
