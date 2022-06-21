<?php
    include('koneksi.php');
    
    $select_transaksi	= mysqli_query($koneksi, "SELECT transaksi.id_transaksi, user.nama_user, transaksi.tgl_pesan, transaksi.total_harga FROM transaksi JOIN user ON transaksi.id_user = user.id_user;");

    if(isset($_POST['regis-transaksi'])){
        $nama_user		= mysqli_real_escape_string($koneksi, $_POST['nama_user']);
        $tgl_pesan		= mysqli_real_escape_string($koneksi, $_POST['tgl_pesan']);
        $total_harga		= mysqli_real_escape_string($koneksi, $_POST['total_harga']);
        if($nama_user == '' || $tgl_pesan == '' || $total_harga == ''){
            echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
        }else{
            $sql = "INSERT INTO transaksi (nama_user, tgl_pesan, total_harga) VALUES ('$nama_user', '$tgl_pesan', '$total_harga')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }else{
                echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            }
        }
        header('Location: index.php?page=master/transaksi/list-transaksi');
    }
?>

<style>
    select{
        padding: 7px;
    }

    input[type=text] {
    background-color: white;
    padding: 5px 5px 5px 10px;
    margin-bottom: 8px;
    
    }

    table, th, td {
    border: 1px solid #ddd;
    }

    table{
        width: 100%;
    }

    th {
    font-weight: bold;
    border: none;
    
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
        }

    th, td {
    padding: 10px;
    text-align: center;
    }

    .hidetext { -webkit-text-security: disc; /* Default */ }

</style>

<div class="list-jenis">
    <div class="row">
        <section class="panel panel-default">
            <div class="col-sm-12">
                <section class="panel panel-default">
                    <div class="panel panel-heading">List Transaksi</div>
                    <div class="panel panel-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-c"> + Tambahkan </button>
                        <br /> <br />
                        <!-- model -->
                        <div class="modal fade" id="regis-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan Pengajar</h3>
                                    </div>
                                    <!-- form tambahan -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="nama_user">Nama User</label><br />
                                                <input class="form-control" name="nama_user" id="nama_user" type="text" required />
                                            </p>
                                            <p>
                                                <label for="tgl_pesan">Tanggal Pesan</label><br />
                                                <input class="form-control" name="tgl_pesan" id="notelp_pengajar" type="date" required />
                                            </p>
                                            <p>
                                                <label for="total_harga">Total Harga</label><br />
                                                <input class="form-control" name="total_harga" id="total_harga" type="text" required />
                                            </p>
                                            <p>
                                                <!-- <label for="mata_pelajaran">Mata Pelajaran</label><br />
                                                <input class="form-control" name="mata_pelajaran"id="mata_pelajaran" type="text" required />
                                            </p>  -->
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-transaksi">ADD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end model -->
                        <table id="list-user" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Transaksi</th>
                                    <th>Nama User</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Total Harga</th>
                                    <!-- <th>Mata Pelajaran</th>  -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    while($row = mysqli_fetch_array($select_transaksi)){
                                ?>
                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?=$row['id_transaksi']; ?></td>
                                    <td><?=$row['nama_user']; ?></td>
                                    <td><?=$row['tgl_pesan']; ?></td>
                                    <td><?=$row['total_harga']; ?></td>
                                    <!-- <td><'?=$row['mata_pelajaran']; ?></td>  -->
                                    <td>
                                        <a href="index.php?page=master/transaksi/update-transaksi&id=<?=$row['id_transaksi']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="index.php?page=master/transaksi/delete-transaksi&id=<?=$row['id_transaksi']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>
