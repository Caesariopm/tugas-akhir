<?php
include("koneksi.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM paketmodul WHERE id_paket='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        header('Location: index.php?page=master/paketmodul/list-paketmodul');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/paketmodul/list-paketmodul';
        </script>";
    }
?>