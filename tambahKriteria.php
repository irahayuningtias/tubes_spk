<?php 
    include 'config.php';

    $c = $_POST['kriteria'];
    $ket = $_POST['keterangan'];
    $bobot = $_POST['bobot'];
    $tipe = $_POST['tipe'];

    mysqli_query($connect, "INSERT INTO kriteria VALUES('', '$c', '$ket', '$bobot', '$tipe')");

    header("location:kriteria.php");
?>