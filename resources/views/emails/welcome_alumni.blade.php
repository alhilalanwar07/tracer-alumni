<!DOCTYPE html>
<html>
<head>
    <title>Selamat datang di Alumni Portal</title>
</head>
<body>
    <h1>Halo, {{ $nama }}!</h1>
    <p>Selamat datang di platform alumni kami. Anda sekarang telah terdaftar sebagai alumni.</p>
    <p>Gunakan email ini untuk login: {{ $user->email }}</p>
    <p>Password default Anda adalah <strong>12345678</strong>. Anda bisa mengubah password setelah login.</p>
</body>
</html>
