<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "tubes_spk";

    $connect = mysqli_connect($server, $user, $pass, $database);

    if (!$connect){
        die("<script>alert('Gagal tersambung dengan database')</script>");
    }
?>