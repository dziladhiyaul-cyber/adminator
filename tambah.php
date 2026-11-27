<?php
session_start();
if( !isset($_SESSION['session_login'])){
    header('Location: login.php');
    exit; 
}
require 'function.php';
if(isset($_POST["submit"])){
    if(tambah_data($_POST) > 0){
        echo "<script>alert('Data berhasil ditambahkan!'); window.location = 'basic-table.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Inter+Tight:wght@500;600;700&amp;family=JetBrains+Mono:wght@400;500&amp;display=swap"
    />
    <title>Forms · 2026 Redesign Preview</title>
    <script>
      !(function () {
        try {
          var t = localStorage.getItem("dash26-theme"),
            e = window.matchMedia("(prefers-color-scheme: dark)").matches;
          document.documentElement.setAttribute(
            "data-theme",
            t || (e ? "dark" : "light"),
          );
        } catch (t) {
          document.documentElement.setAttribute("data-theme", "light");
        }
      })();
    </script>
    <script defer="defer" src="runtime.096d507f.js"></script>
    <script defer="defer" src="2026.5a84696f.js"></script>
    <link href="style.76ee5eee.css" rel="stylesheet" />
  </head>
  <body data-active="forms" data-crumbs="Components | Forms">
    <div class="shell">
      <div data-shell-sidebar></div>
      <div class="main">
        <div data-shell-topbar></div>
        <main class="content">
          <section class="hero">
            <div class="hero-text">
              <span class="eyebrow">Tambah · 02</span>
              <h1 class="hero-title">Tambah Data</h1>
              <p class="hero-sub">
                Selamat datang di halaman tambah data
              </p>
            </div>
            <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn--primary">Simpan Data</button>
                  </div>
          </section>
          <div class="grid">
            <section class="col-12 card">
              <div class="card-head">
                <div class="card-title-wrap">
                  <h2 class="card-title">Tambah Data Karyawan</h2>
                </div>
              </div>
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-grid">
                    <div class="field span-2">
                      <label class="field-label">Nama</label>
                      <input type="text" name="nama" class="input" required>
                    </div>
                    <div class="field span-2">
                      <label class="field-label">Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="input" required>
                    </div>
                    <div class="field span-2">
                      <label class="field-label">Email</label>
                      <input type="email" name="email" class="input" required>
                    </div>
                    <div class="field span-2">
                      <label class="field-label">Gambar</label>
                      <input type="file" name="gambar" class="input" required>
                    </div>
                    </div>
                </form>
            </section>
  </body>
</html>
