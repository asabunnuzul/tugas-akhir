<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\Admin\ImportDataSiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UploadDataSiswaSimpanController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_upload' => 'required|file|mimes:xls,xlsx|max:10240', // 10MB max
        ], [
            'file_upload.required' => 'Silahkan Upload file_upload',
            'file_upload.mimes' => 'Format file_upload harus xls, xlsx',
            'file_upload.max' => 'Ukuran file maksimal 10MB',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                flash()->error($error);
            }
            return back();
        }

        DB::beginTransaction();

        try {
            Excel::import(new ImportDataSiswa(), $request->file('file_upload'));
            flash('Berhasil Upload Data Siswa');
            return to_route('upload-data-siswa');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
