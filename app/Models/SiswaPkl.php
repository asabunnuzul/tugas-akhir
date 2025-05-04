<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiswaPkl extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the absensis for the SiswaPkl
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absensis(): HasMany
    {
        return $this->hasMany(Absensi::class,'nis','nis');
    }
    
    /**
     * Get the absensi that owns the SiswaPkl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class,'nis','nis')->withDefault();
    }

    /**
     * Get the hubin that owns the SiswaPkl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hubin(): BelongsTo
    {
        return $this->belongsTo(Hubin::class)->withDefault();
    }

    /**
     * Get the kelas that owns the SiswaPkl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class)->withDefault();
    }

    /**
     * Get the pembimbing that owns the SiswaPkl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pembimbing(): BelongsTo
    {
        return $this->belongsTo(User::class,'pembimbing_id')->withDefault();
    }

    /**
     * Get the siswa that owns the SiswaPkl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nis', 'nis')->withDefault();
    }

    /**
     * Get the user that owns the SiswaPkl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userHubin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_hubin_id')->withDefault();
    }
}
