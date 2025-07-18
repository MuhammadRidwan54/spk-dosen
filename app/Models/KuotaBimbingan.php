<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuotaBimbingan extends Model
{
    use HasFactory;

    protected $table = 'kuota_bimbingan';
    protected $fillable = ['kategori', 'range', 'score'];
}
