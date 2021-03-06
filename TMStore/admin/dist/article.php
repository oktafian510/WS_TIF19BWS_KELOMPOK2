<?php
include 'header.php';
?>
<style>
    .article_img {
        text-align: center;
    }

    .article_img img {
        width: 200px;
        height: 100px;
    }
</style>
<h1 class="mt-4">Article</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Home / Daftar Article</li>
</ol>



<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Daftar Article
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th style="text-align: center;">Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th style="text-align: center;">Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1;
                    $article = query("SELECT * FROM tb_article");

                    foreach ($article as $row) :  ?>

                        <tr>
                            <td style="width: 220px;" class=" article_img">
                                <img src="../../gambar/<?= $row['foto'] ?>" alt="">
                            </td>
                            <td><?= $row['tanggal']; ?></td>
                            <td><?= $row['judul']; ?></td>
                            <td><?= $row['penulis']; ?></td>
                            <td style="width: 180px;">
                                <center>
                                    <div class="row">
                                        <div class="col-6">
                                            <form action="notifikasi.php?articleHapus=" method="POST">
                                                <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                                <button class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg><small>Hapus</small></button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <form action="article_edit.php" method="POST">
                                                <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                                <button class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg> Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </center>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>