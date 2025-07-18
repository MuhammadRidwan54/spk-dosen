<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanTerakhir extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_terakhir';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'pendidikan',
        'score'
    ];

    protected $casts = [
        'score' => 'integer',
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'pendidikan_terakhir_id');
    }
}