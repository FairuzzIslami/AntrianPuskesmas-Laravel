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

   public function panggil($id)
    {
        $pasien = User::findOrFail($id);
        
        // Reset pasien lain ke status 'menunggu' supaya tidak ganda
        User::where('status_antrian', 'dipanggil')->update(['status_antrian' => 'menunggu']);
        
        // Ubah status pasien ini ke 'dipanggil'
        $pasien->status_antrian = 'dipanggil';
        $pasien->save();

        return redirect()->back()->with('success', 'Pasien ' . $pasien->name . ' sedang dipanggil.');
    }

     public function mulai($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'dalam pemeriksaan';
        $pasien->save();

        return redirect()->back()->with('success', 'Pemeriksaan dimulai untuk ' . $pasien->name);
    }

    public function selesai($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'selesai';
        $pasien->save();

        return redirect()->back()->with('success', 'Pemeriksaan selesai untuk ' . $pasien->name);
    }

    public function hapus($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'menunggu';
        $pasien->save();

        return redirect()->back()->with('success', 'Riwayat pasien dihapus.');
    }


    // CATATAN MEDIS
    public function catatanMedis()
    {
        return view('dokter.catatan-medis');
    }
}
