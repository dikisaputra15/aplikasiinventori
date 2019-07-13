<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

if(isset($_POST['create']) && $_POST['create'] == "customer"){
    $namaCustomer = $_POST['namaCustomer'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $noHp = $_POST['noHp'];
    $id = $_POST['id'];

    $insert = mysqli_query($conn,
        "update customer set
            nama_customer = '$namaCustomer'
            ,alamat = '$alamat'
            ,email = '$email'
            ,no_hp = '$noHp'
        where id_customer = '$id'"
    );

    if($insert)
    {
        echo "Data Customer Berhasil diupdate!.";
    }
    else {
        echo "Gagal diinput";
    }
}
?>