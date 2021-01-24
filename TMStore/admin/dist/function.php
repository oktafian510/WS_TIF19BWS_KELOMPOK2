<?php
include '../../function.php';
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_customers WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function article_hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_article WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function barang_hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_barang WHERE kd_barang = '$id'");
    return mysqli_affected_rows($conn);
}
function verifikasi($id)
{
    global $conn;
    mysqli_query($conn, "UPDATE tb_customers SET status = 'Terverifikasi' WHERE id = $id;");
    return mysqli_affected_rows($conn);
}
function transjualVerfikasi($id)
{
    global $conn;
    mysqli_query($conn, "UPDATE trans_jual SET ket = 'Terkonfirmasi' WHERE kd_jual = '$id';");
    return mysqli_affected_rows($conn);
}

function transjualkirim($id)
{
    global $conn;
    mysqli_query($conn, "UPDATE trans_jual SET ket = 'Dikirim' WHERE kd_jual = '$id';");
    return mysqli_affected_rows($conn);
}

function transjualHapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM trans_jual WHERE kd_jual = '$id'");
    return mysqli_affected_rows($conn);
}

function iklan($data)
{
    global $conn;
    $id = $data["id"];
    $foto = htmlspecialchars($data["foto"]);
    $judul = htmlspecialchars($data["judul"]);
    $subJudul = htmlspecialchars($data["subJudul"]);


    $query = "UPDATE tb_iklan SET 
    foto = '$foto', 
    judul = '$judul', 
    subJudul = '$subJudul'
   

    WHERE  id = '$id'
    ";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function article_tambah($data)
{
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $text = htmlspecialchars($data["text"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $foto = htmlspecialchars($data["foto"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);


    $query = "INSERT INTO tb_article VALUES ('', '$judul', '$text', '$tanggal','$penulis','$foto','$id_kategori')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function article_ubah($data)
{
    global $conn;
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $text = htmlspecialchars($data["text"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $foto = htmlspecialchars($data["foto"]);
    $foto2 = htmlspecialchars($data["foto2"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    if ($foto2 > '') {
        $query = "UPDATE tb_article SET 
    judul = '$judul', 
    text = '$text',
    tanggal = '$tanggal',
    penulis = '$penulis',
    foto = '$foto2',
    id_kategori = '$id_kategori'

    WHERE  id = $id
    ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    } else {
        $query = "UPDATE tb_article SET 
    judul = '$judul', 
    text = '$text',
    tanggal = '$tanggal',
    penulis = '$penulis',
    foto = '$foto',
    id_kategori = '$id_kategori'

    WHERE  id = $id
    ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
}
