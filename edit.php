<?php
session_start();
if( !isset($_SESSION['session_login'])){
    header('Location: login.php');
    exit; 
}
require 'function.php';

// TAMBAHKAN PENGECEKAN INI: Tendang kembali ke tabel jika tidak ada ID di URL
if( !isset($_GET["id"]) || empty($_GET["id"]) ) {
    header("Location: basic-table.php");
    exit;
}

$id = $_GET["id"];
$jobdesk = query_db("SELECT * FROM jobdesk WHERE id = $id")[0];

// ... sisa kodingan ke bawah tetap sama
?>
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
              <span class="eyebrow">Components · 03</span>
              <h1 class="hero-title">Forms</h1>
              <p class="hero-sub">
                Inputs, selects, textareas, switches, checkboxes, validation
                states — and a working "Profile settings" form to show how it
                all comes together.
              </p>
            </div>
            <div class="hero-actions">
              <button class="btn btn--ghost">Cancel</button>
              <button class="btn btn--primary">Save changes</button>
            </div>
          </section>
          <div class="grid">
            <section class="col-12 card">
              <div class="card-head">
                <div class="card-title-wrap">
                  <span class="eyebrow">Live example</span>
                  <h2 class="card-title">Profile settings</h2>
                </div>
                <span class="badge solid">DRAFT</span>
              </div>
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-grid">
                  <div class="field span-2">
                      <label class="field-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="input" value="<?= $jobdesk['nama']; ?>" required>
                  </div>
                  
                  <!-- INPUT PEKERJAAN (TAMBAHKAN INI) -->
                  <div class="field span-2">
                      <label class="field-label">Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="input" value="<?= $jobdesk['pekerjaan']; ?>" required>
                  </div>
                  
                  <!-- INPUT EMAIL (TAMBAHKAN INI) -->
                  <div class="field span-2">
                      <label class="field-label">Email</label>
                      <input type="email" name="email" class="input" value="<?= $jobdesk['email']; ?>" required>
                  </div>
                  
                  <div class="field span-2">
                      <label class="field-label">Gambar</label>
                      <br>
                      <img src="img/<?= $jobdesk['gambar']; ?>" width="100" height="100">
                      <input type="file" name="gambar" class="input">
                  </div>
                  </div>
                  <button type="submit" name="submit" class="btn btn--primary">Edit Data</button>
                </form>
            
          </div>
        </main>
        <div data-shell-footer></div>
      </div>
    </div>
  </body>
</html>
