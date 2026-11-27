<?php
session_start();
if( !isset($_SESSION['session_login'])){
    header('Location: login.php');
    exit; 
}
require 'function.php';

// Pagination
$jumlahDataPerHalaman = 5; // Menampilkan 5 data
$jumlahData = count(query_db("SELECT * FROM jobdesk"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

// Ambil data dengan LIMIT
$data_jobdesk = query_db("SELECT * FROM jobdesk LIMIT $awalData, $jumlahDataPerHalaman");
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
    <title>Basic Table · 2026 Redesign Preview</title>
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
    <link href="style.76ee5eee.css" rel="stylesheet" />
  </head>
  <body data-active="basic-table" data-crumbs="Components | Tables | Basic">
    <div class="shell">
      <div data-shell-sidebar></div>
      <div class="main">
        <div data-shell-topbar></div>
        <main class="content">
          <section class="hero">
            <div class="hero-text">
              <span class="eyebrow">Dashboard · 01</span>
              <h1 class="hero-title">Daftar Karyawan</h1>
              <p class="hero-sub">
                Selamat datang di dashboard template
              </p>
            </div>
            <div class="hero-actions">
              <a href="tambah.php" class="btn btn--primary">Tambah Data</a>
            </div>
          </section>
          <div class="grid">
            <section class="col-12 card">
              <div class="card-head">
                <div class="card-title-wrap">
                  <span class="eyebrow">Data Terbaru · 2026</span>
                  <h2 class="card-title">Data Jobdesk Karyawan</h2>
                </div>
              </div>
              <div class="table-scroll">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Pekerjaan</th>
                      <th>Email</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = $awalData + 1; ?>
                    <?php foreach( $data_jobdesk as $data ) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $data["nama"]; ?></td>
                      <td><?= $data["pekerjaan"]; ?></td>
                      <td><?= $data["email"]; ?></td>
                      <td><img src="img/<?= $data["gambar"]; ?>" width="100" height= "100"></td>
                      <td>
                        <a href="edit.php?id=<?= $data["id"]; ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $data["id"]; ?>" class="btn btn-hapus">Hapus</a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <br>
          <!-- ============================ -->
        <!-- ========PAGINATION========== -->
        <!-- ============================ -->

  </body>
</html>
