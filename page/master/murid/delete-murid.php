<?php
include("koneksi.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id_user='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        header('Location: index.php?page=master/murid/list-murid');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/murid/list-murid';
        </script>";
    }
?>