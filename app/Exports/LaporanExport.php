<?php

namespace App\Exports;

use App\Models\LaporanDokter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    protected $laporan;

    public function __construct($laporan)
    {
        $this->laporan = $laporan;
    }

    public function view(): View
    {
        return view('admin.laporan_excel', [
            'laporan' => $this->laporan
        ]);
    }
}
