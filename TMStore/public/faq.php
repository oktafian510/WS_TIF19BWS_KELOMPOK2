<?php
require '../function.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FAQ</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php include "./nav.php" ?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">FAQ
      <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">FAQ</li>
    </ol>

    <div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <div class="card-header" role="tab" id="headingOne">
          <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Bagaimana cara mengajukan pertanyaan ?</a>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-body">
            Klik tombol Catalog yang ada pada navigasi kemudian ajukan pertanyaan !
          </div>
        </div>
      </div>
      <?php
      $faq = query("SELECT * FROM tb_contact_center where balasan != 'Menunggu untuk di balas'");

      foreach ($faq as $row) : ?>
        <div class="card">
          <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#satu<?= $row['id']; ?>" aria-expanded="false" aria-controls="collapseTwo"><?= $row['message']; ?> ?
              </a>
            </h5>
          </div>
          <div id="satu<?= $row['id']; ?>" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-body">
              <?= $row['balasan']; ?>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

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
