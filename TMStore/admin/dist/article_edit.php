<?php
include 'header.php';
$id = $_POST["id"];

if (isset($_POST["submit"])) {

    if (article_ubah($_POST) > 0) {

        echo " <script> 
        alert('Article berhasil Di edit');
        document.location.href = 'article.php'; 
        </script>";
    } else {
        echo " <script> 
        alert('Article gagal Di edit');     
        </script>";
    }
}

?>

<!-- content -->
<h1 class="mt-4">Article</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Home / Edit Article</li>
</ol>

<form method="POST">
    <!-- judul text tanggal penulis foto id_kategori-->
    <div class="row">
        <?php
        $edit = query("SELECT * FROM tb_article where id = $id")[0];

        ?>
        <div class="col-lg-5 mb-4">
            <center>
                <img class="img-fluid rounded" src="../../gambar/<?= $edit['foto']; ?>" alt="" width="100%">
                <div style="text-align: left; margin-top: -4%; width: 100%; " class="file btn btn-sm btn-primary">
                    Change Photo
                    <input hidden type="text" name="foto" id="foto" value="<?= $edit['foto']; ?>">
                    <input type="file" id="foto2" name="foto2" value="<?= $edit['foto']; ?>">

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
                        <?php
                        $kategori_id = $edit['id_kategori'];
                        $editkategori = query("SELECT * FROM tb_article_kategori where id_kategori = $kategori_id")[0];
                        ?>


                        <option value="<?= $edit['id_kategori']; ?>"><?= $editkategori['kategori'] ?></option>

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
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Article" value="<?= $edit['judul']; ?>" required>

                </div>
            </div> <br>
            <div class="row">
                <div class="col-2">
                    <h5>
                        Text
                    </h5>
                </div>
                <div class="col-10"><textarea class="form-control" name="text" id="text" rows="4" placeholder="Text" required> <?= $edit['text']; ?></textarea></div>
            </div>
            <div class="row" style="padding-top: 0.5%; text-align: right; ">
                <div class="col-12">
                    <input hidden type="text" name="penulis" value="Oktafian">
                    <input hidden type="text" name="id" value="<?= $edit['id']; ?>">
                    <button class="btn btn-primary" type="submit" name="submit">Simpan Perubahan </button>
                    <a href="article.php" class="btn btn-primary" type="button">Kembali </a>
                </div>
            </div>
        </div>
    </div>
</form>



<?php
include 'footer.php';
?>