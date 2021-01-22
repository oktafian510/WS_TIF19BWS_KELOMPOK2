<?php
require 'function.php';


$super = query("SELECT * FROM tb_super_promo order by id desc limit 1")[0];
$contact = query("SELECT * FROM tb_contact order by id desc limit 1")[0];

$tb_barang = query("SELECT * FROM tb_barang order by kd_barang limit 6");
$article = query("SELECT * FROM tb_article order by id limit 3");


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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

    <?php include "nav.php" ?>

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('gambar/<?= $super["foto"]; ?>')">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h3><?= $super["judul"]; ?></h3>
                        <p><?= $super["subJudul"]; ?></p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <?php
                $promo = query("SELECT * FROM tb_promo order by id desc limit 2");

                foreach ($promo as $row) : ?>

                    <div class="carousel-item " style="background-image: url('gambar/<?= $row["foto_promo"]; ?>')">
                        <div class="carousel-caption d-none d-md-block text-dark">
                            <h3><?= $row["judul_promo"]; ?>
                            </h3>
                            <p>masih belumtau
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">News Artikel</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <?php foreach ($article as $row) : ?>

                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header"><?= $row["judul"]; ?></h4>
                        <div class="card-body">
                            <p class="card-text"><?= substr($row["text"], 0, 220); ?> ...</p>
                        </div>
                        <div class="card-footer">
                            <a href="blog-post.php?id=<?= $row["id"]; ?>&user=<?= $userid["username"]; ?>" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <h2>Tanaman Store</h2>
        <div class="row">
            <?php foreach ($tb_barang as $row) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="gambar/<?= $row["foto"]; ?>" alt="" width="700px" height="200px"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#"><?= $row["nama_barang"]; ?></a>
                            </h4>

                            <p class="card-text"><?= $row["deskripsi"]; ?></p>
                        </div>
                        <div class="card-footer">
                            <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
                            <h5>Rp. <?= $row["hargajual"]; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2><?= $contact["nama_perusahaan"]; ?></h2>
                <p><?= $contact["bio"]; ?></p>

                <h4><strong>Contact Details</strong></h4>
                <ul>

                    <li>
                        <td>
                            <strong>Email </strong>
                        </td>
                        <td>
                            <strong>: </strong><?= $contact["email"]; ?>
                        </td>
                    </li>
                    <li>
                        <td>
                            <strong>Instagram </strong>
                        </td>
                        <td>
                            <strong>: </strong><?= $contact["ig"]; ?>
                        </td>
                    </li>
                    <li>
                        <td>
                            <strong>Facebook </strong>
                        </td>
                        <td>
                            <strong>: </strong><?= $contact["fb"]; ?>
                        </td>
                    </li>
                    <li>
                        <td>
                            <strong>Phone </strong>
                        </td>
                        <td>
                            <strong>: </strong><?= $contact["phone"]; ?>
                        </td>
                    </li>

                </ul>
                <h5>Alamat :</h5>
                <p><?= $contact["alamat"]; ?></p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="gambar/<?= $contact["foto"]; ?>" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Untuk menghubungi lebih lanjut klik tombol di samping </p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-primary btn-block" href="contact.php">Call to Action</a>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
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