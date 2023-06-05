<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="Logo.png" />
  <title>BharunaBhaktiutama</title>
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <style>
    body {
      background-image: url('aset/Logo.png');
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-end"><a href="Login" class="log-button">Login</a></div>
  <div class="container">
    <div class="logo">
      <img src="{{ asset('aset/Logo.png') }}">
    </div>
    <h1>Selamat Datang</h1>
    <p>Sistem Informasi lembaga Diklat Bharuna Bhakti Utama</p>
    <div class="button-container">
      <a href="Pendaftaran" class="button blue-button">Pendaftaran</a>
      <a href="soal" class="button green-button">Ujian Keahlian</a>
      <a href="soal" class="button red-button">Try Out</a>
    </div>
  </div>
</body>
</html>