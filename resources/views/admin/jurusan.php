<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Pendaftaran</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <!-- AKSES -->
        <?php include 'header.php'; 

        if ($_SESSION['hak_akses'] != 'admin') {
            echo "
            <script>
                alert('Tidak Memiliki Akses, DILARANG MASUK!');
                document.location.href='index.php';
            </script>
          
            ";
          }
        ?>
        <!-- STOP -->
        
            <div id="layoutSidenav_content">
                <!-- Start Body Content -->
                <main>
                    <!-- Body Content -->
                    <div class="container">
                        <h3 class="text-secondary display-6">Data Jurusan</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Jurusan</li>
                            </ol>
                        </nav>
                        
                        
                        <div class="col-2 mb-2">
                        <a type="submit" href="tambah_data_jurusan.php" name="add_data" class="btn btn-success btn-block" >Tambah Data
                        <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>   
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jurusan</th>
                                    <th scope="col">Tanggal Input</th>
                                    <th scope="col">User Input</th>
                                    <th scope="col">Tanggal Update</th>
                                    <th scope="col">User Update</th>
                                    <th scope="col">Akses</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   
                                        include 'koneksi.php';
                                        $no = 1;
                                        $query = "SELECT id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, jurusan.tgl_input,jurusan.user_input,jurusan.tgl_update,jurusan.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses
                                        FROM jurusan
                                        LEFT JOIN jenjang
                                        ON jurusan.id_jenjang = jenjang.id_jenjang LEFT JOIN user ON jurusan.id_user = user.id_user";
                                        $sql = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                        
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['kelas']; ?></td>
                                        <td><?= $data['tgl_input']; ?></td>
                                        <td><?= $data['user_input']; ?></td>
                                        <td><?= $data['tgl_update']; ?></td>
                                        <td><?= $data['user_update']; ?></td>
                                        <td><?= $data['akses']; ?></td>
                                        <td>

                                            <a class="btn btn-warning btn-sm" type="button"
                                             href="edit_jurusan.php?id_jurusan=<?= $data['id_jurusan']  ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="btn btn-danger btn-sm" type="button"
                                             onclick="return confirm('Data akan di Hapus?')" href="hapus_jurusan.php?id_jurusan=<?= $data['id_jurusan']; 
                                             ?>"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>

                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                new DataTable('#example');
                            } )
                        </script>
                    </div>
                </main>
                <!-- End Body Content -->
            <?php include 'footer.php'; ?>
            </div>
        </div>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    
    </body>
</html>