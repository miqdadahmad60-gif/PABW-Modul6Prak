@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Profil Petugas BPBD</h2>
    <div class="card p-4 mt-3">
        <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Akun Dibuat Pada:</strong> {{ Auth::user()->created_at }}</p>
    </div>
</div>
@endsection