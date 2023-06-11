<?php 
    include 'config.php';

    $alt = $_POST['alternatif'];
    $ket = $_POST['keterangan'];

    mysqli_query($connect, "INSERT INTO alternatif VALUES('', '$alt', '$ket')");

    header("location:alternatif.php");
?>