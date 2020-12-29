<?php
include 'trans_jual_detail.php';
$query = mysqli_query($conn, "SELECT max(kd_jual) as kd_besar FROM trans_jual");


$username = $_GET["user"];

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
                <br>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h1 style="color: blue;">Logo</h1>
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="form-group" style="text-align: right;">
                            <h5>Transcript</h5>
                            <p>Perum Bataan Permai <br>
                                Bondowoso, Jawa Timur 68281 <br>Indonesia</p>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <p>Bill to:</p>
                            <h6>Oktafian Dwi Cahyono</h6>
                            <p>Bondowoso, Jawa Timur <br>
                                Indonesia</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group text-right">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Invoice number :</h6>
                                    <h6>Invoice date :</h6>
                                    <h6>To Rec :</h6>
                                    <h6>Amount due :</h6>
                                </div>
                                <div class="col-6">
                                    <h6>1</h6>
                                    <h6>12-12-2020</h6>
                                    <h6>0833198088</h6>
                                    <h6>Rp100.000,00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h6>Product</h6>
                            <p>Nama Barang</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group text-center">
                            <h6>Qty</h6>
                            <p>2</p>


                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group text-left">
                            <h6>Price</h6>
                            <p>Rp50.000,00</p>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group text-right">
                            <h6>Amount</h6>
                            <p>Rp100.000,00</p>

                        </div>
                    </div>
                </div>
                <div class="form-row ">
                    <div class="col-md-6">
                        <div class="form-group text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-right">
                            <br>
                            <h5 style="color: blue;">Menunggu Pembayaran</h5>
                            <h5 style="color: blue;">No Rec: 0833198088 </h5>

                        </div>
                    </div>
                </div>




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