@extends('layouts.app')

@section('title', 'Daftar Laporan Banjir')

@section('content')
    <h2>Daftar Laporan Banjir Terkini</h2>
    <p>Berikut adalah daftar laporan kejadian banjir yang masuk dari masyarakat:</p>
    <hr style="margin-bottom: 20px; border: 0; border-top: 1px solid #eee;">

    @forelse($laporans as $laporan)
        @include('partials.laporan-card', ['laporan' => $laporan])
    @empty
        <p>Belum ada laporan banjir yang terdaftar.</p>
    @endforelse
@endsection