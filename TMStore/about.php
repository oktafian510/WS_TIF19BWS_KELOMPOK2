<?php
require 'function.php';

$tb_contact = query("SELECT * FROM tb_contact order by id limit 1")[0];

$about = query("SELECT * FROM tb_about");
$customers = query("SELECT * FROM tb_customers");



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <style>
        .img img {
            width: 150px;
            height: 100px;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <?php include "./nav.php" ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Tentang
            <small>Kami</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">About</li>
        </ol>

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-4" src="gambar/<?= $tb_contact['foto']; ?>" alt="">
            </div>
            <div class="col-lg-6">
                <h2><?= $tb_contact['nama_perusahaan']; ?></h2>
                <p><?= $tb_contact['keterangan']; ?></p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Team Members -->
        <h2>MyTeam</h2>

        <div class="row">
            <?php foreach ($about as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="gambar/<?= $row['foto']; ?>" alt="">
                        <div class="card-body">
                            <h4 class="card-title"><?= $row['jabatan']; ?></h4>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $row['job']; ?></h6>
                            <p class="card-text"><?= $row['keterangan']; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="#"><?= $row['nama']; ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- /.row -->

        <!-- Our Customers -->
        <h2>Our Customers</h2>
        <div class="row">
            <?php foreach ($customers as $row) : ?>
                <div class="col-lg-2 col-sm-4 mb-4 img">
                    <img class="img-fluid" src="gambar/<?= $row['foto']; ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class=" py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>