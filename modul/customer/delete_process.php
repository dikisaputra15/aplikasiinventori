<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

if(isset($_POST['delete']) && $_POST['delete'] == "customer"){

    $id = $_POST['id'];

    $insert = mysqli_query($conn,
        "delete from customer where id_customer = '$id'"
    );

    if($insert)
    {
        echo "Data Customer Berhasil dihapus!.";
    }
    else {
        echo "Proses Gagal";
    }
}
?>