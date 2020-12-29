<?php
include '../function.php';
function tambah($data)
{
    global $conn;
    $user = htmlspecialchars($data["inputUsername"]);
    $pass = htmlspecialchars($data["inputPassword"]);
    $phoneNumber = htmlspecialchars($data["inputPhoneNumber"]);
    $firstName = htmlspecialchars($data["inputFirstName"]);
    $lastName = htmlspecialchars($data["inputLastName"]);
    $name = $firstName . ' ' . $lastName;

    $query = "INSERT INTO tb_user ( username , password, user_level) VALUES ('$user', '$pass', 'pbc');";
    $query .= "INSERT INTO `tb_customers` (id, foto, nama, bio, noHp, email_customers, alamat, status, username, gender) VALUES (NULL, 'home.jpg', '$name','-', '$phoneNumber','-', '-', 'Menunggu ferivikasi', '$user', '-');";


    $result = mysqli_multi_query($conn, $query);
    return $result;
}
