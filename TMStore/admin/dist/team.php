<?php
include 'header.php';
$about = query("SELECT * FROM tb_about")

?>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<!-- content -->


<div class="card-deck">
    <?php
    foreach ($about as $row) :
    ?>
        <div class="card">
            <img src="../../gambar/<?= $row['foto'] ?> " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $row['jabatan'] ?></h5>
                <p class="card-text"><?= $row['keterangan'] ?></p>
            </div>
            <div class="card-footer">
                <small class="text-muted"><?= $row['nama'] ?>
                    <button class="alert-primary" data-toggle="modal" data-target="#target<?= $row['id']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </button>
                </small>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="target<?= $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="notifikasi.php?team=" method="POST">
                        <?php
                        $idteam = $row['id'];
                        $team = query("SELECT * FROM tb_about where id = $idteam ")[0];

                        ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" value="<?= $team['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Posisi</label>
                                <input type="text" id="jabatan" class="form-control" name="jabatan" value="<?= $team['jabatan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="job">Job</label>
                                <input type="text" id="job" class="form-control" name="job" value="<?= $team['job']; ?>">
                            </div>


                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="2" name="keterangan"><?= $team['keterangan']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="foto2">Foto Profil</label> <br>
                                <input type="file" name="foto2">
                                <input hidden type="text" name="foto1" value="<?= $team['foto']; ?>">
                                <input hidden type="text" name="id" value="<?= $team['id']; ?>">

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- modal -->
    <?php endforeach; ?>
</div>


<?php
include 'footer.php';
?>