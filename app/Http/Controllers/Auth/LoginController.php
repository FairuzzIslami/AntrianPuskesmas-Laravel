<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 Redirect sesuai role
            if ($user->role === 'pasien') {
                return redirect()->route('pasien.beranda')
                    ->with('success', 'Login berhasil! Selamat datang di dashboard pasien.');
            }

            // Jika nanti butuh role lain
            if ($user->role === 'dokter') {
                return redirect()->route('dokter.dashboard')
                    ->with('success', 'Login berhasil! Selamat datang di dashboard dokter.');
            }

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Login berhasil! Selamat datang di dashboard admin.');
            }

            // Default fallback
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Berhasil logout.');
    }
}
