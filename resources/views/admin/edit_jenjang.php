<?php include 'header.php';

include 'koneksi.php';

if ($_SESSION['hak_akses'] != 'admin') {
  echo "
  <script>
      alert('Tidak Memiliki Akses, DILARANG MASUK!');
      document.location.href='index.php';
  </script>

  ";
}

if (isset($_POST['simpan'])) {
  $id_jenjang = htmlspecialchars($_POST['id_jenjang']);
  $nama_jenjang = htmlspecialchars($_POST['nama_jenjang']);
  $tgl_update = date('Y-m-d');
  $user_update = htmlspecialchars($_POST['user_update']);

  $query = "UPDATE jenjang SET
            id_jenjang='$id_jenjang',
            nama_jenjang='$nama_jenjang',
            tgl_update='$tgl_update',
            user_update='$user_update'
            WHERE id_jenjang='$id_jenjang'
            ";
    //  var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Agama Berhasil DiUpdate');
                document.location.href='jenjang.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Agama Gagal Update');
                document.location.href='jenjang.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM jenjang WHERE id_jenjang='" . $_GET['id_jenjang'] . "'");
$edit = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Edit account</h2>
             
              <form action="" method="POST">
                                <div class="row">

                                <div class="form-outline mb-3 col-12">
                                <label class="mx-2" for="id_jenjang">Id Jenjang</label>
                                <input type="text" name="id_jenjang" id="id_jenjang" class="form-control " value="<?= $edit['id_jenjang']; ?>"readonly>   
                                    </div>
                                    <div class="form-outline mb-3 col-12">
                                    <label class="mx-2" for="nm">Nama Jenjang</label>
                                    <input type="text" name="nama_jenjang" class="form-control" id="nm" value="<?= $edit['nama_jenjang'] ?>">    
                                    </div>

                                    <div class="form-outline mb-3 col-12">
                                    <label class="mx-2" for="user_update">User Update</label>
                                    <input type="text" name="user_update" class="form-control" id="nm" value="<?= $edit['user_update'] ?>">    
                                    </div>
        
                                    </div>
                                    <div class="col-12">
                                        <input class="btn btn-success btn-block w-100" type="submit" name="simpan" value="Simpan">
                                   
                                        <input class="btn btn-danger btn-block w-100" type="reset">
                                    </div>
                                </div>
                            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>


<?php include 'footer.php';?>
</body>
