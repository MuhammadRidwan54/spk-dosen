<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanFungsional extends Model
{
    use HasFactory;

    protected $table = 'jabatan_fungsional';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'jabatan',
        'score'
    ];

    protected $casts = [
        'score' => 'integer',
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'jabatan_fungsional_id');
    }
}