<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $fillable = [
        'nama',
        'nik',
        'pendidikan_terakhir_id',
        'jabatan_fungsional_id',
        'kuota_bimbingan_id'
    ];

    public function pendidikanTerakhir(): BelongsTo
    {
        return $this->belongsTo(PendidikanTerakhir::class);
    }

    public function jabatanFungsional(): BelongsTo
    {
        return $this->belongsTo(JabatanFungsional::class);
    }

    public function kuotaBimbingan(): BelongsTo
    {
        return $this->belongsTo(KuotaBimbingan::class);
    }
}
