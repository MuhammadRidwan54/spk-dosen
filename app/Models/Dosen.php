<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    
    protected $fillable = [
        'nama',
        'nik',
        'pendidikan_terakhir_id',
        'jabatan_fungsional_id',
        'kuota_bimbingan_id'
    ];

    public function pendidikanTerakhir()
    {
        return $this->belongsTo(PendidikanTerakhir::class, 'pendidikan_terakhir_id');
    }

    public function jabatanFungsional()
    {
        return $this->belongsTo(JabatanFungsional::class, 'jabatan_fungsional_id');
    }

    public function kuotaBimbingan()
    {
        return $this->belongsTo(KuotaBimbingan::class, 'kuota_bimbingan_id');
    }
}