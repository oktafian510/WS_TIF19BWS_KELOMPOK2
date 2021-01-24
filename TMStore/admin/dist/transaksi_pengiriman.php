<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Transaksi
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Bukti pembayaran</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Admin</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode</th>
                        <th>Bukti pembayaran</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>admin</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($v_prosespengiriman as $row) :  ?>

                        <tr>
                            <?php
                            $id_admin = $row['id_anggota'];
                            $admin = query(" SELECT * FROM tb_anggota WHERE id_anggota = '$id_admin'")[0];

                            $id_customers = $row['id_customers'];
                            $customers = query(" SELECT * FROM tb_customers WHERE id = '$id_customers'")[0];

                            ?>
                            <td>
                                <?= $row['kd_jual']; ?>
                            </td>
                            <td class="imgz">
                                <center>
                                    <img src="../../gambar/<?= $row['bukti_pembayaran']; ?>" alt="">
                                </center>
                            </td>
                            <td><?= $row['tanggal_trans_jual']; ?></td>
                            <td><?= $row['total_bayar']; ?></td>
                            <td><?= $admin['nama']; ?></td>
                            <td>
                                <form action="notifikasi.php?transjualpengiriman=" method="POST">
                                    <input hidden type="text" name="kd_jual" value="<?= $row['kd_jual']; ?>">
                                    <button class="btn btn-primary"> <small>Kirim</small></button>
                                </form>

                            </td>


                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>