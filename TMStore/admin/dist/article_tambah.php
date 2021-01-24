<?php
include 'header.php';
if (isset($_POST["submit"])) {

    if (article_tambah($_POST) > 0) {

        echo " <script> 
        alert('Article berhasil Ditambahkan');
        document.location.href = 'article.php'; 
        </script>";
    } else {
        echo " <script> 
        alert('Article gagal Ditambahkan'); 
        </script>";
    }
}

?>

<!-- content -->
<h1 class="mt-4">Article</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Home / Input Article</li>
</ol>

<form action="" method="POST">
    <!-- judul text tanggal penulis foto id_kategori-->
    <div class="row">
        <?php
        $baner = query("SELECT * FROM tb_article order by id desc limit 1")[0];

        ?>
        <div class="col-lg-5 mb-4">
            <center>
                <img class="img-fluid rounded" src="../../gambar/<?= $baner['foto']; ?>" alt="" width="100%">
                <div style="text-align: left; margin-top: -4%; width: 100%; " class="file btn btn-sm btn-primary">
                    Change Photo
                    <input type="file" name="foto" required />
                </div>
            </center>

        </div>
        <div class="col-lg-7 mb-4">
            <div class=" row">
                <div class="col-2">
                    <h5>
                        Kategori
                    </h5>
                </div>
                <div class="col-5">
                    <select class="custom-select" name="id_kategori" id="id_kategori">
                        <?php $id_kategori = query("SELECT * FROM tb_article_kategori");

                        foreach ($id_kategori as $row) :
                        ?>

                            <option value="<?= $row["id_kategori"]; ?>"><?= $row["kategori"]; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="col-2">

                </div>
                <div class="col-3">
                    <input style="text-align: center;" type="text" class="form-control" id="tanggal" name="tanggal" value="<?= date('d-m-Y'); ?>">
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-2">
                    <h5>
                        Judul
                    </h5>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Article" required>

                </div>
            </div> <br>
            <div class="row">
                <div class="col-2">
                    <h5>
                        Text
                    </h5>
                </div>
                <div class="col-10"><textarea class="form-control" name="text" id="text" rows="4" placeholder="Text" required></textarea></div>
            </div>
            <div class="row" style="padding-top: 0.5%; text-align: right; ">
                <div class="col-12">
                    <input hidden type="text" name="penulis" value="<?= $admins['nama'] ?>">
                    <button class="btn btn-primary" type="submit" name="submit">Tambah </button>
                    <button type="reset" href=" h_baner_utama_tambah.php" class="btn btn-primary"> Reset </button>
                </div>
            </div>
        </div>
    </div>
</form>


<?php
include 'footer.php';
?>