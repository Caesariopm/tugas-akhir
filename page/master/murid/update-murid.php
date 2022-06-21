<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_murid	= mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
    $row_murid		= mysqli_fetch_assoc($select_murid);

    if(isset($_POST['update-murid'])){
        $id = $_POST['id'];
        $name		= mysqli_real_escape_string($koneksi, $_POST['nama_user']);
        $phone		= mysqli_real_escape_string($koneksi, $_POST['notelp_user']);
        $alamat		= mysqli_real_escape_string($koneksi, $_POST['alamat']);

        $sql = "UPDATE user SET nama_user='$name', notelp_user='$phone', alamat='$alamat' WHERE id_user='$id'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/murid/list-murid');
        } else {        
            echo "<script>
                alert('Data Gagal Diupdate');
                window.location.href='index.php?page=master/murid/list-murid';
            </script>";
        }
    }
?>

<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Murid</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_murid['id_user']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="nama_user">Name</label><br />
                                <input class="form-control" name="nama_user" id="nama_user" type="text" required value="<?=$row_murid['nama_user'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="notelp_user">Phone</label><br />
                                <input class="form-control" name="notelp_user" id="notelp_user" type="text" required value="<?=$row_murid['notelp_user'];?>" style="width: 100%"/>
                            </p>
                            <!-- <p>
                                <label for="phone">Phone</label><br />
                                <input class="form-control" name="phone" id="phone" type="text" required value="<"?=$row_murid['phone'];?>" style="width: 100%"/>
                            </p> -->
                            <p>
                                <label for="alamat">Alamat</label><br />
                                <input class="form-control" name="alamat" id="alamat" type="text" required value="<?=$row_murid['alamat'];?>" style="width: 100%"/>
                            </p>
                            <br>
							<button type="submit" name="update-murid" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
