<?php
$conn = mysqli_connect("localhost", "root", "", "db_store");
// $conn = mysqli_connect("localhost", "u1011496_kelompok2", "@Oktafian2000", "u1011496_db_store");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function contact_center($data)
{
    global $conn;
    $id_customers = htmlspecialchars($data["id_customers"]);
    $nama = htmlspecialchars($data["nama"]);
    $noHp = htmlspecialchars($data["noHp"]);
    $email = htmlspecialchars($data["email"]);
    $message = htmlspecialchars($data["message"]);
    $balasan = htmlspecialchars($data["balasan"]);


    $query = "INSERT INTO tb_contact_center VALUES ('', '$id_customers', '$nama', '$noHp','$email','$message','$balasan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
