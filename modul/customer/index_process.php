<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

$select = mysqli_query($conn,
    "select * from customer"
);

while($row = mysqli_fetch_object($select)){
    $data[] = $row;
}

$json = json_encode($data,true);
echo $json;
?>