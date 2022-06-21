<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_pengajar	= mysqli_query($koneksi, "SELECT * FROM pengajar WHERE id_pengajar='$id'");
    $row_pengajar		= mysqli_fetch_assoc($select_pengajar);

    if(isset($_POST['update-pengajar'])){
        $id = $_POST['id'];
        $name		= mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
        $phone		= mysqli_real_escape_string($koneksi, $_POST['notelp_pengajar']);
        $pass		= mysqli_real_escape_string($koneksi, $_POST['password']);
        $alamat		= mysqli_real_escape_string($koneksi, $_POST['alamat']);

        $sql = "UPDATE pengajar SET nama_pengajar='$name', notelp_pengajar='$phone', password='$pass', alamat='$alamat' WHERE id_pengajar='$id'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/pengajar/list-pengajar');
        } else {        
            echo "<script>\kursus-inggris\page\logout.php
                alert('Data Gagal Diupdate');
                window.location.href='index.php?page=master/pengajar/list-pengajar';
            </script>";
        }
    }
?>

<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Pengajar</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_pengajar['id_pengajar']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="nama_pengajar">Name</label><br />
                                <input class="form-control" name="nama_pengajar" id="nama_pengajar" type="text" required value="<?=$row_pengajar['nama_pengajar'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="notelp_pengajar">Phone</label><br />
                                <input class="form-control" name="notelp_pengajar" id="notelp_pengajar" type="text" required value="<?=$row_pengajar['notelp_pengajar'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="password">Password</label><br />
                                <input class="form-control" name="password" id="password" type="text" required value="<?=$row_pengajar['password'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="alamat">Alamat</label><br />
                                <input class="form-control" name="mata_alamat" id="alamat" type="text" required value="<?=$row_pengajar['alamat'];?>" style="width: 100%"/>
                            </p>
                            <br>
							<button type="submit" name="update-pengajar" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
