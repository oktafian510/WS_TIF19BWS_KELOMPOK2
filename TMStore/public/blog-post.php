<?php
require '../function.php';

$article = query("SELECT * FROM tb_article");


$id = $_GET["id"];

$v_status = mysqli_query($conn, "SELECT * FROM tb_article_komentar where id_article = $id");

$jumlah_komentar = mysqli_num_rows($v_status);

$data = query(" SELECT * FROM tb_article WHERE id = $id")[0];



if (isset($_POST['komentar'])) {
    $id_article = $_GET['id'];
    $id_user = $_POST['id_user_komentar'];
    $komentar = $_POST['komentar'];


    $query = mysqli_query($conn, " INSERT INTO tb_article_komentar VALUES ('', '$id_article', '$id_user', '$komentar')");
    if ($query) {

        echo " <script> 
        alert('Komentar Berhasil di Tampilkan');

        document.location.href = 'blog-post.php?id=$id_article'; 
        </script>";
    } else {

        echo " <script> 
        alert('Komentar Gagal di Tampilkan');

        </script>";
    }



    // echo " <script> 
    //     alert('Anda Belum Login !!!');
    //     document.location.href = 'sign_up/index.php'; 
    //     </script>";
} elseif (isset($_POST['id_kategori'])) {
    $id_kategori = $_POST['id_kategori'];
    echo " <script> 
        document.location.href = 'article.php?kat=$id_kategori'; 
        </script>";
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
    <style>
        .post_img img {
            width: 50px;
            height: 50px;
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    <?php include "./nav.php";
    ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"><?= $data["judul"]; ?>
            <small>by
                <a href="#">Tmstore</a>
            </small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="article.php">Article</a>
            </li>
            <li class="breadcrumb-item active">Post</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="../gambar/<?= $data["foto"]; ?>" alt="">

                <hr>

                <!-- Date/Time -->
                <p>Posted on <?= $data["tanggal"]; ?></p>

                <hr>

                <!-- Post Content -->
                <p class="lead"><?= $data["text"]; ?></p>

                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p> -->

                <!-- <blockquote class="blockquote">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">Someone famous in
                        <cite title="Source Title">Source Title</cite>
                    </footer>
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p> -->

                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <input type="text" name="id_user_komentar" value="<?= $userid['id']; ?>" hidden>
                                <textarea name="komentar" class="form-control" rows="3" required></textarea>
                            </div>
                            <input hidden type="text" name="id" value="<?= $id ?>">
                            <!-- <input hidden type="text" name="komentar" value="komentar"> -->


                            <button class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
                <?php

                if ($jumlah_komentar > 0) {
                    $article_komentar = query(" SELECT * FROM tb_article_komentar WHERE id_article = $id");
                    foreach ($article_komentar as $row) :
                        $id_customers = $row['id_customers'];
                        $customers = query(" SELECT * FROM tb_customers WHERE id = $id_customers")[0];

                        echo ' <div class="media mb-4 post_img">   
                            <img class="d-flex mr-3 rounded-circle" src="../gambar/' . $customers['foto'] . '" alt="">
                            <div class="media-body">
                            <h5 class="mt-0">' . $customers['nama'] . '</h5>' . $row['komentar'] . '</div></div>';




                    endforeach;
                } else {
                    echo ' <div class="media mb-4 post_img">   
                            <div class="media-body">
                            <h5 class="mt-0">' . 'Tidak Ada Komentar ...' . '</h5>' . '</div></div>';
                }
                ?>
                <!-- Single Comment -->



                <!-- Comment with nested comments -->
                <!-- <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                    </div>
                </div> -->

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
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