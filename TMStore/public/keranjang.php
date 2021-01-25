<?php
require '../function.php';

if (isset($_POST['editjumlah'])) {
  $id = $_POST['id'];
  $keranjang_kdbarang = $_POST['kd_barangs'];
  $keranjang_jumlah = htmlspecialchars($_POST["jumlah"]);

  $stokbarang = query(" SELECT * FROM tb_barang WHERE kd_barang = '$keranjang_kdbarang'")[0];

  $keranjang_harga = $stokbarang['hargajual'];

  $keranjang_hargaTotal = $keranjang_harga * $keranjang_jumlah;

  $stok = $stokbarang['stok'];


  if ($keranjang_jumlah > 0 && $keranjang_jumlah < $stok) {
    # code...
    $query = mysqli_query($conn, " UPDATE tb_keranjang SET jumlah = '$keranjang_jumlah', harga = '$keranjang_hargaTotal' WHERE id = $id");

    if ($query) {

      echo " <script> 
        alert('Berhasil  ditambahkan ke keranjang ');
        document.location.href = 'keranjang.php'; 

        </script>";
    } else {
      echo " <script> 
        alert('gagal ditambahkan ke keranjang  '); 
        </script>";
    }
  } else {
    echo " <script> 
        alert('Masukkan Jumlah dengan benar ');
        document.location.href = 'keranjang.php'; 

        </script>";
  }
} elseif (isset($_POST['hapus_keranjang'])) {
  $id = $_POST['id'];



  # code...
  $query = mysqli_query($conn, " DELETE FROM tb_keranjang WHERE id = $id");

  if ($query) {

    echo " <script> 
        alert('Berhasil  dihapus keranjang ');
        document.location.href = 'keranjang.php'; 

        </script>";
  } else {
    echo " <script> 
        alert('gagal dihapus keranjang  '); 
        </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Keranjang</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/modern-business.css" rel="stylesheet">

  <style>
    .imgz img {
      width: 180px;
      height: 160px;
      border-radius: 3%;
      margin-bottom: 10px;

    }
  </style>

</head>

<body>

  <!-- Navigation -->
  <?php include "./nav.php" ?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Keranjang
      <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Keranjang</li>
    </ol>

    <div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">
      <?php
      $tb_keranjang = query("SELECT * FROM tb_keranjang ");


      ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total Harga</th>
            <th scope="col">aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($tb_keranjang as $row) :


          ?>
            <tr>
              <?php
              $kd_barang = $row['kd_barang'];
              $nm_brgs = query(" SELECT * FROM tb_barang WHERE kd_barang = '$kd_barang'")[0];
              ?>
              <th scope="row"><?= $i; ?></th>
              <td><?= $nm_brgs['nama_barang']; ?></td>
              <td><?= $nm_brgs['hargajual']; ?></td>
              <td>
                <center>
                  <div class="row">
                    <div class="col-6">
                      <?= $row['jumlah']; ?>

                    </div>
                    <div class="col-6">
                      <button class="btn-outline-primary" style=" color: black;" data-toggle="modal" data-target="#target<?= $row['jumlah']; ?>">
                        <small>Ganti</small>
                      </button>
                    </div>
                  </div>
                </center>
              </td>
              <td>Rp <?= $row['harga']; ?></td>
              <? $total = $row['harga'];?>
              <td style="width: 200px;">
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
                      <form method="POST">
                        <input hidden name="id" type="text" value="<?= $row['id']; ?>">
                        <button type="submit" name="hapus_keranjang" class="btn-outline-primary" style=" color: black;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                          </svg><small>Hapus</small>
                        </button>

                      </form>
                    </div>
                  </div>



                </center>
              </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="target<?= $row['jumlah']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> Jumlah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" method="POST">

                    <div class="modal-body">

                      <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" id="jumlah" class="form-control" name="jumlah">
                      </div>

                      <input type="text" name="id" value="<?= $row['id']; ?>">
                      <input type="text" name="kd_barangs" value="<?= $row['kd_barang']; ?>">

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="editjumlah" class="btn btn-primary">Save</button>

                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- modal -->
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
                          <img src="../gambar/<?= $team["foto"]; ?>" alt="" /> <br>
                          <input hidden type="text" name="foto1" value="<?= $team['foto']; ?>">



                        </center>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input disabled type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?= $team['nama_barang']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="nama_barang"> Stok Barang</label>
                        <input disabled type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?= $team['stok']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="kd_katogori">Kategori</label>

                        <select disabled class="custom-select" name="kd_kategori" id="kd_kategori">
                          <?php $id_kategori = query("SELECT * FROM tb_kategori");

                          foreach ($id_kategori as $row) :
                          ?>

                            <option value="<?= $row["kd_kategori"]; ?>"><?= $row["nama_kategori"]; ?></option>
                          <?php endforeach; ?>

                        </select>

                      </div>

                      <div class="form-group">
                        <label for="hargajual">Harga Satuan</label>
                        <input disabled type="text" id="hargajual" class="form-control" name="hargajual" value="<?= $team['hargajual']; ?>">
                      </div>


                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea disabled class="form-control" id="deskripsi" rows="2" name="deskripsi"><?= $team['deskripsi']; ?></textarea>
                      </div>
                      <input type="text" name="kd_barang" value="<?= $kd; ?>" hidden>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <!-- <button type="submit" name="submit" class="btn btn-primary">Save</button> -->

                    </div>
                  </form>

                </div>
              </div>
            </div>
            <!-- modal -->


          <?php

            $i++;
          endforeach;

          ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td colspan="3  ">Total Harga</td>
            <td>Rp </td>
            <td></td>
          </tr>
          <tr style="text-align: right;">
            <td colspan="6">
              <form action="pembayaran.php" method="POST">
                <button class="btn btn-primary">Lanjutkan pembayaran</button>
              </form>

            </td>
          </tr>
        </tbody>
      </table>


    </div>
    <div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <div class="card-header" role="tab" id="headingOne">
          <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Belum Uplod Bukti Transaksi</a>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-body">



            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Jual</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Total Harga</th>
                  <th scope="col">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php $user = $userid['id'];

                $transjual = query("SELECT * FROM trans_jual  where id_customers = $user AND ket ='Belum diupload' ");
                $i = 1;
                foreach ($transjual as $row) : ?>

                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td>
                      <?= $row['kd_jual']; ?>
                    </td>
                    <td>
                      <?= $row['jumlah_jual']; ?>
                    </td>
                    <td>
                      <?= $row['total_bayar']; ?>
                    </td>
                    <td>
                      <?= $row['ket']; ?>
                    </td>


                  </tr>





                <?php
                  $i++;
                endforeach; ?>


              </tbody>

            </table>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#satu" aria-expanded="false" aria-controls="collapseTwo">Riwayat Transaksi
            </a>
          </h5>
        </div>
        <div id="satu" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-body">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Jual</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Total Harga</th>
                  <th scope="col">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $user = $userid['id'];

                $transjual = query("SELECT * FROM trans_jual  where id_customers = $user AND ket !='Belum diupload' ");

                $i = 1;

                foreach ($transjual as $row) : ?>

                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td>
                      <?= $row['kd_jual']; ?>
                    </td>
                    <td>
                      <?= $row['jumlah_jual']; ?>
                    </td>
                    <td>
                      <?= $row['total_bayar']; ?>
                    </td>
                    <td>
                      <?= $row['ket']; ?>
                    </td>


                  </tr>





                <?php
                  $i++;
                endforeach; ?>


              </tbody>

            </table>
          </div>
        </div>
      </div>


    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>