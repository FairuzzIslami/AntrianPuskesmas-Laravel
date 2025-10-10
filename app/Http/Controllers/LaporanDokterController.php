<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanDokter;
use App\Models\User;

class LaporanDokterController extends Controller
{
    
    public function create($pasien_id)
    {
        $pasien = User::findOrFail($pasien_id);
        return view('dokter.laporan.create', compact('pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required',
            'nama_pasien' => 'required',
            'diagnosa' => 'required',
            'catatan_medis' => 'nullable',
        ]);

        LaporanDokter::create([
            'dokter_id' => $request->dokter_id,
            'nama_pasien' => $request->nama_pasien,
            'diagnosa' => $request->diagnosa,
            'catatan_medis' => $request->catatan_medis,
        ]);

        return redirect()->route('dokter.dashboard')->with('success', 'Laporan berhasil dikirim ke admin!');
    }
}
