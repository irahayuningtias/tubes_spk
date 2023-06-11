<?php
    include 'config.php';

    $id = $_POST['id_alt'];
    $alt = $_POST['alternatif'];
    $ket = $_POST['keterangan'];

    mysqli_query($connect, "UPDATE alternatif SET id_alt='$id', alternatif='$alt', keterangan='$ket' WHERE id='$id'");

    header("Location: alternatif.php");
?>