<?php
include("koneksi.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM pengajar WHERE id_pengajar='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        header('Location: index.php?page=master/pengajar/list-pengajar');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/pengajar/list-pengajar';
        </script>";
    }
?>