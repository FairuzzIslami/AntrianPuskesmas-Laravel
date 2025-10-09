<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien'; // 👈 tambahkan baris ini

    protected $fillable = ['name', 'email', 'status_antrian'];
}
