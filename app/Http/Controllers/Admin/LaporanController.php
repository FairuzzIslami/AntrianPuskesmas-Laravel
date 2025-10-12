<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanDokter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua laporan dokter dari database
        $laporan = LaporanDokter::orderBy('created_at', 'desc')->get();

        // Kirim data ke view admin.laporan
        return view('admin.laporan', compact('laporan'));
    }

    public function exportPDF()
    {
        $laporan = LaporanDokter::with('dokter')->get();

        $pdf = Pdf::loadView('admin.laporan_pdf', compact('laporan'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan_pemeriksaan.pdf');
    }
    public function exportExcel()
    {
        $laporan = LaporanDokter::with('dokter')->get();

        return Excel::download(new \App\Exports\LaporanExport($laporan), 'laporan_pemeriksaan.xlsx');
    }
}
