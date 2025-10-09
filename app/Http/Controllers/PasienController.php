<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PasienController extends Controller
{
    // ==============================
    // HALAMAN BERANDA PASIEN
    // ==============================
    public function index()
    {
        // Ambil data dokter dari database berdasarkan nama (karena belum ada kolom 'poli')
        $dokterUmum = User::where('role', 'dokter')->where('name', 'Zulfiadi')->first();
        $dokterGigi = User::where('role', 'dokter')->where('name', 'dokter 1')->first();
        $dokterAnak = User::where('role', 'dokter')->where('name', 'dokter 2')->first();

        // Format data dokter untuk beranda
        $formattedDokterUmum = $dokterUmum ? [
            'nama' => $dokterUmum->name,
            'email' => $dokterUmum->email,
            'spesialis' => 'Poli Umum',
            'jadwal' => 'Senin - Jumat, 07:30 - 14:00 WIB'
        ] : null;

        $formattedDokterGigi = $dokterGigi ? [
            'nama' => $dokterGigi->name,
            'email' => $dokterGigi->email,
            'spesialis' => 'Poli Gigi',
            'jadwal' => 'Senin - Kamis, 08:00 - 12:00 WIB'
        ] : null;

        $formattedDokterAnak = $dokterAnak ? [
            'nama' => $dokterAnak->name,
            'email' => $dokterAnak->email,
            'spesialis' => 'Poli Anak',
            'jadwal' => 'Setiap Hari, 08:00 - 14:00 WIB'
        ] : null;

        return view('pasien.beranda', compact(
            'formattedDokterUmum',
            'formattedDokterGigi', 
            'formattedDokterAnak'
        ));
    }

    // ==============================
    // POLI ANAK
    // ==============================
    public function poliAnak()
    {
        $user = auth()->user() ?? (object)['id' => 1, 'name' => 'Pasien Umum'];

        // Data antrian dummy
        $antrianAktif = (object)[
            'nomor_antrian' => 7,
            'status' => 'menunggu'
        ];

        $antrianSekarang = (object)[
            'nomor_antrian' => 5,
            'status' => 'dipanggil'
        ];

        $daftarAntrian = collect([
            (object)['nomor_antrian' => 5, 'status' => 'dipanggil'],
            (object)['nomor_antrian' => 6, 'status' => 'menunggu'],
            (object)['nomor_antrian' => 7, 'status' => 'menunggu'],
            (object)['nomor_antrian' => 8, 'status' => 'menunggu'],
        ]);

        // Ambil dokter jaga poli anak berdasarkan nama
        $dokterJaga = User::where('role', 'dokter')->where('name', 'dokter 2')->first();

        // Format data sebelum dikirim ke view
        $formattedDokter = $dokterJaga ? [
            'nama' => $dokterJaga->name,
            'email' => $dokterJaga->email,
            'spesialis' => 'Poli Anak',
            'jadwal' => 'Setiap Hari, 08:00 - 14:00 WIB'
        ] : [
            'nama' => 'Belum tersedia',
            'email' => '',
            'spesialis' => 'Poli Anak', 
            'jadwal' => 'Setiap Hari, 08:00 - 14:00 WIB'
        ];

        $dataPasien = [
            'nama' => $user->name,
            'tanggal_berobat' => now()->format('d F Y'),
            'lokasi_poli' => 'Poli Anak - Lantai 2, Ruang 201'
        ];

        return view('pasien.poli_anak', compact(
            'dataPasien',
            'antrianAktif',
            'antrianSekarang',
            'daftarAntrian',
            'formattedDokter'
        ));
    }

    // ==============================
    // POLI GIGI
    // ==============================
    public function poliGigi()
    {
        $user = auth()->user() ?? (object)['id' => 2, 'name' => 'Pasien Umum'];

        $antrianAktif = (object)[
            'nomor_antrian' => 3,
            'status' => 'dipanggil'
        ];

        $antrianSekarang = (object)[
            'nomor_antrian' => 3,
            'status' => 'dipanggil'
        ];

        $daftarAntrian = collect([
            (object)['nomor_antrian' => 3, 'status' => 'dipanggil'],
            (object)['nomor_antrian' => 4, 'status' => 'menunggu'],
            (object)['nomor_antrian' => 5, 'status' => 'menunggu'],
        ]);

        // Ambil dokter jaga poli gigi berdasarkan nama
        $dokterJaga = User::where('role', 'dokter')->where('name', 'dokter 1')->first();

        // Format data sebelum dikirim ke view
        $formattedDokter = $dokterJaga ? [
            'nama' => $dokterJaga->name,
            'email' => $dokterJaga->email,
            'spesialis' => 'Poli Gigi',
            'jadwal' => 'Senin - Kamis, 08:00 - 12:00 WIB'
        ] : [
            'nama' => 'Belum tersedia',
            'email' => '',
            'spesialis' => 'Poli Gigi',
            'jadwal' => 'Senin - Kamis, 08:00 - 12:00 WIB'
        ];

        $dataPasien = [
            'nama' => $user->name,
            'tanggal_berobat' => now()->format('d F Y'),
            'lokasi_poli' => 'Poli Gigi - Lantai 1, Ruang 102'
        ];

        return view('pasien.poli_gigi', compact(
            'dataPasien',
            'antrianAktif',
            'antrianSekarang',
            'daftarAntrian',
            'formattedDokter'
        ));
    }

    // ==============================
    // POLI UMUM
    // ==============================
    public function poliUmum()
    {
        $user = auth()->user() ?? (object)['id' => 3, 'name' => 'Pasien Umum'];

        $antrianAktif = (object)[
            'nomor_antrian' => 10,
            'status' => 'menunggu'
        ];

        $antrianSekarang = (object)[
            'nomor_antrian' => 9,
            'status' => 'dipanggil'
        ];

        $daftarAntrian = collect([
            (object)['nomor_antrian' => 9, 'status' => 'dipanggil'],
            (object)['nomor_antrian' => 10, 'status' => 'menunggu'],
            (object)['nomor_antrian' => 11, 'status' => 'menunggu'],
            (object)['nomor_antrian' => 12, 'status' => 'menunggu'],
        ]);

        // Ambil dokter jaga poli umum berdasarkan nama
        $dokterJaga = User::where('role', 'dokter')->where('name', 'Zulfiadi')->first();

        // Format data sebelum dikirim ke view
        $formattedDokter = $dokterJaga ? [
            'nama' => $dokterJaga->name,
            'email' => $dokterJaga->email,
            'spesialis' => 'Poli Umum',
            'jadwal' => 'Senin - Jumat, 07:30 - 14:00 WIB'
        ] : [
            'nama' => 'Belum tersedia',
            'email' => '',
            'spesialis' => 'Poli Umum',
            'jadwal' => 'Senin - Jumat, 07:30 - 14:00 WIB'
        ];

        $dataPasien = [
            'nama' => $user->name,
            'tanggal_berobat' => now()->format('d F Y'),
            'lokasi_poli' => 'Poli Umum - Lantai 1, Ruang 101'
        ];

        return view('pasien.poli_umum', compact(
            'dataPasien',
            'antrianAktif',
            'antrianSekarang',
            'daftarAntrian',
            'formattedDokter'
        ));
    }
}