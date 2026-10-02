<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
public function index()
    {
        $laporansDefault = [
            ['nama' => 'Budi Santoso', 'kecamatan' => 'Dayeuhkolot', 'desa' => 'Citeureup', 'tinggi_genangan' => 25],
            ['nama' => 'Siti Aminah', 'kecamatan' => 'Baleendah', 'desa' => 'Andir', 'tinggi_genangan' => 50],
            ['nama' => 'Asep Saepudin', 'kecamatan' => 'Bojongsoang', 'desa' => 'Ciganitri', 'tinggi_genangan' => 85],
        ];

        $laporanSession = session()->get('laporans_baru', []);

        $laporans = array_merge($laporanSession, $laporansDefault);

        return view('lapor-banjir.index', compact('laporans'));
    }

    public function form()
    {
        return view('lapor-banjir.form');
    }

    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'tinggi_genangan' => 'required|numeric|min:1',
        ]);

        $laporanSession = session()->get('laporans_baru', []);
        array_unshift($laporanSession, $validated); 
        session()->put('laporans_baru', $laporanSession);

        return view('lapor-banjir.konfirmasi', [
            'laporan' => $validated
        ]);
    }
}
