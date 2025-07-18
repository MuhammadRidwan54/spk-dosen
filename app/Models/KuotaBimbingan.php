<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuotaBimbingan extends Model
{
    use HasFactory;

    protected $table = 'kuota_bimbingan';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'kategori',
        'range',
        'score'
    ];

    protected $casts = [
        'score' => 'integer',
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'kuota_bimbingan_id');
    }
}