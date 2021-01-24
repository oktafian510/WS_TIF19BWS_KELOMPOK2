<?php
include 'header.php';
$iklan = query("SELECT * FROM tb_iklan");



?>
<style>
    .img_iklan img {
        width: 300px;
        height: 150px;
    }
</style>
<h1 class="mt-4">Home</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Home / Pasang Iklan</li>
</ol>

<!-- input foto judul subJudul -->

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="width: 10%;">No</th>
            <th scope="col" style="width: 30%;">Gambar Iklan</th>
            <th scope="col" style="width: 15%;">Judul</th>
            <th scope="col" style="width: 35%;">Keterangan</th>
            <th scope="col" style="width: 10%;"></th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($iklan as $row) :

            $target = 'okta'; ?>
            <tr>
                <th scope="row"><?= $row["id"] ?></th>
                <td class="img_iklan"> <img class="img-fluid rounded" src="../../gambar/<?= $row['foto']; ?>" alt=""> </td>
                <td> <?= $row["judul"]; ?></td>
                <td><?= $row["subJudul"]; ?></td>
                <td>
                    <center>
                        <input hidden type="text" name="ganti_iklan" value="<?= $row["id"] ?>">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?= $row['target']; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg> Edit</button>

                    </center>

                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="<?= $row['target']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"> Pasang Iklan <?= $row['id']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                        $id = $row['id'];
                        $iklan_second = query("SELECT * FROM tb_iklan where id = '$id'")[0];

                        ?>

                        <form action="notifikasi.php?gantiiklan=" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="judul"> Judul Iklan</label>
                                    <input type="text" id="judul" class="form-control" name="judul">
                                </div>
                                <div class="form-group">
                                    <label for="subJudul">Keterangan</label>
                                    <textarea class="form-control" id="subJudul" rows="3" name="subJudul" value="<?= $iklan_second["subJudul"]; ?>"></textarea>
                                </div>
                                <input type="file" name="foto">
                            </div>
                            <div class="modal-footer">
                                <input type="text" name="id" value="<?= $iklan_second['id'] ?>" hidden>
                                <input type="text" name="target" value="<?= $iklan_second['target'] ?>" hidden>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- modal -->
        <?php endforeach; ?>
    </tbody>
</table>



<?php

if (isset($_GET['ganti_iklan'])) {
    $ganti_iklan = $_GET['ganti_iklan'];
    echo $ganti_iklan;
    $iklan_second = query("SELECT * FROM tb_iklan where id ='$ganti_iklan'")[0];
} else {
    $iklan_second = query("SELECT * FROM tb_iklan where id ='Second Slide'")[0];
}
?>





<?php
include 'footer.php';
?>