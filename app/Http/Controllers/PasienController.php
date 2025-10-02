<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Dashboard pasien
     */
    public function index()
    {
        return view('pasien.beranda'); // arahkan ke Blade pasien/dashboard.blade.php
    }
}
