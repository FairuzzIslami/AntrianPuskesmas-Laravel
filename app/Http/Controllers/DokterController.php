<?php

namespace App\Http\Controllers;

use App\Models\User; // pastikan ini di atas controller
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function dashboard()
    {
        return view('dokter.dashboard');
    }

    public function daftarPasien()
    {
        $pasien = \App\Models\User::where('role', 'pasien')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('dokter.daftar-pasien', compact('pasien'));
    }



    public function pemanggilan()
    {
        // Ambil semua pasien
        $pasien = User::where('role', 'pasien')->get();

        return view('dokter.pemanggilan', compact('pasien'));
    }

    // Memanggil pasien
    public function panggil($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'dipanggil';
        $pasien->save();

        return redirect()->route('dokter.pemanggilan')->with('success', 'Pasien dipanggil.');
    }


    // Selesai diperiksa
    public function selesai($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'selesai';
        $pasien->save();

        return redirect()->route('dokter.pemanggilan')->with('success', 'Pasien selesai diperiksa.');
    }
    // Hapus pasien
    public function hapus($id)
    {
        $pasien = User::findOrFail($id);
        if ($pasien->role === 'pasien') {
            $pasien->delete();
            return redirect()->route('dokter.pemanggilan')->with('success', 'Pasien berhasil dihapus.');
        }
        return redirect()->route('dokter.pemanggilan')->with('success', 'Pasien tidak ditemukan atau bukan pasien.');
    }



    public function catatanMedis()
    {
        return view('dokter.catatan-medis');
    }
}
