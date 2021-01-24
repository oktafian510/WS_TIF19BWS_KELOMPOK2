<!-- Content -->
<form action="" method="GET">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Verifikasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Belum Verivikasi (<?php echo $vf_status ?>)
            </a>
        </li>
    </ul>

</form>


<div class="tab-content profile-tab" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Customers
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Name</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
                                <th>Name</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($status as $row) : ?>

                                <tr>
                                    <td>
                                        <center>
                                            <img src="../../gambar/<?= $row['foto']; ?>" alt="" width="50">
                                        </center>
                                    </td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['noHp']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td>
                                        <center>
                                            <form action="notifikasi.php?dataCustomersHapus=" method="POST">
                                                <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                                <button class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg><small> Hapus</small></button>
                                            </form>
                                        </center>
                                    </td>



                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Customers
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Name</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Konfirmasi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($v_status as $row) : ?>

                                <tr>
                                    <td>
                                        <center>
                                            <img src="../../gambar/<?= $row['foto']; ?>" alt="" width="50">
                                        </center>
                                    </td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['noHp']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td style="width: 220px;">
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="notifikasi.php?dataCustomersVerfikasi=" method="POST">
                                                    <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                                    <button class="btn btn-primary"> <small>Verifikasi</small></button>
                                                </form>
                                            </div>


                                            <div class="col-6">
                                                <form action="notifikasi.php?dataCustomersHapus=" method="POST">
                                                    <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                                    <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg><small> Hapus</small></button>
                                                </form>
                                            </div>

                                        </div>



                                    </td>



                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>