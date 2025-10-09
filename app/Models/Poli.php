<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'deskripsi',
        'status'
    ];

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}