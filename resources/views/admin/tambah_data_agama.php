<?php include "header.php "; 

include "koneksi.php";

if ($_SESSION['hak_akses'] != 'admin') {
  echo "
  <script>
      alert('Tidak Memiliki Akses, DILARANG MASUK!');
      document.location.href='index.php';
  </script>

  ";
}

if (isset($_POST['buat'])) {
    $id_agama = htmlspecialchars($_POST['id_agama']);
    $nama_agama = htmlspecialchars($_POST['nama_agama']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);
    $id_user = htmlspecialchars($_POST['id_user']);
    
  //cek id agama
  $result = mysqli_query($conn, "SELECT id_agama FROM agama WHERE id_agama = '$id_agama'");
  if (mysqli_fetch_assoc($result)) {
      echo "
      <script>
          alert('Username sudah terdaftar, silahkan ganti!!');
          document.location.href='tambah_data_agama.php';
          </script>";
      return false;
  }


  //simpan data ke database
  mysqli_query($conn, "INSERT INTO agama VALUES('$id_agama','$nama_agama','$tgl_input','$user_input','','','$id_user')");
  
  if (mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
        alert('Data Agama Berhasil dibuat');
        document.location.href='agama.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data Agama Gagal dibuat');
        document.location.href='tambah_data_agama.php';
    </script>
    ";
}
  
}

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
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form class="user" method = "post" action = "">

                <div class="form-outline mb-4">
                  <label class="form-label" for="id_agama">Id Agama</label>
                  <input type="text" name= "id_agama" id="id_agama" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="nama_agama">Nama Agama</label>
                  <input type="text" name="nama_agama" id="nama_agama" class="form-control form-control-lg" required/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="tgl_input">Tanggal Input</label>
                  <input type="date" name="tgl_input" id="tgl_input" class="form-control form-control-lg" required/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="user_input">User Input</label>
                  <input type="text" name="user_input" id="user_input" class="form-control form-control-lg" required/>
                </div>

              
              <div class="mb-4">
                <select name= "id_user" class="form-select form-control user" aria-label="Default select example">
		              <option value="Hak Akses."selected disabled>Hak Akses</option>
                            <?php
                             $sql = mysqli_query($conn, "SELECT * FROM user WHERE hak_akses = '$status' AND id_user='$_SESSION[id_user];'");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
					        <option value="<?= $data['id_user'] ?>"><?= $data['hak_akses'] ?> (<?= $data['nama'] ?>)</option>
                            <?php
                             }
                             ?>
              </select>
              </div>

            <div class="row mb-3"> 
              <div class="col-6">
                <button type="submit" name="buat" class="btn btn-success btn-block w-100">Register</button>
              </div>
              <div class="col-6">
               <button type="reset"name="reset" class="btn btn-danger btn-block w-100">Reset</button>
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

<?php include "footer.php "; ?>
