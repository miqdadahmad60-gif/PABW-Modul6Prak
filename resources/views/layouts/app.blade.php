<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LaporBanjir - BPBD Kab. Bandung')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; color: #333; }
        header { background-color: #004080; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
        nav a { color: white; text-decoration: none; margin-left: 15px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 800px; margin: 30px auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        footer { text-align: center; padding: 15px; background-color: #ddd; margin-top: 40px; font-size: 14px; }
        .card { border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 6px; background: #fafafa; }
        button, .btn { padding: 8px 15px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        button:hover, .btn:hover { background-color: #0056b3; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .badge { padding: 4px 8px; border-radius: 4px; color: white; font-weight: bold; font-size: 12px; }
        .bg-waspada { background-color: #ffc107; color: #333; }
        .bg-siaga { background-color: #fd7e14; }
        .bg-awas { background-color: #dc3545; }
    </style>
</head>
<body>

    <header>
        <h2>BPBD Kab. Bandung - LaporBanjir</h2>
        <nav>
            <!-- Tombol Buat Laporan selalu tampil untuk umum/warga -->
            <a href="{{ route('lapor.form') }}">Buat Laporan</a>

            <!-- Jika pengguna BELUM login -->
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endguest

            <!-- Jika pengguna SUDAH login (Petugas) -->
            @auth
                <a href="{{ route('lapor.index') }}">Daftar Laporan</a>
                <a href="{{ route('profil') }}">Profil Petugas</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; font-weight: bold; cursor: pointer; font-size: 100%; padding: 0; margin-left: 15px;">Logout</button>
                </form>
            @endauth
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        &copy; 2026 Badan Penanggulangan Bencana Daerah (BPBD) Kabupaten Bandung
    </footer>

</body>
</html>