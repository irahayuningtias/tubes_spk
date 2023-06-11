<?php 
    include 'config.php';
    if(isset($_GET['id_alt'])){
        $_ENV = 'tubes_spk.alternatif';
        $id = $_GET['id_alt'];
        mysqli_query($connect, "DELETE FROM alternatif WHERE id_alt='$id'");
        header("ocation:alternatif.php");
    }
?>