<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard sesuai role user.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        switch ($user->role) {
            case 'admin':
                return view('dashboard.admin');
            case 'dokter':
                return view('dashboard.dokter');
            case 'pasien':
            default:
                return view('pasien.beranda');
        }
    }
}
