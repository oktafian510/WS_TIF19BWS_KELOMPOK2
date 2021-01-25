<?php
include '../function.php';
$contact = query("SELECT * FROM tb_contact order by id desc limit 1")[0];

$tb_barang = query("SELECT * FROM tb_barang order by kd_barang limit 8");
$article = query("SELECT * FROM tb_article order by id desc limit 3");


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Naray's Garden</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <style>
        .imgz img {
            width: 150px;
            height: 120px;
            border-radius: 1%;

        }
    </style>
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
                <?php
                $iklan_first = query("SELECT * FROM tb_iklan where id ='First Slide'")[0];
                ?>
                <div class="carousel-item active" style="background-image: url('../gambar/<?= $iklan_first["foto"]; ?>')">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h3><?= $iklan_first["judul"]; ?></h3>
                        <p><?= $iklan_first["subJudul"]; ?></p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <?php
                $iklan_second = query("SELECT * FROM tb_iklan where id ='Second Slide'")[0]; ?>

                <div class="carousel-item " style="background-image: url('../gambar/<?= $iklan_second["foto"]; ?>')">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h3><?= $iklan_second["judul"]; ?>
                        </h3>
                        <p><?= $iklan_second['subJudul']; ?>
                        </p>
                    </div>
                </div>
                <?php $iklan_third = query("SELECT * FROM tb_iklan where id ='Third Slide'")[0]; ?>

                <div class="carousel-item " style="background-image: url('../gambar/<?= $iklan_third["foto"]; ?>')">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h3><?= $iklan_third["judul"]; ?>
                        </h3>
                        <p><?= $iklan_third['subJudul']; ?>
                        </p>
                    </div>
                </div>

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
                            <a href="blog-post.php?id=<?= $row["id"]; ?>" class="btn btn-primary">Learn More</a>
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
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="../gambar/<?= $row["foto"]; ?>" alt="" width="700px" height="150px"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <form action="trans_jual.php" method="POST">
                                    <input hidden type="text" name="kd_brg" value="<?= $row["kd_barang"]; ?>">
                                    <button type="submit" name="beli" style="border: none; background:none; color: blue;"><?= $row["nama_barang"]; ?></button>
                                </form>
                            </h4>

                            <p class="card-text"><?= substr($row["deskripsi"], 0, 60); ?><a type="button" class="btn-outline-primary" style=" color: black;" data-toggle="modal" data-target="#target<?= $row['kd_barang']; ?>">
                                    ...&rarr;
                                </a></p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
                                    <h5>Rp. <?= $row["hargajual"]; ?></h5>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <form action="" method="POST">

                                        <div class="row">
                                            <div class="col-8">
                                                <input hidden type="text" name="keranjang_kdbarang" value="<?= $row['kd_barang'] ?>">
                                                <input hidden type="text" name="keranjang_idcustomers" value="<?= $userid['id'] ?>">

                                                <input hidden type="text" name="keranjang_harga" value="<?= $row['hargajual'] ?>">
                                                <input type="number" class="form-control" style="width: 130%; height: 30px;" name="keranjang_jumlah" id="keranjang_jumlah" required>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" name="tambah_keranjang" style="border-style: hidden;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </button>
                                            </div>

                                        </div>


                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="target<?= $row['kd_barang']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"> Detail Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="notifikasi.php?barang=" method="POST">
                                <?php
                                $kd = $row['kd_barang'];
                                $team = query("SELECT * FROM tb_barang where kd_barang = '$kd' ")[0];

                                ?>
                                <div class="modal-body">
                                    <div class=" imgz">
                                        <center>
                                            <img src="../gambar/<?= $team["foto"]; ?>" alt="" /> <br>
                                            <input hidden type="text" name="foto1" value="<?= $team['foto']; ?>">



                                        </center>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input disabled type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?= $team['nama_barang']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_barang"> Stok Barang</label>
                                        <input disabled type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?= $team['stok']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kd_katogori">Kategori</label>

                                        <select disabled class="custom-select" name="kd_kategori" id="kd_kategori">
                                            <?php $id_kategori = query("SELECT * FROM tb_kategori");

                                            foreach ($id_kategori as $row) :
                                            ?>

                                                <option value="<?= $row["kd_kategori"]; ?>"><?= $row["nama_kategori"]; ?></option>
                                            <?php endforeach; ?>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="hargajual">Harga Satuan</label>
                                        <input disabled type="text" id="hargajual" class="form-control" name="hargajual" value="<?= $team['hargajual']; ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea disabled class="form-control" id="deskripsi" rows="2" name="deskripsi"><?= $team['deskripsi']; ?></textarea>
                                    </div>
                                    <input type="text" name="kd_barang" value="<?= $kd; ?>" hidden>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- <button type="submit" name="submit" class="btn btn-primary">Save</button> -->

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- modal -->

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
                <img class="img-fluid rounded" src="../gambar/<?= $contact["foto"]; ?>" alt="">
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>