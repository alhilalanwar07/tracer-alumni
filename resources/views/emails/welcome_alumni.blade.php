<!DOCTYPE html>
<html>
<head>
    <title>Selamat datang di Alumni Portal</title>
</head>
<body>
    <h1>Halo, {{ $nama }}!</h1>
    <p>Selamat datang di platform alumni kami. Anda sekarang telah terdaftar sebagai alumni.</p>
    <p>Gunakan email ini untuk login ke portal alumni kami.</p>
    <p>Anda dapat mengakses portal alumni di <a href="{{ url('/') }}">link ini</a>.</p>
    <p>Password default Anda adalah <strong>12345678</strong>. Anda bisa mengubah password setelah login.</p>
</body>
</html>
