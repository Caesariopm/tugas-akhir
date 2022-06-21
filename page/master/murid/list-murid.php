<?php
    include('koneksi.php');
    
    $select_user	= mysqli_query($koneksi, "SELECT * FROM user");

    if(isset($_POST['regis-user'])){
        $name		= mysqli_real_escape_string($koneksi, $_POST['nama_user']);
        $phone		= mysqli_real_escape_string($koneksi, $_POST['notelp_user']);
        $alamat		= mysqli_real_escape_string($koneksi, $_POST['alamat']);

        if($name == '' || $phone == '' || $alamat == ''){
            echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
        }else{
            $sql = "INSERT INTO user (nama_user, notelp_user, alamat) VALUES ('$name', '$phone', '$alamat')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }else{
                echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            }
        }
        header('Location: index.php?page=master/murid/list-murid');
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
                    <div class="panel panel-heading">List Murid</div>
                    <div class="panel panel-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-c"> + Tambahkan </button>
                        <br /> <br />
                        <!-- model -->
                        <div class="modal fade" id="regis-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan Murid</h3>
                                    </div>
                                    <!-- form tambahan -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="nama_user">Name</label><br />
                                                <input class="form-control" name="nama_user" id="nama_user" type="text" required />
                                            </p>
                                            <p>
                                                <label for="notelp_user">Phone</label><br />
                                                <input class="form-control" name="notelp_user" id="notelp_user" type="text" required />
                                            </p>
                                            <!-- <p>
                                                <label for="phone">Phone</label><br />
                                                <input class="form-control" name="phone" id="phone" type="number" required />
                                            </p> -->
                                            <p>
                                                <label for="alamat">Alamat</label><br />
                                                <input class="form-control" name="alamat" id="alamat" type="text" required />
                                            </p>
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-user">ADD</button>
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
                                    <th>ID Murid</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <!-- <th>Phone</th> -->
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    while($row = mysqli_fetch_array($select_user)){
                                ?>
                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?=$row['id_user']; ?></td>
                                    <td><?=$row['nama_user']; ?></td>
                                    <td><?=$row['notelp_user']; ?></td>
                                    <!-- <td><'?=$row['phone']; ?></td> -->
                                    <td><?=$row['alamat']; ?></td>
                                    <td>
                                        <a href="index.php?page=master/murid/update-murid&id=<?=$row['id_user']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="index.php?page=master/murid/delete-murid&id=<?=$row['id_user']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
