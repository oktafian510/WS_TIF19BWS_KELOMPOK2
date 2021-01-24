<?php
include 'header.php';
?>
<style>
    .barang_style {
        text-align: center;
    }

    .barang_style img {
        width: 150px;
        height: 150px;
    }

    .imgz img {
        width: 180px;
        height: 160px;
        border-radius: 3%;
        margin-bottom: 10px;

    }

    /* .imgz button {
        position: absolute;
        margin-top: -25px;
        height: 25px;
        border-style: hidden;
        width: 40px;
    } */

    .icon-user button {
        height: 35px;
        width: 35px;
    }
</style>
<h1 class="mt-4">Barang</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Home / Daftar Barang</li>
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
                        <th style="text-align: center;">Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th style="text-align: center;">Stok</th>
                        <th style="text-align: center;">Terjual</th>
                        <th style="text-align: center;">Aksi</th>


                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">
                            <button class="btn-outline-primary" style=" color: black;" data-toggle="modal" data-target="#tambah">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                </svg><small>Tambah Data</small>
                            </button>
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1;
                    $article = query("SELECT * FROM tb_barang");

                    foreach ($article as $row) :  ?>

                        <tr>

                            <td class=" barang_style" style="width:100px;"><?= $row['kd_barang']; ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td style="width:200px;">
                                <?php
                                $kd_kategori = $row['kd_kategori'];
                                $kategori = query("SELECT * FROM tb_kategori where kd_kategori = $kd_kategori")[0];

                                echo $kategori['nama_kategori'];

                                ?>
                            </td>
                            <td class=" barang_style" style="width:100px;"><?= $row['stok']; ?></td>
                            <td class=" barang_style" style="width:100px;"><?= $row['terjual']; ?></td>
                            <td style="width: 160px; ">


                                <center>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn-outline-primary" style=" color: black;" data-toggle="modal" data-target="#target<?= $row['kd_barang']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                                </svg><small>Detail</small>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <form action="notifikasi.php?kdbarang=" method="POST">
                                                <input hidden name="kd_barang" type="text" value="<?= $row['kd_barang']; ?>">
                                                <button class="btn-outline-primary" style=" color: black;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg><small>Hapus</small>
                                                </button>

                                            </form>
                                        </div>
                                    </div>



                                </center>
                                <!-- <center>
                                    <form action="notifikasi.php?articleHapus=" method="POST">
                                        <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                        <button class="btn btn-primary"> Hapus</button>
                                    </form>

                                    <form action="article_edit.php" method="POST">
                                        <input hidden type="text" name="id" value="<?= $row['id']; ?>">
                                        <button class="btn btn-primary"> Edit</button>
                                    </form>
                                </center> -->


                            </td>


                        </tr>

                        <!-- Button trigger modal -->

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
                                                    <img src="../../gambar/<?= $team["foto"]; ?>" alt="" /> <br>
                                                    <input hidden type="text" name="foto1" value="<?= $team['foto']; ?>">

                                                    <input style="width: 180px;" type="file" name="foto2" disabled>


                                                </center>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input disabled type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?= $team['nama_barang']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="hargabeli">Harga Beli</label>
                                                <input disabled type="text" id="hargabeli" class="form-control" name="hargabeli" value="<?= $team['hargabeli']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="hargajual">Harga Jual</label>
                                                <input disabled type="text" id="hargajual" class="form-control" name="hargajual" value="<?= $team['hargajual']; ?>">
                                            </div>


                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" rows="2" name="deskripsi" disabled><?= $team['deskripsi']; ?></textarea>
                                            </div>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#target<?= $row['kd_barang']; ?>s">Edit</button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="target<?= $row['kd_barang']; ?>s" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <img src="../../gambar/<?= $team["foto"]; ?>" alt="" /> <br>
                                                    <input hidden type="text" name="foto1" value="<?= $team['foto']; ?>">

                                                    <input style="width: 180px;" type="file" name="foto2">


                                                </center>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?= $team['nama_barang']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="kd_katogori">Kategori</label>

                                                <select class="custom-select" name="kd_kategori" id="kd_kategori">
                                                    <?php $id_kategori = query("SELECT * FROM tb_kategori");

                                                    foreach ($id_kategori as $row) :
                                                    ?>

                                                        <option value="<?= $row["kd_kategori"]; ?>"><?= $row["nama_kategori"]; ?></option>
                                                    <?php endforeach; ?>

                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="hargabeli">Harga Beli</label>
                                                <input type="text" id="hargabeli" class="form-control" name="hargabeli" value="<?= $team['hargabeli']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="hargajual">Harga Jual</label>
                                                <input type="text" id="hargajual" class="form-control" name="hargajual" value="<?= $team['hargajual']; ?>">
                                            </div>


                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" rows="2" name="deskripsi"><?= $team['deskripsi']; ?></textarea>
                                            </div>
                                            <input type="text" name="kd_barang" value="<?= $kd; ?>" hidden>

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

                    <?php $i++;
                    endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> Detail Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="notifikasi.php?tambah_barang=" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="kd_barang">Kode Barang</label>
                        <input type="text" id="kd_barang" class="form-control" name="kd_barang" placeholder="Enter Kode Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" id="nama_barang" class="form-control" name="nama_barang" placeholder="Enter Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="kd_katogori">Kategori</label>

                        <select class="custom-select" name="kd_kategori" id="kd_kategori">
                            <?php $id_kategori = query("SELECT * FROM tb_kategori");

                            foreach ($id_kategori as $row) :
                            ?>
                                <option value="<?= $row["kd_kategori"]; ?>"><?= $row["nama_kategori"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hargabeli">Harga Beli</label>
                        <input type="text" id="hargabeli" class="form-control" name="hargabeli" placeholder="Enter Harga" required>
                    </div>
                    <div class="form-group">
                        <label for="hargajual">Harga Jual</label>
                        <input type="text" id="hargajual" class="form-control" name="hargajual" placeholder="Enter Harga" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="2" name="deskripsi" required></textarea>
                    </div>
                    <div class=" imgz">
                        <label for="kd_katogori">Gambar</label>
                        <br>
                        <input style="width: 180px;" type="file" name="foto" required>
                    </div>
                    <br>
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

<?php
include 'footer.php';
?>