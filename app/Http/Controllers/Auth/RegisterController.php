<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan form registrasi pasien
     */
    public function showRegistrationForm()
    {
        return view('pages.auth.register'); // Pastikan file Blade ada
    }

    /**
     * Proses registrasi user baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'pasien', 
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');

        // Redirect sesuai role
        if ($user->role === 'pasien') {
            return redirect()->route('pasien.beranda')
                ->with('success', 'Registrasi berhasil, selamat datang di dashboard pasien!');
        }

        return redirect()->route('dashboard')
            ->with('success', 'Registrasi berhasil!');
    }
}
