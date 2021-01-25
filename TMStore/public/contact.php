<?php
require '../function.php';

if (isset($_POST["sendmessage"])) {

    if (contact_center($_POST) > 0) {

        echo " <script> 
        alert('Pesan berhasil dikirim :v');
        document.location.href = 'contact.php'; 

        </script>";
    } else {
        echo " <script> 
        alert('Pesan gagal dikirim :u '); 
        </script>";
    }
}


$contact = query("SELECT * FROM tb_contact order by id desc limit 1")[0];


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">

</head>

<body>
    <!-- Navigation -->

    <?php include "nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Contact
            <small>Subheading</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-8 mb-4">
                <!-- Embedded Google Map
                <iframe style="width: 100%; height: 400px; border: 0;" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe> -->
                <img class="img-fluid rounded" src="../gambar/<?= $contact["foto"]; ?>" alt="">

            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>Contact Details</h3>
                <p>
                    <?= $contact["alamat"]; ?>
                    <br>
                </p>
                <p>
                    <abbr title="Phone">Phone</abbr>: <?= $contact["phone"]; ?>
                </p>
                <p>
                    <abbr title="Email">Email</abbr>:
                    <a href="<?= $contact["email"]; ?>"><?= $contact["email"]; ?>
                    </a>
                </p>
                <p>
                    <abbr title="ig">Instagram </abbr>: <?= $contact["ig"]; ?>
                </p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Send us a Message</h3>
                <form method="POST" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input hidden type="text" class="form-control" name="nama" id="nama" placeholder="Full Name" value="<?= $userid['nama']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input hidden type="tel" class="form-control" name="noHp" id="noHp" placeholder="Phone Number" value="<?= $userid['noHp']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email Address :</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?= $userid['email']; ?>" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="message">Message :</label>
                            <textarea class="form-control" name="message" id="message" cols="100" rows="10" required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid message.
                            </div>
                        </div>
                    </div>


                    <input hidden type="text" name="id_customers" value="<?= $userid['id']; ?>">
                    <input hidden type="text" name="balasan" value="Menunggu untuk di balas">
                    <button class="btn btn-primary" type="submit" name="sendmessage">Send Message</button>
                </form>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </div>

        </div>
        <!-- /.row -->

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

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

</body>

</html>