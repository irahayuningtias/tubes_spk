<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "tubes_spk";

    $connect = mysqli_connect($server, $user, $pass, $database);

    $k21=mysqli_connect('localhost','root','','tubes_spk');

    if (!$connect){
        die("<script>alert('Gagal tersambung dengan database')</script>");
    }
?>