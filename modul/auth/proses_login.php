<?php
session_start();
include "../../koneksi.php";
include "../function/functions.php";

$username   = checkVariabel($_POST['username']);
$password   = md5(checkVariabel($_POST['password']));

if(isset($_POST['login']))
{
    if($username == "" || $password == "")
    {
        header("location:../../login.php?page=login&code=2");
    }
    else 
    {
        $getData = mysqli_query($conn, "select * from user where username = '".$username."' and password = '".$password."'");
        if(mysqli_num_rows($getData) > 0)
        {
            while($data = mysqli_fetch_object($getData))
            {
                $_SESSION['username'] = $data->username;
                $_SESSION['level'] = $data->level;
                $_SESSION['name'] = $data->nama_lengkap;
                header("location:../../index.php?page=home");
            }
        }
        else
        {
            header("location:../../login.php?page=login&code=1");
        }
    }
}
else
{
    header("location:../../login.php");
}
?>