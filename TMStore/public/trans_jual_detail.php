<?php
include '../function.php';

function tambah($data)
{
    global $conn;
    $customers = $data['id_customers'];
    $kd_jual = htmlspecialchars($data["kd_jual"]);
    $tanggal_trans_jual = $data["tanggal_trans_jual"];
    $jumlah = htmlspecialchars($data["jumlah"]);
    $total_bayar = htmlspecialchars($data["total_bayar"]);
    $kd_barang = htmlspecialchars($data["kd_barang"]);
    $hargajual = htmlspecialchars($data["hargajual"]);
    $sub_harga = htmlspecialchars($data["sub_harga"]);
    $stoks = htmlspecialchars($data["stoks"]);
    $id_anggota = htmlspecialchars($data["id_anggota"]);
    $stok = $stoks - $jumlah;
    $bukti = "Belum diupload";


    $brg = query(" SELECT * FROM tb_barang WHERE kd_barang = '$kd_barang'")[0];
    $terjual = $brg['terjual'];
    $total_terjual = $terjual + $jumlah;

    if ($jumlah > 0 && $jumlah < $stoks) {

        $query = "INSERT INTO trans_jual VALUES ('$kd_jual',$customers,'$tanggal_trans_jual', '$jumlah','$total_bayar','$bukti','0','$id_anggota','Belum diupload','');";
        $query .= "INSERT INTO detail_jual VALUES ('$kd_jual', '$kd_barang', '$jumlah', '$hargajual', '$sub_harga');";

        // $query2 = "UPDATE tb_barang SET stok = '$stok' WHERE tb_barang = $kd_barang ;";

        // selesai
        $query .= "UPDATE tb_barang SET stok = '$stok', terjual = '$total_terjual' WHERE kd_barang = '$kd_barang';";




        $result = mysqli_multi_query($conn, $query);
        return $result;
    }


    // $update = "SELECT * FROM tb_barang WHERE id = $kd_barang;"[0];
    // $stok = $data["gambar"] - $jumlah;




}

// SALAH
// function ubah($data)
// {
//     global $conn;
//     $jumlah = htmlspecialchars($data["jumlah"]);
//     $kd_barang = htmlspecialchars($data["kd_barang"]);

//     $diskon = htmlspecialchars($data["diskon"]);
//     $stok = $diskon - $jumlah;
//     echo $stok . $kd_barang;
//     // UPDATE `tb_barang` SET `stok` = '10' WHERE `tb_barang`.`kd_barang` = 'K01';
//     $query = "UPDATE tb_barang SET 'stok' = '$stok' WHERE 'tb_barang'.'tb_barang' = 'K01'";


//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// }
