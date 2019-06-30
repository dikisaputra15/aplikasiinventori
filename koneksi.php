<?php
    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $db     = "db_inventori";
    $conn   = mysqli_connect($host, $user, $pass, $db);
    if(!$conn)
    {
        die("tidak bisa terhubung ". mysqli_error($conn));
    }
?>