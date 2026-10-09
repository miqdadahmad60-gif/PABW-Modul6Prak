<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan; // Panggil Model Laporan

class LaporBanjirController extends Controller
{
    public function index()
    {
        // Data default (jika masih ingin ditampilkan bersama data database)
        $laporansDefault = [
            ['nama' => 'Budi Santoso', 'kecamatan' => 'Dayeuhkolot', 'desa' => 'Citeureup', 'tinggi_genangan' => 25],
            ['nama' => 'Siti Aminah', 'kecamatan' => 'Baleendah', 'desa' => 'Andir', 'tinggi_genangan' => 50],
            ['nama' => 'Asep Saepudin', 'kecamatan' => 'Bojongsoang', 'desa' => 'Ciganitri', 'tinggi_genangan' => 85],
        ];

        // Ambil data dari database melalui Model Laporan (diubah dari session ke database)
        $laporanDatabase = Laporan::all()->toArray();

        // Gabungkan data database dengan data default (atau gunakan Laporan::all() saja jika murni dari database)
        $laporans = array_merge($laporanDatabase, $laporansDefault);

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

        // Simpan data langsung ke database menggunakan Model Laporan::create
        $laporanBaru = Laporan::create($validated);

        // Tampilkan halaman konfirmasi dengan data yang baru saja disimpan
        return view('lapor-banjir.konfirmasi', [
            'laporan' => $laporanBaru
        ]);
    }
}