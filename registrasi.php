<?php
require 'function.php';
if(isset($_POST["registrasi"])){
    if(registrasi($_POST) > 0){
        echo "<script>
                alert('User baru berhasil ditambahkan!');
                window.location = 'login.php';
             </script>";
    } else {
        echo mysqli_error($conn);
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
    <title>Sign up · 2026 Redesign Preview</title>
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
  <body>
    <div class="auth-shell">
      <aside class="auth-aside">
        <div class="auth-brand">
          <div class="logo">
            <svg viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
              <path
                fill="#fff"
                d="M14.747 9.125c.527-1.426 1.736-2.573 3.317-2.573c1.643 0 2.792 1.085 3.318 2.573l6.077 16.867c.186.496.248.931.248 1.147c0 1.209-.992 2.046-2.139 2.046c-1.303 0-1.954-.682-2.264-1.611l-.931-2.915h-8.62l-.93 2.884c-.31.961-.961 1.642-2.232 1.642c-1.24 0-2.294-.93-2.294-2.17c0-.496.155-.868.217-1.023l6.233-16.867zm.34 11.256h5.891l-2.883-8.992h-.062l-2.946 8.992z"
              />
            </svg>
          </div>
          <div class="name">Adminator</div>
        </div>
        <div class="auth-aside-body">
          <span class="auth-aside-eyebrow">2026 · mini website</span>
          <h1>mini website tugas promnet</h1>
          <p>
            Selamat datang di mini website.
          </p>
          <div class="auth-quote">
            "We replaced four bespoke admin tools with one Adminator workspace.
            The dark mode alone earned its keep."
            <div class="auth-quote-author">
              <div class="av">DD</div>
              <div>Dzila Dhiyaul · Head of Engineering, Northwind</div>
            </div>
          </div>
        </div>
      </aside>
      <main class="auth-main">
        <div class="auth-main-top"> 
          <div class="switch-link">
            Already have an account? <a href="login.php">login</a>
          </div>
        </div>
        <div class="auth-card">
          <h2>Create your workspace</h2>
          <p class="sub">
            registrasi
          </p>
          <form>
            <div class="field">
              <label for="username">username</label>
              <input
                id="username"
                class="input"
                type="text"
                placeholder="Masukan username"
                required
              />
            </div>
            <div class="field">
              <label for="password">password</label>
              
                <input
                  id="password"
                  class="input"
                  type="password"
                  placeholder="Masukan Password"
                  required
                />
              
            </div>
            <div class="field">
              <label for="password2">konfirmasi password</label>
              <div class="input-group">
                <input
                  id="konfirmasi password"
                  class="input"
                  type="password"
                  placeholder="Konfirmasi Password"
                  required
                />
            </div>
            </div>

            <br>
             <!-- Button -->
                <div class="button-group">
                    <button type="submit" name="register" class="btn btn-edit"> Registrasi </button>
                    <a href="login.php" class="btn btn-kembali"> Login </a>
                </div>
      </main>
  </body>
</html>
