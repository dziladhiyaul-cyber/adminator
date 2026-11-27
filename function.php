<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mini website");

function query_db($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) { 
        $rows[] = $row; 
    }
    return $rows; 
}

function tambah_data($data){
    global $conn;
    
    // TAMBAHKAN BARIS INI
    $nama = $data["nama"];
    $pekerjaan = $data["pekerjaan"];
    $email = $data["email"];

    $gambar = upload_gambar($pekerjaan); 
    if( !$gambar ){
        return false;
    }

    // UPDATE QUERY INSERT-NYA
    $query = "INSERT INTO jobdesk (nama, pekerjaan, email, gambar)
              VALUES ('$nama', '$pekerjaan', '$email', '$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_data($id){
    global $conn;
    
    // Hapus dari tabel jobdesk
    $query = "DELETE FROM jobdesk WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_data($data){
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"]; // WAJIB DITAMBAHKAN
    $pekerjaan = $data["pekerjaan"];
    $email = $data["email"];
    $gambarLama = $data["gambarLama"];

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload_gambar($pekerjaan);
    }

    // Update ke tabel jobdesk (WAJIB TAMBAHKAN NAMA)
    $query = "UPDATE jobdesk SET
                nama = '$nama',
                pekerjaan = '$pekerjaan',
                email = '$email',
                gambar = '$gambar'
              WHERE id = $id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari_data($keyword) {
    global $conn;
    $keyword = mysqli_real_escape_string($conn, $keyword);
    
    // Cari di tabel jobdesk
    $query = "SELECT * FROM jobdesk
              WHERE
              pekerjaan LIKE '%$keyword%' OR
              email LIKE '%$keyword%'";

    return query_db($query);
}

function upload_gambar($pekerjaan){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if( $error === 4 ){
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>alert('Yang anda upload bukan gambar!');</script>";
        return false;
    }

    if( $ukuranFile > 5000000 ){
        echo "<script>alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }

    // Nama file digabung dengan timestamp agar unik
    $namaFileBaru = time() . "_" . $pekerjaan . '.' . $ekstensiGambar;
    
    // WAJIB: Buat folder 'img' di dalam folder project kamu
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    if($password !== $konfirmasi_password ){
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert ke tabel user
    mysqli_query($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");
    return mysqli_affected_rows($conn);
}
?>