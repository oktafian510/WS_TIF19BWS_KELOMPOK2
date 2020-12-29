<?php
require '../function.php';
$username = $_GET["username"];




$data = query(" SELECT * FROM tb_customers WHERE username = '$username'")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="../gambar/<?= $data['foto']; ?>" width="100">
</body>

</html>