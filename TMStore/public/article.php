<?php
require '../function.php';


if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];

    $article = query("SELECT * FROM tb_article where judul   LIKE '%" . $cari . "%'");
} elseif (isset($_POST['id_kategori'])) {
    $id_kategori = $_POST['id_kategori'];

    $article = query("SELECT * FROM tb_article where id_kategori   LIKE '%" . $id_kategori . "%'");
} elseif (isset($_GET['kat'])) {
    $kat = $_GET['kat'];

    $article = query("SELECT * FROM tb_article where id_kategori   LIKE '%" . $kat . "%'");
} elseif (isset($_POST['semua'])) {
    $semua = $_POST['semua'];

    $article = query("SELECT * FROM tb_article order by id desc");
} elseif (isset($_POST['semula'])) {
    $semula = $_POST['semula'];

    $article = query("SELECT * FROM tb_article order by id desc limit 3");
} else {
    $article = query("SELECT * FROM tb_article order by id desc limit 3");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Article</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">

</head>

<body>



    <!-- Navigation -->
    <?php include "nav.php" ?>


    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Blog Home One
            <small>Subheading</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Article</li>
        </ol>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php foreach ($article as $row) : ?>

                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="../gambar/<?= $row["foto"]; ?>" alt="Card image cap" width="700" height="300">
                        <div class="card-body">
                            <h2 class="card-title"><?= $row["judul"]; ?></h2>
                            <p class="card-text"><?= substr($row["text"], 0, 220); ?>...</p>
                            <a href="blog-post.php?id=<?= $row["id"]; ?>" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            <?= $row["tanggal"]; ?>, by
                            <a href="#"><?= $row["penulis"]; ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- 
                Blog Post -->
                <!-- <div class="card mb-4">
                    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="#" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on January 1, 2017 by
                        <a href="#">Start Bootstrap</a>
                    </div>
                </div> -->


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <!-- <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li> -->
                    <li class="page-item ">
                        <form method="POST">
                            <input hidden type="text" name="Semula" value="Semula">
                            <button class="page-link"> &larr; Semula</button>
                        </form>

                    </li>
                    <li class="page-item ">

                        <form method="POST">
                            <input hidden type="text" name="semua" value="semua">
                            <button class="page-link">Semua &rarr;</button>
                        </form>
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <form method="POST">
                    <div class="card mb-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Search for...">
                                <span class="input-group-append">
                                    <input class="btn btn-secondary" type="submit" value="Go"></input>
                                </span>
                            </div>

                        </div>
                    </div>
                </form>




                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $article_kategori = query("SELECT * FROM tb_article_kategori");

                                    foreach ($article_kategori as $row) : ?>
                                        <li>
                                            <form action="" method="POST">

                                                <input hidden type="text" name="id_kategori" value="<?= $row['id_kategori']; ?>">

                                                <input style="border-style: none; background: transparent; color: blue;" type="submit" value="<?= $row['kategori']; ?>"> </input>
                                            </form>

                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <!-- <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <!-- <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div> -->

            </div>

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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>