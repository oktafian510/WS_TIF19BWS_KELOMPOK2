<?php
include 'header.php';
$status = mysqli_query($conn, "SELECT * FROM tb_customers where status='sudah diverifikasi'");
$v_status = mysqli_query($conn, "SELECT * FROM tb_customers where status='Menunggu verifikasi'");

$vf_status = mysqli_num_rows($v_status);
// End Customers

// Transaksi
$v_trans_jual = mysqli_query($conn, "SELECT * FROM trans_jual where ket ='Menunggu Konfirmasi'");

$vf_trans_jual = mysqli_num_rows($v_trans_jual);
// End Transaksi

// Contact center
$v_prosespengiriman = mysqli_query($conn, "SELECT * FROM trans_jual where ket ='Terkonfirmasi'");

$vf_prosespengiriman = mysqli_num_rows($v_prosespengiriman);
// End Contact center


// // Contact center
// $v_article = mysqli_query($conn, "SELECT * FROM tb_article where balasan ='Menunggu untuk di balas'");

// $vf_article = mysqli_num_rows($v_contact_center);
// // End Contact center


// if (isset($_POST["submit"])) {

//     if (ubah($_POST) > 0) {

//         echo " <script> 
//         alert('Data berhasil diedit');
//         </script>";
//     } else {
//         echo " <script> 
//         alert('Data gagal diedit'); 
//         </script>";
//     }
// }


?>
<style>
    .notif {

        color: black;
        width: 100%;
        background-color: greenyellow;
        border-radius: 15%;
    }

    .imgz img {
        width: 180px;
        height: 160px;
        border-radius: 3%;
        margin-bottom: 10px;

    }
</style>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<!-- content -->
<form action="" method="GET">

    <div class="row mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            Customers

                        </div>

                        <div class="col-2">
                            <div class="notif">

                                <center>
                                    <small> <?php echo $vf_status ?></small>

                                </center>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                    <button name="dataCustomers" class="small btn btn-outline-light btn-sm">
                        View Details
                    </button>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            Transaksi

                        </div>

                        <div class="col-2">
                            <div class="notif">

                                <center>
                                    <small> <?php echo $vf_trans_jual ?></small>

                                </center>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <button name="dataTransaksi" class="small btn btn-outline-light btn-sm">
                        View Details
                    </button>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            Proses Pengiriman

                        </div>

                        <div class="col-2">
                            <div class="notif">

                                <center>
                                    <small> <?php echo $vf_prosespengiriman ?></small>

                                </center>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <button name="prosespengiriman" class="small btn btn-outline-light btn-sm">
                        View Details
                    </button>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            Advance

                        </div>

                        <div class="col-2">
                            <div class="notif">

                                <center>
                                    <small> <?php  ?></small>

                                </center>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <button name="advance" class="small btn btn-outline-light btn-sm">
                        View Details
                    </button>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
# code...

if (isset($_GET['dataCustomers'])) {
    include 'customers.php';
} elseif (isset($_GET['dataTransaksi'])) {
    include 'Transaksi.php';
} elseif (isset($_GET['prosespengiriman'])) {
    include 'transaksi_pengiriman.php';
} elseif (isset($_GET['dataArticle'])) {
    include 'Article.php';
}
?>

<?php
include 'footer.php';
?>