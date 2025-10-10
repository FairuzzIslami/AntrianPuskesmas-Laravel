<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanDokter extends Model
{
    use HasFactory;

    protected $table = 'laporan_dokter'; // atau nama tabel yang sesuai

    protected $fillable = [
        'dokter_id',
        'nama_pasien',
        'diagnosa',
        'catatan_medis',
        'resep_obat',
        'tekanan_darah',
        'suhu_tubuh',
        'detak_jantung',
    ];

    public function dokter()
{
    return $this->belongsTo(User::class, 'dokter_id');
}

}
