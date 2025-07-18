<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minat extends Model
{
    use HasFactory;

    protected $table = 'minat';
    protected $primaryKey = 'id_minat';
    protected $fillable = ['nama'];

    // Relasi many-to-many dengan dosen
    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_minat', 'minat_id', 'dosen_id');
    }
}
