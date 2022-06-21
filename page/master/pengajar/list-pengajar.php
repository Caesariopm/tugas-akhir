<?php
    include('koneksi.php');
    
    $select_pengajar	= mysqli_query($koneksi, "SELECT * FROM pengajar");

    if(isset($_POST['regis-pengajar'])){
        $name		= mysqli_real_escape_string($koneksi, $_POST['nama_pengajar']);
        $phone		= mysqli_real_escape_string($koneksi, $_POST['notelp_pengajar']);
        $pass		= mysqli_real_escape_string($koneksi, $_POST['password']);
        $alamat		= mysqli_real_escape_string($koneksi, $_POST['alamat']);
        if($name == '' || $phone == '' || $pass == '' || $alamat == ''){
            echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
        }else{
            $sql = "INSERT INTO pengajar (nama_pengajar, notelp_pengajar, password, alamat) VALUES ('$name', '$phone', '$pass', '$alamat')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }else{
                echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            }
        }
        header('Location: index.php?page=master/pengajar/list-pengajar');
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
                    <div class="panel panel-heading">List Pengajar</div>
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
                                                <label for="nama_pengajar">Name</label><br />
                                                <input class="form-control" name="nama_pengajar" id="nama_pengajar" type="text" required />
                                            </p>
                                            <p>
                                                <label for="notelp_pengajar">Phone</label><br />
                                                <input class="form-control" name="notelp_pengajar" id="notelp_pengajar" type="text" required />
                                            </p>
                                            <p>
                                                <label for="password">Password</label><br />
                                                <input class="form-control" name="password" id="password" type="text" required />
                                            </p>
                                            <p>
                                                <label for="alamat">Alamat</label><br />
                                                <input class="form-control" name="alamat"id="alamat" type="text" required />
                                            </p> 
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-pengajar">ADD</button>
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
                                    <th>ID Pengajar</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>Alamat</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    while($row = mysqli_fetch_array($select_pengajar)){
                                ?>
                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?=$row['id_pengajar']; ?></td>
                                    <td><?=$row['nama_pengajar']; ?></td>
                                    <td><?=$row['notelp_pengajar']; ?></td>
                                    <td><?=$row['password']; ?></td>
                                    <td><?=$row['alamat']; ?></td> 
                                    <td>
                                        <a href="index.php?page=master/pengajar/update-pengajar&id=<?=$row['id_pengajar']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="index.php?page=master/pengajar/delete-pengajar&id=<?=$row['id_pengajar']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
