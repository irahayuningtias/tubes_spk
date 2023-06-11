<?php
    include 'config.php';

    if(isset($_POST['proses'])){
        mysqli_query($connect, "UPDATE 'kriteria' SET 
        kriteria = '$_POST[kriteria]',
        keterangan = '$_POST[keterangan]',
        bobot = '$_POST[bobot]',
        tipe = '$_POST[tipe]'
        where id_criteria = '$_GET[id]'");

    }

    header("Location: kriteria.php");
?>