<?php

// tipe data Char(karakter)
$jenis_kelamin = 'L';

// tipe data string(Teks)
$nama_lengkap = 'Oktafian Dwi Cahyono';

// tipe data integer
$umur = 28;

// tipe data float
$berat = 48.3;
// tipe data float
$tinggi = 182.2;

// tipe data boolean
$menikah = false;

if ($menikah > 0) {
    $menikah = "Sudah Menikah";
} else {
    $menikah = "Belum menikah";
}

echo "Nama : $nama_lengkap <br>";
echo "Jenis Kelamin : $jenis_kelamin <br>";
echo "Umur : $umur tahun <br>";
echo "Berat Badan : $berat <br>";
echo "Tinggi Badan : $tinggi <br>";
echo "Menikah : $menikah";
