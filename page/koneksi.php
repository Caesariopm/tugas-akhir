<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_kursusinggris";

    $koneksi = mysqli_connect($host, $user, $pass, $db);
    if(!$koneksi){
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
?>

