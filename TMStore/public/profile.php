<?php
include '../function.php';


if (isset($_POST["edit_profile"])) {



    $id_profile = $_POST["id_profile"];
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $noHp = htmlspecialchars($_POST["noHp"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    $query = mysqli_query($conn, " UPDATE tb_customers SET 
    nama = '$nama', 
    email = '$email',
    noHp = '$noHp',
    gender = '$gender',
    alamat = '$alamat'

    WHERE  id = $id_profile
    ");

    if ($query) {
        echo " <script> 
        alert('Profile Berhasil di edit :v');
        document.location.href = 'profile.php'; 

        </script>";
    } else {
        echo " <script> 
        alert('Profile gagal diedit'); 
        </script>";
    }
} elseif (isset($_POST['tekan_bio'])) {
    $idbio = $_POST['id_bio'];
    $bio = $_POST['ganti_bio'];
    $query = mysqli_query($conn, " UPDATE tb_customers SET bio = '$bio' where id = $idbio");
    if ($query) {

        echo " <script> 
            alert('Bio Profile Berhasil di Ganti :v ');
        document.location.href = 'profile.php'; 
        </script>";
    } else {

        echo " <script> 
        alert('Bio Profile Gagal di Ganti');

        </script>";
    }
} elseif (isset($_POST['upload'])) {

    $id = $_POST['id'];
    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];


    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 100044070) {
            move_uploaded_file($file_tmp, '../gambar/' . $nama);
            $query = mysqli_query($conn, " UPDATE tb_customers SET foto = '$nama' where id = $id");
            if ($query) {

                echo " <script> 
            alert('Foto Profile Berhasil di Ganti :v ');
        document.location.href = 'profile.php'; 


        </script>";
            } else {

                echo " <script> 
        alert('Foto Profile Gagal di Ganti');

        </script>";
            }
        } else {
            echo " <script> 
        alert('Ukuran File Terlalu Besar');

        </script>";
        }
    } else {
        echo " <script> 
        alert('Ekstensi file yang di upload tidak di perbolehkan ');

        </script>";
    }
} elseif (isset($_POST['username_ganti'])) {
    $username_edit = $_POST['username_edit'];
    $userbaru = $_POST['userbaru'];
    $passwords = $_POST['passwords'];
    $query = mysqli_query($conn, "UPDATE tb_user SET username = '$userbaru', password = '$passwords' WHERE username = '$username_edit'");
    if ($query) {

        echo " <script> 
          
        document.location.href = '../sign_up/login_kembali.php'; 
        </script>";
    } else {

        echo " <script> 
        alert('Username dan password gagal di ubah');

        </script>";
    }
} elseif (isset($_POST["Tekan_Verifikasi"])) {
    $id_verifikasi = $_POST['id_verifikasi'];
    $cek_verifikasi = query(" SELECT * FROM tb_customers WHERE id = $id_verifikasi")[0];

    $email = htmlspecialchars($cek_verifikasi["email"]);
    $gender = htmlspecialchars($cek_verifikasi["gender"]);
    $alamat = htmlspecialchars($cek_verifikasi["alamat"]);

    if ($email != '-' && $gender != '-' && $alamat != '-') {
        $query = mysqli_query($conn, " UPDATE tb_customers SET status = 'Menunggu verifikasi' where id = $id_verifikasi");
        if ($query) {

            echo " <script> 
            alert('Berhasil Meminta Verifikasi Data :v ');
        document.location.href = 'profile.php'; 


        </script>";
        } else {

            echo " <script> 
        alert('Gagal Meminta Verifikasi Data !!');

        </script>";
        }
    } else {
        echo " <script> 
            alert('Lengkapi profile untuk verifikasi');
        document.location.href = 'profile.php'; 
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="css/style_profile.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link href="../admin/dist/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <style>
        .imgz img {
            width: 180px;
            height: 160px;
            border-radius: 1%;

        }

        .imgz button {
            position: absolute;
            margin-top: -25px;
            height: 25px;
            border-style: hidden;
            width: 40px;
        }

        .icon-user button {
            height: 35px;
            width: 35px;
        }
    </style>

</head>

<body>
    <?php require 'nav.php'; ?>
    <!-- modal -->
    <div class="modal fade" id="edit_username" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Username and Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="padding-left: 2%;">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="userbaru">Username</label>
                                    <input type="text" class="form-control" name="userbaru" id="userbaru" placeholder="Enter username Address" required>

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="passwords">Password</label>
                                    <input type="password" class="form-control" name="passwords" id="passwords" placeholder="Enter username Address" required>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input hidden type="text" name="username_edit" value="<?= $userid['username']; ?>">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary" name="username_ganti" value="Simpan Perubahan">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <!-- modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Foto Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3 ">
                                <div class="profile-img imgz">
                                    <img src="../gambar/<?= $userid["foto"]; ?>" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-8">
                                <!-- <input class="btn-primary" type="file" name="foto" required> -->
                                <input hidden type="text" name="id" value="<?= $userid['id']; ?>">
                                <input type="file" name="file" required>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary" name="upload" value="Simpan Perubahan">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <!-- modal -->
    <div class="modal fade" id="bio" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Enter bio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input hidden type="text" name="id_bio" value="<?= $userid['id']; ?>">

                        <input class="form-control" type="text" name="ganti_bio" required>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary" name="tekan_bio" value="Simpan Perubahan">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <div class="container">
        <div class="emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="imgz">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <img src="../gambar/<?= $userid["foto"]; ?>" alt=""> <br>
                                    <button type="button" data-toggle="modal" data-target="#staticBackdrop">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                        </svg>
                                    </button>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="profile-head">

                                    <h5>
                                        <?= $userid['nama']; ?>
                                    </h5>
                                    <h6>
                                        <?= $userid['bio']; ?>
                                        <button type="button" style="border-style: hidden;" data-toggle="modal" data-target="#bio">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    </h6>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 mb-5">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Edit_profile-tab" data-toggle="tab" href="#Edit_profile" role="tab" aria-controls="Edit_profile" aria-selected="false">Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Transaksi-tab" data-toggle="tab" href="#Transaksi" role="tab" aria-controls="Transaksi" aria-selected="false">Transaksi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <!-- <p>Butuh Update</p>
                        <a href="">-</a><br />
                        <a href="">-</a><br />
                        <a href="">-</a>
                        <p>Butuh Update</p>
                        <a href="">-</a><br />
                        <a href="">-</a><br />
                        <a href="">-</a><br />
                        <a href="">-</a><br />
                        <a href="">-</a><br /> -->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $userid['nama']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $userid['username']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $userid['email']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $userid['noHp']; ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $userid['gender']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $userid['alamat']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-3">
                                        <p style="color: red;"><?= $userid['status']; ?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <?php
                                        $isi_status = $userid['status'];
                                        $isi_id = $userid['id'];
                                        if ($isi_status === 'Ajukan verifikasi') {

                                            echo ' <form action="" method="POST">
                                            <input type="text" name="id_verifikasi" value="' . $isi_id . '" hidden>
                                            <input type="submit" class="btn btn-primary" name="Tekan_Verifikasi" value="Verifikasi">
                                        </form>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Edit_profile" role="tabpanel" aria-labelledby="Edit_profile-tab">
                                <form action="" method="POST">
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <label>Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $userid['nama']; ?>" required>

                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="username" id="username" value="<?= $userid['username']; ?>" disabled>

                                        </div>
                                        <div class="col-md-11">

                                        </div>
                                        <div class="col-md-1 icon-user">
                                            <button type="button" style="border-style: hidden;" data-toggle="modal" data-target="#edit_username">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email" id="email" value="<?= $userid['email']; ?>" required>

                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="tel" class="form-control" name="noHp" id="noHp" value="<?= $userid['noHp']; ?>" required>

                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="gender" id="gender" value="<?= $userid['gender']; ?>" required>


                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $userid['alamat']; ?>" required>

                                        </div>
                                    </div> <br>

                                    <a href="profile.php" class="btn btn-primary">Back</a>
                                    <input type="hidden" name="id_profile" value="<?= $userid["id"]; ?>">
                                    <input type="hidden" name="foto" value="<?= $userid["foto"]; ?>">
                                    <input type="hidden" name="bio" value="<?= $userid["bio"]; ?>">
                                    <input type="hidden" name="status" value="<?= $userid["status"]; ?>">
                                    <input type="hidden" name="username" value="<?= $userid["username"]; ?>">




                                    <button type="submit" name="edit_profile" class="btn btn-primary">Save</button>


                                </form>

                            </div>
                            <div class="tab-pane fade" id="Transaksi" role="tabpanel" aria-labelledby="Transaksi-tab">

                                <!-- table riwayat transaksi -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                        Riwayat Menerima
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <?php
                                            $trans_jual = query("SELECT * FROM trans_jual where ket ='Dikirim'");


                                            ?>
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>Total Bayar</th>
                                                        <th>Bayar</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    foreach ($trans_jual as $row) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $row['tanggal_trans_jual']; ?></td>
                                                            <td><?= $row['total_bayar']; ?></td>

                                                            <td><?= $row['bukti_pembayaran']; ?></td>
                                                            <td>
                                                                <a href="">
                                                                    Detail
                                                                </a> | <a href="">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="../admin/dist/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../admin/dist/assets/demo/chart-area-demo.js"></script>
    <script src="../admin/dist/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../admin/dist/assets/demo/datatables-demo.js"></script>

</body>

</html>