@extends('layouts.app')

@section('title', 'Form Lapor Banjir')

@section('content')
    <h2>Formulir Pelaporan Banjir</h2>
    <p>Silakan isi data kejadian banjir di wilayah Anda dengan benar.</p>

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lapor.kirim') }}" method="POST">
        @csrf

        <label>Nama Pelapor</label>
        <input type="text" name="nama" value="{{ old('nama') }}">

        <label>Kecamatan</label>
        <input type="text" name="kecamatan" value="{{ old('kecamatan') }}">

        <label>Desa</label>
        <input type="text" name="desa" value="{{ old('desa') }}">

        <label>Tinggi Genangan (cm)</label>
        <input type="number" name="tinggi_genangan" value="{{ old('tinggi_genangan') }}">

        <button type="submit">Kirim Laporan</button>
    </form>
@endsection