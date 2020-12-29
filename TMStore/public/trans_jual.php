<?php
include 'trans_jual_detail.php';
$query = mysqli_query($conn, "SELECT max(kd_jual) as kd_besar FROM trans_jual");
$data_jual = mysqli_fetch_array($query);
$kd_jual = $data_jual['kd_besar'];

$urutan = (int) substr($kd_jual, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
$huruf = "BRG";
$kd_jual = $huruf . sprintf("%03s", $urutan);


$username = $_GET["user"];
$kd_barang = $_GET["kd_brg"];

$brg = query(" SELECT * FROM tb_barang WHERE kd_barang = '$kd_barang'")[0];
$jml = 1;

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {

        echo " <script> 
        alert('Create akun succes');
        document.location.href = 'trans_jual_pembayaran.php?user=$username'; 
        </script>";
    } else {
        echo " <script> 
        alert('Create akun failed'); 
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

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>
        .bootstrap-iso .formden_header h2,
        .bootstrap-iso .formden_header p,
        .bootstrap-iso form {
            font-family: Arial, Helvetica, sans-serif;
            color: black
        }

        .bootstrap-iso form button,
        .bootstrap-iso form button:hover {
            color: white !important;
        }

        .asteriskField {
            color: red;
        }
    </style>

</head>

<body>
    <!-- Navigation -->
    <?php include 'nav.php' ?>
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Form Pembelian
            <small>Naray'sGarden</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <form method="POST">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="kd_jual">Kode Jual</label>
                                <input class="form-control " disabled type="text" value="<?= $kd_jual ?>" />
                                <input hidden class="form-control " name="kd_jual" id="kd_jual" type="text" value="<?= $kd_jual ?>" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="tanggal_trans_jual">Tanggal</label>
                                <input class="form-control " disabled type="text" value="<?= date('d-m-Y'); ?>" />
                                <input hidden class="form-control " id="tanggal_trans_jual" name="tanggal_trans_jual" type="text" value="<?= date('d-m-Y'); ?>" />

                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="kd_barang">Kode Barang</label>
                                <input disabled class="form-control " type="text" value="<?= $brg["kd_barang"]; ?>" />
                                <input hidden class="form-control " name="kd_barang" id="kd_barang" type="text" value="<?= $brg["kd_barang"]; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="jumlah">Jumlah</label>
                                <input class="form-control " name="jumlah" id="jumlah" type="number" placeholder="Enter jumlah" value="1" onkeyup="sum();" />


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="hargajual">Harga</label>
                                <input class="form-control " disabled type="text" value="<?= $brg["hargajual"]; ?>" />
                                <input hidden class="form-control " name="hargajual" id="hargajual" type="text" value="<?= $brg["hargajual"]; ?>" />

                            </div>
                        </div>

                    </div>
                    <div class=" form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="sub_harga">Sub Harga</label>


                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input disabled value="<?= $brg["hargajual"]; ?>" class="form-control " type="text" id="sub_harga" />
                                <input hidden value="<?= $brg["hargajual"]; ?>" class="form-control " name="sub_harga" id="sub_harga" type="text" />


                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="total_bayar">Total</label>
                                <input disabled value="<?= $brg["hargajual"]; ?>" class="form-control " id="total_bayar" type="text" />
                                <input hidden value="<?= $brg["hargajual"]; ?>" class="form-control " name="total_bayar" id="total_bayar" type="text" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="diskon">Diskon</label>
                                <input class="form-control " name="diskon" id="diskon" type="text" value="0" />


                            </div>
                        </div>
                        <div class="col-md-4">


                            <div class="form-group">
                                <label class="small mb-1" for="bukti_pembayaran">No Rekening Pembayaran</label>
                                <select class="custom-select" name="id_anggota" id="id_anggota">
                                    <?php $id_anggota = query("SELECT * FROM tb_anggota");

                                    foreach ($id_anggota as $row) :
                                    ?>

                                        <option value="<?= $row["id_anggota"]; ?>"><?= $row["nama"]; ?></option>
                                    <?php endforeach; ?>

                                </select>

                            </div>
                        </div>


                    </div>

                    <input type="hidden" name="id" value="<?= $userid["id"]; ?>">

                    <input type="hidden" name="stoks" value="<?= $brg["stok"]; ?>">


                    <button type="submit" name="submit" class="btn btn-primary btn-block">Lanjut Ke Pembayaran</button>


                </form>



            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    < <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('jumlah').value;
        var txtSecondNumberValue = '<?= $brg["hargajual"]; ?>';
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('sub_harga').value = result;
            document.getElementById('total_bayar').value = result;

        }
    }
</script>
<script>
    $(document).ready(function() {
        var date_input = $('input[name="tanggal_trans_jual"]'); //our tanggal_trans_jual input has the name "tanggal_trans_jual"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>


</html>