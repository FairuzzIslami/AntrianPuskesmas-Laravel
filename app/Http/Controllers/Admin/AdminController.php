<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Kelola Laporan
    public function laporan()
    {
        $laporan = [
            ['judul' => 'Laporan Harian', 'tanggal' => '2025-10-01'],
            ['judul' => 'Laporan Mingguan', 'tanggal' => '2025-09-25'],
        ];

        return view('admin.laporan', compact('laporan'));
    }
}
