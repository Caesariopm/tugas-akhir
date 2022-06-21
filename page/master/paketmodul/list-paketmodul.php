<?php
    include('koneksi.php');
    
    $select_paketmodul	= mysqli_query($koneksi, "SELECT * FROM paketmodul");

    if(isset($_POST['regis-paketmodul'])){
        $id_pengajar		= mysqli_real_escape_string($koneksi, $_POST['id_pengajar']);
        $harga_paket		= mysqli_real_escape_string($koneksi, $_POST['harga_paket']);
        $kelas      		= mysqli_real_escape_string($koneksi, $_POST['kelas']);
        $program_kursus     		= mysqli_real_escape_string($koneksi, $_POST['program_kursus']);
        if($id_pengajar == '' || $harga_paket == '' || $kelas == '' || $program_kursus == ''){
            echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
        }else{
            $sql = "INSERT INTO paketmodul (id_pengajar, harga_paket, kelas, program_kursus) VALUES ('$id_pengajar', '$harga_paket', '$kelas', '$program_kursus')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }else{
                echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            }
        }
        header('Location: index.php?page=master/paketmodul/list-paketmodul');
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
                    <div class="panel panel-heading">List Paket Modul</div>
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
                                                <label for="id_pengajar">ID Pengajar</label><br />
                                                <input class="form-control" name="id_pengajar" id="id_user" type="text" required />
                                            </p>
                                            <p>
                                                <label for="harga_paket">Harga Paket</label><br />
                                                <input class="form-control" name="harga_paket" id="harga_paket" type="text" required />
                                            </p>
                                            <p>
                                                <label for="kelas">Kelas</label><br />
                                                <input class="form-control" name="kelas" id="kelas" type="text" required />
                                            </p>
                                            <p>
                                                <label for="program_kursus">Program Kursus</label><br />
                                                <input class="form-control" name="program_kursus"id="program_kursus" type="text" required />
                                            </p> 
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-paketmodul">ADD</button>
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
                                    <th>ID Paket</th>
                                    <th>ID Pengajar</th>
                                    <th>Harga Paket</th>
                                    <th>Kelas</th>
                                    <th>Program Kursus</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    while($row = mysqli_fetch_array($select_paketmodul)){
                                ?>
                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?=$row['id_paket']; ?></td>
                                    <td><?=$row['id_pengajar']; ?></td>
                                    <td><?=$row['harga_paket']; ?></td>
                                    <td><?=$row['kelas']; ?></td>
                                    <td><?=$row['program_kursus']; ?></td> 
                                    <td>
                                        <a href="index.php?page=master/paketmodul/update-paketmodul&id=<?=$row['id_paket']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="index.php?page=master/paketmodul/delete-paketmodul&id=<?=$row['id_paket']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
