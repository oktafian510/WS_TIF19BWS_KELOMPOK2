<?php
include 'header.php';
$contact = query("SELECT * FROM tb_contact order by id  limit 1")[0];

?>
<style>
    img {
        width: 100%;
        border-radius: 2%;
    }
</style>
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<!-- content -->

<div class="row">
    <div class="col-md-7">
        <img src="../../gambar/<?= $contact['foto'] ?>" alt="">
    </div>
    <div class="col-md-5">
        <h1><?= $contact['nama_perusahaan'] ?></h1>
        <h5>Phone : <a href=""><?= $contact['phone'] ?></a></h5>
        <h5>Email : <a href=""><?= $contact['email'] ?></a></h5>
        <h5>Instagram : <a href=""> <?= $contact['ig'] ?> </a></h5>
        <h5>Facebook : <a href=""> <?= $contact['fb'] ?> </a> </h5>
        <h5>Alamat : </h5>
        <p>
            <?= $contact['alamat'] ?>
        </p>
        <h5>Keterangan : </h5>
        <p>
            <?= $contact['keterangan'] ?>
            <button class="btn btn-success" data-toggle="modal" data-target="#target">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg> Edit
            </button>
        </p>

        <!-- Modal -->
        <div class="modal fade" id="target" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> Edit Profile Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="notifikasi.php?contact=" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" value="<?= $contact['nama_perusahaan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" name="phone" value="<?= $contact['phone']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" value="<?= $contact['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" id="instagram" class="form-control" name="instagram" value="<?= $contact['ig']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" id="facebook" class="form-control" name="facebook" value="<?= $contact['fb']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="2" name="alamat"><?= $contact['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="4" name="keterangan"><?= $contact['keterangan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto2">Foto Perusahaan</label> <br>
                                <input type="file" name="foto2">
                                <input hidden type="text" name="foto1" value="<?= $contact['foto']; ?>">
                                <input hidden type="text" name="id" value="<?= $contact['id']; ?>">

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


    </div>

</div>


<?php
include 'footer.php';
?>