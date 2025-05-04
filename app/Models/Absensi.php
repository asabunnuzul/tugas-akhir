<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the hubin that owns the Absensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hubin(): BelongsTo
    {
        return $this->belongsTo(Hubin::class)->withDefault();
    }

    /**
     * Get the kehadiran that owns the Absensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kehadiran(): BelongsTo
    {
        return $this->belongsTo(Kehadiran::class)->withDefault();
    }

    /**
     * Get the siswa that owns the Absensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nis', 'nis')->withDefault();
    }

    /**
     * Get the userHubin that owns the Absensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userHubin(): BelongsTo
    {
        return $this->belongsTo(User::class,'hubin_id')->withDefault();
    }
}
