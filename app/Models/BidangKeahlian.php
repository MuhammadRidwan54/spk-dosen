<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    use HasFactory;

    protected $table = 'bidang_keahlian';
    protected $primaryKey = 'id_bidang_keahlian';
    
    protected $fillable = ['bidang'];

    // Relasi many-to-many dengan dosen
    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_bidang_keahlian', 'bidang_keahlian_id', 'dosen_id');
    }
}