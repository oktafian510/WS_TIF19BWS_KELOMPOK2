<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../function.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// $user = query("SELECT * FROM tb_user WHERE username = '$username' AND password ='$password'");

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password ='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if ($data['user_level'] == "admin") {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['user_level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:../admin/index.html");

        // cek jika user login sebagai user
    } else if ($data['user_level'] == "user") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['user_level'] = "user";
        // alihkan ke halaman dashboard user
        header("location:register.php");

        // cek jika user login sebagai pbc
    } else if ($data['user_level'] == "pbc") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['user_level'] = "pbc";
        // alihkan ke halaman dashboard pbc
        header("location:../public/index.php?user=$username");
        // header("location:profile.php?username=$username");
    } else {

        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
