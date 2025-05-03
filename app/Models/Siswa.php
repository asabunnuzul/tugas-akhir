<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the biodata that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function biodata(): BelongsTo
    {
        return $this->belongsTo(Biodata::class, 'nis', 'nis')->withDefault();
    }

    /**
     * Get the kelas that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class)->withDefault();
    }

    /**
     * Get the siswa that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nis', 'nis')->withDefault();
    }
}
