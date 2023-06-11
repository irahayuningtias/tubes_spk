<?php 
    include 'config.php';

    $alt = $_POST['id_alt'];
    $c = $_POST['id_criteria'];
    $nilai = $_POST['nilai'];

    mysqli_query($connect, "INSERT INTO nilai VALUES('', '$alt', '$c', '$nilai')");

    header("location:createMatriks.php");
?>