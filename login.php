<?php
ob_start();
session_start();
include 'page/koneksi.php';
?>
<?php
if(isset($_POST['login']) && !empty($_POST['login'])){
    $username 	= mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
    $password	= mysqli_real_escape_string($koneksi, $_POST['password']);
    $sql = "SELECT * FROM pengajar WHERE nama_pengajar = '$username' AND password = '$password'";
	$select_pengajar	= mysqli_query($koneksi, $sql);
	$num_pengajar	= mysqli_num_rows($select_pengajar);
	$row_pengajar		= mysqli_fetch_array($select_pengajar);
	if($num_pengajar > 0){
		if($row_pengajar['nama_pengajar'] == $username && $row_pengajar['password'] == $password){
            $_SESSION['nama_pengajar'] = $row_pengajar['nama_pengajar'];
            header('location: page/index.php');
        }
	}
    else{ 

        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
?>
<script>
    window.location.href = 'index.php';
</script>
<?php
    }
}
?>