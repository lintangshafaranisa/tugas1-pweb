<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Golden Glow Salon</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    {{-- HEADER + SIDEBAR --}}
    @include('partials.navbar')

    @if (session('success'))
        <div class="container mt-3">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    <footer>
        <p>Kontak Kami</p>
        <table>
            <tr>
                <td><img src="{{ asset('logo-alamat.png') }}" width="25"></td>
                <td>Alamat : Jln.Mawar No.15</td>
                <td><img src="{{ asset('logo-ig.png') }}" width="25"></td>
                <td>@goldenglowid</td>
            </tr>
            <tr>
                <td><img src="{{ asset('logo-wa.png') }}" width="25"></td>
                <td>+6282140325310</td>
                <td><img src="{{ asset('logo-email.png') }}" width="25"></td>
                <td>goldenglowsalon@gmail.com</td>
            </tr>
        </table>
        <hr>
        <p>&copy; 2026 Golden Glow Salon</p>
    </footer>

    <script src="{{ asset('script.js') }}"></script>

    @stack('scripts')

</body>

</html>
