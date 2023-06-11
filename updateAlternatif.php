<?php
    include 'config.php';

    if(isset($_POST['update'])){
        $id = $_POST['id_alt'];
        $alt = $_POST['alternatif'];
        $ket = $_POST['keterangan'];
        
        $sql="UPDATE alternatif SET alternatif='$alt', keterangan='$ket' WHERE id='$id'";
        $query= mysqli_query($connect, $sql);
        
        if($query){
            header("location:alternatif.php");
        } else{
            die("Gagal menyimpan perubahan...");
        }
    } else{
        die("Akses dilarang...");
    }
?>