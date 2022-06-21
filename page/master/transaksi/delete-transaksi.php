<?php
include("koneksi.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM transaksi WHERE id_transaksi='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        header('Location: index.php?page=master/transaksi/list-transaksi');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/transaksi/list-transaksi';
        </script>";
    }
?>