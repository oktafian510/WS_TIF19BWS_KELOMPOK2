<?php
require '../function.php';
function ubah($data)
{
    global $conn;
    $id = $data["id"];
    // $foto = htmlspecialchars($data["foto"]);
    $nama = htmlspecialchars($data["nama"]);
    // $bio = htmlspecialchars($data["bio"]);
    $noHp = htmlspecialchars($data["noHp"]);
    $email_customers = htmlspecialchars($data["email_customers"]);
    $alamat = htmlspecialchars($data["alamat"]);
    // $status = htmlspecialchars($data["status"]);
    // $username = htmlspecialchars($data["username"]);
    $gender = htmlspecialchars($data["gender"]);
    echo $id;
    echo $nama . $noHp . $email_customers . $alamat . $gender;


    // $query = "UPDATE tb_customers SET 
    // nama = '$nama', 
    // noHp = '$noHp', 
    // email_customers = '$email_customers',
    // alamat = '$alamat',
    // gender = '$gender'


    // WHERE  id = $id
    // ";"
    $query = "UPDATE tb_customers SET nama = '$nama', noHp = '$noHp', email_customers = '$email_customers', alamat = '$alamat', gender = '$gender' WHERE tb_customers.id = '$id';";


    $result = mysqli_query($conn, $query);
    return $result;
};
