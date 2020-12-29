<?php

$userid = query(" SELECT * FROM tb_customers WHERE username = '$username'")[0];
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Naray's Garden</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?user=<?= $userid["username"]; ?>">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="article.php?user=<?= $userid["username"]; ?>">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalog.php?user=<?= $userid["username"]; ?>">Catalog</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Other Pages
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                        <a class="dropdown-item" href="contact.php?user=<?= $userid["username"]; ?>">Contact</a>
                        <a class=" dropdown-item" href="faq.php?user=<?= $userid["username"]; ?>">FAQ</a>
                        <a class="dropdown-item" href="about.php?user=<?= $userid["username"]; ?>">About</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="profile.php?user=<?= $userid["username"]; ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?= $userid["nama"]; ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php?user=<?= $userid["username"]; ?>">Settings</a>
                        <a class=" dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../sign_up/logout.php">Logout</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>