<?php
require '../function.php';
$query = mysqli_query($conn, "SELECT max(kd_jual) as kd_besar FROM trans_jual");
$data_jual = mysqli_fetch_array($query);
$kd_jual = $data_jual['kd_besar'];

$urutan = (int) substr($kd_jual, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
$huruf = "BRG";
$kd_jual = $huruf . sprintf("%03s", $urutan);
echo $kd_jual;
$jual = 90;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name="author" content="Suckittrees">
    <title>Horizontal Dropdown Menu dengan CSS3 Suckittrees.com</title>
    <link rel="shortcut icon" href="http://suckittrees.com/favicon.png">
    <link rel="icon" href="http://suckittrees.com/favicon.png">
</head>

<body>
    <h1 align="center"><a href="suckittrees.com/artikel-121/membuat-menu-dropdown-dengan-css.html">Read Tutorial Suckittrees.com</a></h1>
    <h3>Membuat Penjumlahan Otomatis Suckittrees.com</h3>
    <input type="text" id="txt1" onkeyup="sub_harga();" />
    <!-- <input type="text" id="txt2" nkeyup="sub_harga();" /> -->
    <input type="text" id="txt3" />

</body>
<script>
    function sub_harga() {
        var txtFirstNumberValue = document.getElementById('jumlah').value;
        var txtSecondNumberValue = '<?= $brg["hargajual"]; ?>';
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('sub_harga').value = result;
        }
    }
</script>

</html>