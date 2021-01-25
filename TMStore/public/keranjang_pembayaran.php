<?php
include '../function.php';

function tambah($data)
{
    global $conn;
    $kd_jual = htmlspecialchars($data["kd_jual"]);
    $customers = $data['id_customers'];
    $tanggal_trans_jual = $data["tanggal_trans_jual"];
    $jumlah_jual = htmlspecialchars($data["jumlah_jual"]);
    $total_bayar = htmlspecialchars($data["total_bayar"]);
    $bukti = "Belum diupload";
    $diskon = 0;
    $id_anggota = htmlspecialchars($data["id_anggota"]);
    $ket = "Belum diupload";




    // $jumlah = htmlspecialchars($data["jumlah"]);
    // $hargajual = htmlspecialchars($data["hargajual"]);
    // $stoks = htmlspecialchars($data["stoks"]);
    // $stok = $stoks - $jumlah;


    // $terjual = $brg['terjual'];
    // $total_terjual = $terjual + $jumlah;

    // if ($jumlah > 0 && $jumlah < $stoks) {




    $query = "INSERT INTO trans_jual VALUES ('$kd_jual',$customers,'$tanggal_trans_jual', '$jumlah_jual','$total_bayar','$bukti','$diskon','$id_anggota','$ket','');";

    $keranjang = query(" SELECT * FROM tb_keranjang WHERE id_customers = '$customers'");
    foreach ($keranjang as $row) :
        $kd_barang = $row["kd_barang"];
        $jumlah = $row["jumlah"];
        $sub_harga = $row["harga"];

        $brg = query(" SELECT * FROM tb_barang WHERE kd_barang = '$kd_barang'")[0];
        $harga = $brg["hargajual"];
        $stokbrg = $brg['stok'];
        $terjualbrg = $brg['terjual'];
        $stok = $stokbrg - $jumlah;
        $terjual = $terjualbrg + $jumlah;

        $query .= "INSERT INTO detail_jual VALUES ('$kd_jual', '$kd_barang', '$jumlah', '$harga', '$sub_harga');";
        $query .= "UPDATE tb_barang SET stok = '$stok', terjual = '$terjual' WHERE kd_barang = '$kd_barang';";
    endforeach;

    $query .= "DELETE FROM tb_keranjang WHERE id_customers = '$customers';";





    // $query .= "INSERT INTO detail_jual VALUES ('$kd_jual', '$kd_barang', '$jumlah', '$hargajual', '$sub_harga');";

    // $query .= "UPDATE tb_barang SET stok = '$stok', terjual = '$total_terjual' WHERE kd_barang = '$kd_barang';";




    $result = mysqli_multi_query($conn, $query);
    return $result;
    // }
}
