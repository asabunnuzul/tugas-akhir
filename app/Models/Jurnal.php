<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurnal extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the hubin that owns the Jurnal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hubin(): BelongsTo
    {
        return $this->belongsTo(Hubin::class)->withDefault();
    }

    /**
     * Get the kelas that owns the Jurnal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class)->withDefault();
    }

    /**
     * Get the pembimbing that owns the Jurnal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pembimbing(): BelongsTo
    {
        return $this->belongsTo(User::class,'pembimbing_id')->withDefault();
    }

    /**
     * Get the siswa that owns the Jurnal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class,'nis','nis')->withDefault();
    }
}
