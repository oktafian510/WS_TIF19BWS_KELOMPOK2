<?php
require 'function.php';



$tb_barang = query("SELECT * FROM tb_barang");
$super = query("SELECT * FROM tb_super_promo order by id desc limit 1")[0];




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">

</head>

<body>
    <!-- Navigation -->
    <?php include 'nav.php' ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Shop Name</h1>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="gambar/<?= $super["foto"]; ?>" alt="First slide">
                        </div>
                        <?php
                        $promo = query("SELECT * FROM tb_promo order by id desc limit 2");

                        foreach ($promo as $row) : ?>

                            <div class=" carousel-item">
                                <img class="d-block img-fluid" src="gambar/<?= $row["foto_promo"]; ?>" alt="Second slide">
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

                <div class="row">
                    <?php foreach ($tb_barang as $row) : ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="gambar/<?= $row["foto"]; ?>" alt="" width="700px" height="150px"></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="sign_up/index.php"><?= $row["nama_barang"]; ?></a>
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

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

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
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>