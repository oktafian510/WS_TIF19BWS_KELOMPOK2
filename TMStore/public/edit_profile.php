<?php
require 'edit_profile_proses.php';

$username = $_GET["user"];


if (isset($_POST["edit_profile"])) {

    if (ubah($_POST) > 0) {

        // echo " <script> 
        // alert('Data berhasil diedit');
        // </script>";
        header("location:../public/profile.php?user=$username");
    } else {
        echo " <script> 
        alert('Data gagal diedit'); 
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



</head>

<body>
    <?php require 'nav.php'; ?>


    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <form method="post">

                    <div class="profile-img">
                        <img src="../gambar/<?= $userid["foto"]; ?>" alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="foto_edir" id="foto_edir">
                            <button type="submit" name="foto_edit">Edit</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?= $userid['nama']; ?>
                    </h5>
                    <h6>
                        <?= $userid['bio']; ?>
                    </h6><br>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Profile</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="profile-work">
                    <p>Butuh Update</p>
                    <a href="">-</a><br />
                    <a href="">-</a><br />
                    <a href="">-</a>
                    <p>Butuh Update</p>
                    <a href="">-</a><br />
                    <a href="">-</a><br />
                    <a href="">-</a><br />
                    <a href="">-</a><br />
                    <a href="">-</a><br />
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Lengkap</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $userid['nama']; ?>">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" id="username" value="<?= $userid['username']; ?>" disabled>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email_customers" id="email_customers" value="<?= $userid['email_customers']; ?>">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="noHp" id="noHp" value="<?= $userid['noHp']; ?>">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="gender" id="gender" value="<?= $userid['gender']; ?>">


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $userid['alamat']; ?>">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?= $userid['status']; ?></p>

                                </div>
                            </div>
                            <a href="profile.php?user=<?= $userid["username"]; ?>" class="btn btn-primary">Back</a>
                            <input type="hidden" name="id" value="<?= $userid["id"]; ?>">
                            <input type="hidden" name="foto" value="<?= $userid["foto"]; ?>">
                            <input type="hidden" name="bio" value="<?= $userid["bio"]; ?>">
                            <input type="hidden" name="status" value="<?= $userid["status"]; ?>">
                            <input type="hidden" name="username" value="<?= $userid["username"]; ?>">




                            <button type="submit" name="edit_profile" class="btn btn-primary">Save</button>


                        </form>
                    </div>

                </div>
            </div>

            <!-- form -->
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>