<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'poli_id',
        'nomor_antrian',
        'status',
        'tanggal'
    ];

    // Relasi dengan pasien (user)
    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    // Relasi dengan poli
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    // Scope untuk antrian hari ini
    public function scopeHariIni($query)
    {
        return $query->whereDate('tanggal', today());
    }

    // Scope untuk status tertentu
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}