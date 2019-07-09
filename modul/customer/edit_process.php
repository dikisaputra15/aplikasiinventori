<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";
if(isset($_GET['op']) && $_GET['op'] == "getdata")
{
    $id = $_GET['id'];

    $select = mysqli_query($conn,
        "select * from customer where id_customer = '$id'"
    );

    $row = mysqli_fetch_object($select);
    $data = $row;

    $json = json_encode($data,true);
    echo $json;
}
?>