<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>KEUANGAN App</title>
</head>
<body>
    <a href="{{ route('siswas.index') }}" class="btn btn-primary">Siswa</a>
    <a href="{{ route('uangs.index') }}" class="btn btn-primary">Uang</a>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
