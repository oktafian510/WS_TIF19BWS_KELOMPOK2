<?php
include 'function.php';

if (isset($_GET['dataCustomersHapus'])) {

    $id = $_POST["id"];

    if (hapus($id) > 0) {
        echo " <script> 
        alert('Data berhasil dihapus');
        document.location.href = 'index.php?dataCustomers='; 

        </script>";
    } else {
        echo " <script> 
        alert('Data gagal dihapus');
        document.location.href = 'index.php?dataCustomers='; 
        
        </script>";
    }
} elseif (isset($_GET['dataCustomersVerfikasi'])) {
    $id = $_POST["id"];
    if (verifikasi($id) > 0) {
        echo " <script> 
        alert('Data berhasil diverifikasi');
        document.location.href = 'index.php?dataCustomers='; 

        </script>";
    } else {
        echo " <script> 
        alert('Data gagal diverifikasi');
        document.location.href = 'index.php?dataCustomers='; 
        
        </script>";
    }
} elseif (isset($_GET['gantiiklan'])) {
    $id = $_POST['id'];
    $foto = $_POST['foto'];
    $judul = $_POST['judul'];
    $subJudul = $_POST['subJudul'];
    $target = $_POST['target'];




    if ($judul > '' && $subJudul > '' && $foto > '') {
        if (iklan($_POST) > 0) {

            echo " <script> 
        alert('Iklan berhasil Dipasang');
        document.location.href = 'h_PasangIklan.php'; 
        </script>";
        } else {
            echo " <script> 
        alert('Iklan gagal Dipasang'); 
        document.location.href = 'h_PasangIklan.php'; 

        </script>";
        }
    } else {
        echo " <script> 
        alert('Gagal !!! Pastikan Semua Form Terisi'); 
        document.location.href = 'h_PasangIklan.php'; 

        </script>";
    }
} elseif (isset($_GET['articleHapus'])) {
    $id = $_POST["id"];

    if (article_hapus($id) > 0) {
        echo " <script> 
        alert('Data berhasil dihapus');
        document.location.href = 'article.php'; 

        </script>";
    } else {
        echo " <script> 
        alert('Data gagal dihapus');
        document.location.href = 'article.php'; 
        
        </script>";
    }
} elseif (isset($_GET['kdbarang'])) {
    $id = $_POST['kd_barang'];

    if (barang_hapus($id) > 0) {
        echo " <script> 
        alert('Data barang berhasil dihapus');
        document.location.href = 'barang.php'; 
        </script>";
    } else {
        echo " <script> 
        alert('Data barang gagal dihapus');
        document.location.href = 'barang.php'; 
        </script>";
    }
} elseif (isset($_GET['contact'])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $email = htmlspecialchars($_POST["email"]);
    $ig = htmlspecialchars($_POST["instagram"]);
    $fb = htmlspecialchars($_POST["facebook"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $foto1 = htmlspecialchars($_POST["foto1"]);
    $foto2 = htmlspecialchars($_POST["foto2"]);

    if ($foto2 > '') {
        $foto = $foto2;
    } else {
        $foto = $foto1;
    }

    // echo $id . '<br>';
    // echo $nama . '<br>';
    // echo $email . '<br>';
    // echo $ig . '<br>';
    // echo $fb . '<br>';
    // echo $phone . '<br>';
    // echo $alamat . '<br>';
    // echo $keterangan . '<br>';
    // echo $foto1 . '<br>';



    $query = mysqli_query($conn, "UPDATE tb_contact SET 
    nama_perusahaan = '$nama', 
    foto = '$foto',
    phone = '$phone',
    email = '$email',
    ig = '$ig',
    fb = '$fb',
    alamat = '$alamat',
    keterangan = '$keterangan'


    WHERE  id = $id
    ");

    if ($query) {
        echo " <script> 
        alert('Contact Berhasil di edit :v');
        document.location.href = 'contact.php'; 

        </script>";
    } else {
        echo " <script> 
        alert('Contact gagal diedit'); 
        document.location.href = 'contact.php'; 

        </script>";
    }
} elseif (isset($_GET['team'])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jabatan = htmlspecialchars($_POST["jabatan"]);
    $job = htmlspecialchars($_POST["job"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $foto1 = htmlspecialchars($_POST["foto1"]);
    $foto2 = htmlspecialchars($_POST["foto2"]);

    if ($foto2 > '') {
        $foto = $foto2;
    } else {
        $foto = $foto1;
    }


    $query = mysqli_query($conn, "UPDATE tb_about SET 
    foto = '$foto',
    nama = '$nama',
    jabatan = '$jabatan',
    job = '$job',
    keterangan = '$keterangan'


    WHERE  id = $id
    ");

    if ($query) {
        echo " <script> 
        alert('Contact team Berhasil di edit :v');
        document.location.href = 'team.php'; 

        </script>";
    } else {
        echo " <script> 
        alert('Contact team gagal diedit'); 
        document.location.href = 'team.php'; 

        </script>";
    }
} elseif (isset($_GET['barang'])) {
    $kd_barang = $_POST["kd_barang"];
    $nama_barang = htmlspecialchars($_POST["nama_barang"]);
    $kd_kategori = htmlspecialchars($_POST["kd_kategori"]);
    $hargabeli = htmlspecialchars($_POST["hargabeli"]);
    $hargajual = htmlspecialchars($_POST["hargajual"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $foto1 = htmlspecialchars($_POST["foto1"]);
    $foto2 = htmlspecialchars($_POST["foto2"]);

    if ($foto2 > '') {
        $foto = $foto2;
    } else {
        $foto = $foto1;
    }



    $query = mysqli_query($conn, "UPDATE tb_barang SET 
    nama_barang = '$nama_barang',
    kd_kategori = '$kd_kategori',
    hargabeli = '$hargabeli',
    hargajual = '$hargajual',
    deskripsi = '$deskripsi',
    foto = '$foto'


    WHERE  kd_barang = '$kd_barang'
    ");

    if ($query) {
        echo " <script> 
        alert('Data barang  Berhasil di edit :v');
        document.location.href = 'barang.php'; 

        </script>";
    } else {
        echo " <script> 
        alert('Data barang  gagal diedit'); 
        </script>";
    }
} elseif (isset($_GET['tambah_barang'])) {
    $kd_barang = $_POST["kd_barang"];
    $nama_barang = htmlspecialchars($_POST["nama_barang"]);
    $kd_kategori = htmlspecialchars($_POST["kd_kategori"]);
    $hargabeli = htmlspecialchars($_POST["hargabeli"]);
    $hargajual = htmlspecialchars($_POST["hargajual"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $foto = htmlspecialchars($_POST["foto"]);


    // echo $kd_barang . '<br>';
    // echo $nama_barang . '<br>';
    // echo $kd_kategori . '<br>';
    // echo $hargabeli . '<br>';
    // echo $hargajual . '<br>';
    // echo $foto1 . '<br>';
    // echo $deskripsi . '<br>';
    // echo $keterangan . '<br>';
    // echo $foto1 . '<br>';


    $query = mysqli_query($conn, "INSERT INTO tb_barang VALUES ('$kd_barang', '$kd_kategori', '$nama_barang', '0', '$hargabeli', '$hargajual', '$foto', '$deskripsi', '0')");

    if ($query) {
        echo " <script> 
        alert('Data barang  Berhasil ditambah :v');
        document.location.href = 'barang.php'; 

        </script>";
    } else {
        echo " <script> 
        alert('Data barang  gagal ditambah'); 
        document.location.href = 'barang.php'; 

        </script>";
    }
} elseif (isset($_GET['transjualVerfikasi'])) {
    $id = $_POST["kd_jual"];
    if (transjualVerfikasi($id) > 0) {
        echo " <script> 
        alert('Data berhasil diverifikasi');
        document.location.href = 'index.php?dataTransaksi='; 

        </script>";
    } else {
        echo " <script> 
        alert('Data gagal diverifikasi');
        document.location.href = 'index.php?dataTransaksi='; 
        
        </script>";
    }
} elseif (isset($_GET['transjualHapus'])) {
    $id = $_POST["kd_jual"];
    if (transjualHapus($id) > 0) {
        echo " <script> 
        alert('Data berhasil dihapus');
        document.location.href = 'index.php?dataTransaksi='; 

        </script>";
    } else {
        echo " <script> 
        alert('Data gagal dihapus');
        document.location.href = 'index.php?dataTransaksi='; 
        
        </script>";
    }
} elseif (isset($_GET['transjualpengiriman'])) {
    $id = $_POST["kd_jual"];
    if (transjualkirim($id) > 0) {
        echo " <script> 
        alert('Data berhasil dikirim');
        document.location.href = 'index.php?prosespengiriman='; 

        </script>";
    } else {
        echo " <script> 
        alert('Data gagal dikirim');
        document.location.href = 'index.php?prosespengiriman='; 
        
        </script>";
    }
}
