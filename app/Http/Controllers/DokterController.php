<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    // DASHBOARD DOKTER
    public function dashboard()
    {
        $pasiens = User::where('role', 'pasien')->get();

        $menunggu = $pasiens->where('status_antrian', 'menunggu')->count();
        $dipanggil = $pasiens->where('status_antrian', 'dipanggil')->count();
        $pemeriksaan = $pasiens->where('status_antrian', 'dalam pemeriksaan')->count(); // ✅ diperbaiki
        $selesai = $pasiens->where('status_antrian', 'selesai')->count();

        return view('dokter.dashboard', compact('pasiens', 'menunggu', 'dipanggil', 'pemeriksaan', 'selesai'));
    }


    // DAFTAR PASIEN
    public function daftarPasien()
    {
        $pasien = User::where('role', 'pasien')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('dokter.daftar-pasien', compact('pasien'));
    }

    // HALAMAN PEMANGGILAN PASIEN
    public function pemanggilan()
    {
        $pasien = User::where('role', 'pasien')->get();

        $menunggu = $pasien->where('status_antrian', 'menunggu')->count();
        $dipanggil = $pasien->where('status_antrian', 'dipanggil')->count();
        $pemeriksaan = $pasien->where('status_antrian', 'dalam pemeriksaan')->count(); // ✅ diperbaiki
        $selesai = $pasien->where('status_antrian', 'selesai')->count();

        return view('dokter.pemanggilan', compact('pasien', 'menunggu', 'dipanggil', 'pemeriksaan', 'selesai'));
    }

    // FUNGSI MEMANGGIL PASIEN
    public function panggil($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'dipanggil';
        $pasien->save();

        return redirect()->route('dokter.pemanggilan')->with('success', 'Pasien dipanggil.');
    }

    // FUNGSI SELESAI DIPERIKSA
    public function selesai($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'selesai'; // pastikan ini sama dengan yang di database
        $pasien->save();

        return redirect()->back()->with('success', 'Pemeriksaan selesai.');
    }


    // HAPUS PASIEN
    public function hapus($id)
    {
        $pasien = User::findOrFail($id);
        if ($pasien->role === 'pasien') {
            $pasien->delete();
            return redirect()->route('dokter.pemanggilan')->with('success', 'Pasien berhasil dihapus.');
        }
        return redirect()->route('dokter.pemanggilan')->with('error', 'Pasien tidak ditemukan atau bukan pasien.');
    }

    // CATATAN MEDIS
    public function catatanMedis()
    {
        return view('dokter.catatan-medis');
    }
}
