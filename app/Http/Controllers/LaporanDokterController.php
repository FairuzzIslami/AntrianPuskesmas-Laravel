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
            'nama_pasien' => 'required|string|max:255',
            'diagnosa' => 'required|string',
            'catatan_medis' => 'nullable|string',
            'resep_obat' => 'nullable|string',
            'tekanan_darah' => 'nullable|string',
            'suhu_tubuh' => 'nullable|string',
            'detak_jantung' => 'nullable|string',
        ]);

        LaporanDokter::create([
            'dokter_id' => $request->dokter_id,
            'nama_pasien' => $request->nama_pasien,
            'diagnosa' => $request->diagnosa,
            'catatan_medis' => $request->catatan_medis,
            'resep_obat' => $request->resep_obat,
            'tekanan_darah' => $request->tekanan_darah,
            'suhu_tubuh' => $request->suhu_tubuh,
            'detak_jantung' => $request->detak_jantung,
        ]);

        return redirect()->route('dokter.dashboard')->with('success', 'Laporan berhasil dikirim ke admin!');
    }

    public function destroy($id)
    {
        $laporan = \App\Models\LaporanDokter::findOrFail($id);
        $laporan->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
