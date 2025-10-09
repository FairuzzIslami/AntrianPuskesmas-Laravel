<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanMedis extends Model
{
    use HasFactory;

    protected $table = 'catatan_medis';

    protected $fillable = [
        'pasien_id',
        'diagnosa',
        'tindakan',
        'resep_obat'
    ];

    // Relasi ke pasien (opsional jika ada tabel pasien)
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
