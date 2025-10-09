<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\CatatanMedis;
use Illuminate\Http\Request;

class CatatanMedisController extends Controller
{
    // Tampilkan form untuk catatan medis pasien
    public function create($pasien_id)
    {
        // Ambil data pasien berdasarkan ID
        $pasien = User::findOrFail($pasien_id);

        // Tampilkan halaman form catatan medis
        return view('dokter.catatan-medis', compact('pasien'));
    }


    // Simpan catatan medis
    public function store(Request $request, $pasien_id)
    {
        $request->validate([
            'diagnosa' => 'required|string|max:255',
            'tindakan' => 'nullable|string',
            'resep_obat' => 'nullable|string'
        ]);

        CatatanMedis::create([
            'pasien_id' => $pasien_id,
            'diagnosa' => $request->diagnosa,
            'tindakan' => $request->tindakan,
            'resep_obat' => $request->resep_obat,
        ]);

        return redirect()->back()->with('success', 'Catatan medis berhasil disimpan.');
    }
}
