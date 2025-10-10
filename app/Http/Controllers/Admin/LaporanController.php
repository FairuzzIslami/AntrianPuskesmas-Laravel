<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanDokter; // pastikan model ini ada
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua laporan dokter dari database
        $laporan = LaporanDokter::orderBy('created_at', 'desc')->get();

        // Kirim data ke view admin.laporan
        return view('admin.laporan', compact('laporan'));
    }
}
