<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

if(isset($_POST['create']) && $_POST['create'] == "customer"){
    $namaCustomer = $_POST['namaCustomer'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $noHp = $_POST['noHp'];

    $insert = mysqli_query($conn,
        "insert into customer
        (
            id_customer
            ,nama_customer
            ,alamat
            ,email
            ,no_hp
        )
        values
        (
            '',
            '$namaCustomer',
            '$alamat',
            '$email',
            '$noHp'
        )"
    );

    if($insert)
    {
        echo "Data Customer Berhasil diinput.";
    }
    else {
        echo "Gagal diinput";
    }
}
?>