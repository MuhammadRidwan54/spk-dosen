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
        'kuota_bimbingan_id',
        'minat_id' // Ini untuk minat utama (one-to-many)
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

    // Relasi one-to-many dengan minat (minat utama)
    public function minat()
    {
        return $this->belongsTo(Minat::class, 'minat_id');
    }

    // Relasi many-to-many dengan bidang keahlian
    public function bidangKeahlian()
    {
        return $this->belongsToMany(BidangKeahlian::class, 'dosen_bidang_keahlian', 'dosen_id', 'bidang_keahlian_id');
    }

    // Relasi many-to-many dengan minat (tambahan minat)
    public function minatTambahan()
    {
        return $this->belongsToMany(Minat::class, 'dosen_minat', 'dosen_id', 'minat_id');
    }
}