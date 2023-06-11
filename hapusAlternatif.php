<?php 
    include 'config.php';
    if(isset($_GET['id_alt'])){
        $id = $_GET['id_alt'];
        mysqli_query($connect, "DELETE FROM alternatif WHERE id_alt='$id'");
        header("location:alternatif.php");
    }
?>