<div class="tab-content profile-tab" id="myTabContent">

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
                                <td>

                                    <form action="notifikasi.php?dataCustomersVerfikasi=" method="POST">
                                        <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                        <button class="btn btn-primary"> Verfikasi</button>
                                        <form action="notifikasi.php?dataCustomersHapus=" method="POST">
                                            <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                            <button class="btn btn-primary"> Hapus</button>
                                        </form>
                                    </form>
                                </td>



                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>