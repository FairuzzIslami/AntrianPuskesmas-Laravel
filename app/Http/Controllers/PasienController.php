<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PasienController extends Controller
{

    public function index()
    {
        // Ambil semua pasien
        $pasiens = User::where('role', 'pasien')->orderBy('created_at', 'asc')->get();

        // Hitung jumlah pasien berdasarkan status antrian
        $totalPasien = $pasiens->count();
        $menunggu = $pasiens->where('status_antrian', 'menunggu')->count();
        $dipanggil = $pasiens->where('status_antrian', 'dipanggil')->count();
        $dalamPemeriksaan = $pasiens->where('status_antrian', 'dalam pemeriksaan')->count();
        $selesai = $pasiens->where('status_antrian', 'selesai')->count();

        // Kirim data ke view
        return view('dokter.daftar-pasien', compact(
            'pasiens',
            'totalPasien',
            'menunggu',
            'dipanggil',
            'dalamPemeriksaan',
            'selesai'
        ));
    }




    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);

        $validated['role'] = 'pasien';
        $validated['status_antrian'] = 'menunggu';
        $validated['password'] = bcrypt('password'); // default password biar bisa login jika perlu

        User::create($validated);

        return redirect()->route('dokter.pasien.index')
            ->with('success', 'Pasien berhasil didaftarkan dan masuk antrian menunggu.');
    }

    public function panggil($id)
    {
        User::where('status_antrian', 'dipanggil')->update(['status_antrian' => 'menunggu']);

        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'dipanggil';
        $pasien->save();

        return redirect()->back()->with('success', 'Pasien telah dipanggil.');
    }

    public function mulaiPemeriksaan($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'dalam pemeriksaan';
        $pasien->save();

        return redirect()->back()->with('success', 'Pasien sedang dalam pemeriksaan.');
    }

    public function selesai($id)
    {
        $pasien = User::findOrFail($id);
        $pasien->status_antrian = 'selesai';
        $pasien->save();

        return redirect()->back()->with('success', 'Pemeriksaan selesai.');
    }
}
