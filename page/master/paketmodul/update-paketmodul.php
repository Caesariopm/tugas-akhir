<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_paketmodul	= mysqli_query($koneksi, "SELECT * FROM paketmodul WHERE id_paket='$id'");
    $row_paketmodul		= mysqli_fetch_assoc($select_paketmodul);

    if(isset($_POST['update-paketmodul'])){
        $id = $_POST['id'];
        $id_pengajar		= mysqli_real_escape_string($koneksi, $_POST['id_pengajar']);
        $harga_paket		= mysqli_real_escape_string($koneksi, $_POST['harga_paket']);
        $kelas      		= mysqli_real_escape_string($koneksi, $_POST['kelas']);
        $program_kursus    		= mysqli_real_escape_string($koneksi, $_POST['program_kursus']);

        $sql = "UPDATE paketmodul SET id_pengajar='$id_pengajar', harga_paket='$harga_paket', kelas='$kelas', program_kursus='$program_kursus' WHERE id_paket='$id'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/paketmodul/list-paketmodul');
        } else {        
            echo "<script>
                alert('Data Gagal Diupdate');
                window.location.href='index.php?page=master/paketmodul/list-paketmodul';
            </script>";
        }
    }
?>

<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Paket Modul</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_paketmodul['id_paket']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="id_pengajar">ID Pengajar</label><br />
                                <input class="form-control" name="id_pengajar" id="id_pengajar" type="text" required value="<?=$row_paketmodul['id_pengajar'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="harga_paket">Harga Paket</label><br />
                                <input class="form-control" name="harga_paket" id="harga_paket" type="text" required value="<?=$row_paketmodul['harga_paket'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="kelas">Kelas</label><br />
                                <input class="form-control" name="kelas" id="kelas" type="text" required value="<?=$row_paketmodul['kelas'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="program_kursus">ProgramK ursus</label><br />
                                <input class="form-control" name="program_kursus" id="program_kursus" type="text" required value="<?=$row_paketmodul['program_kursus'];?>" style="width: 100%"/>
                            </p>
                            <br>
							<button type="submit" name="update-paketmodul" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
