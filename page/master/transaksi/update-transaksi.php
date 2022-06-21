<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_transaksi	= mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
    $row_transaksi	= mysqli_fetch_assoc($select_transaksi);

    if(isset($_POST['update-transaksi'])){
        $id = $_POST['id'];
        $id_user		= mysqli_real_escape_string($koneksi, $_POST['id_user']);
        $tgl_pesan		= mysqli_real_escape_string($koneksi, $_POST['tgl_pesan']);
        $total_harga		= mysqli_real_escape_string($koneksi, $_POST['total_harga']);

        $sql = "UPDATE transaksi SET id_user='$id_user', tgl_pesan='$tgl_pesan', total_harga='$total_harga' WHERE id_transaksi='$id'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/transaksi/list-transaksi');
        } else {        
            echo "<script>
                alert('Data Gagal Diupdate');
                window.location.href='index.php?page=master/transaksi/list-transaksi';
            </script>";
        }
    }
?>

<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Transaksi</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_transaksi['id_transaksi']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="id_user">ID user</label><br />
                                <input class="form-control" name="id_user" id="id_user" type="text" required value="<?=$row_transaksi['id_user'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="tgl_pesan">Tanggal Pesan</label><br />
                                <input class="form-control" name="tgl_pesan" id="tgl_pesan" type="date" required value="<?=$row_transaksi['tgl_pesan'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="total_harga">Total Harga</label><br />
                                <input class="form-control" name="total_harga" id="total_harga" type="text" required value="<?=$row_transaksi['total_harga'];?>" style="width: 100%"/>
                            </p>
                            <!-- <p>
                                <label for="address">Alamat</label><br />
                                <input class="form-control" name="address" id="address" type="text" required value="<"?=$row_transaksi['address'];?>" style="width: 100%"/>
                            </p> -->
                            <br>
							<button type="submit" name="update-transaksi" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
