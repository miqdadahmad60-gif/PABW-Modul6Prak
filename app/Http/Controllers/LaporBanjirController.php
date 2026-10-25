<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan; 

class LaporBanjirController extends Controller
{
    public function index()
    {
        $laporans = Laporan::all();
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
            'tinggi_genangan' => 'required|integer',
        ]);

        Laporan::create($validated);

        return redirect()->route('lapor.index')->with('success', 'Laporan berhasil dikirim dan disimpan!');
    }
}