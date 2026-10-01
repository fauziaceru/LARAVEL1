<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kas Kelas')</title>
    <style>
        body { font-family: sans-serif; max-width: 960px; margin: 2rem auto; padding: 0 1rem; }
        nav { display: flex; gap: 1rem; margin-bottom: 2rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #bbb; padding: .6rem; text-align: left; }
        .success { padding: .75rem; background: #dcfce7; }
        .error { color: #b91c1c; }
        label { display: block; margin-top: 1rem; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('kategori.index') }}">Kategori</a>
        <a href="{{ route('kategori.create') }}">Tambah Kategori</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>