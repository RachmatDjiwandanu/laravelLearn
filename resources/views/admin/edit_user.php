<?php include 'header.php';

include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $username = strtolower(stripslashes($_POST['username']));
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $akses = htmlspecialchars($_POST['hak_akses']);
  $id_user = $_POST['id_user'];

  // Check if a new password was provided
  if (!empty($_POST['password'])) {
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

      // Check password confirmation
      if ($password !== $password2) {
          echo "
          <script>
              alert('Konfirmasi Password Salah');
              document.location.href='edit_user.php';
          </script>
          ";
          return false;
      }

      // Hash the new password
      $password = password_hash($password, PASSWORD_DEFAULT);

      $query = "UPDATE user SET
              id_user='$id_user',
              username='$username',
              `password` ='$password',
              nama='$nama',
              email='$email',
              hak_akses='$akses'
              WHERE id_user='$id_user'
              ";
  } else {
      // If no new password was provided, update without changing the password
      $query = "UPDATE user SET
              id_user='$id_user',
              username='$username',
              nama='$nama',
              email='$email',
              hak_akses='$akses'
              WHERE id_user='$id_user'
              ";
  }

  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
      echo "
          <script>
              alert('Data user Berhasil DiUpdate');
              document.location.href='data_user.php';
          </script>
          ";
  } else {
      echo "
          <script>
              alert('Data user Gagal Update');
              document.location.href='data_user.php';
          </script>
          ";
  }
}

$data = mysqli_query($conn, "SELECT *
FROM user WHERE id_user='" . $_GET['id_user'] . "'");
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
                                <input type="hidden" name="id_user" id="id_user" value="<?= $edit['id_user']; ?>">
                                <div class="row">
                                    <div class="form-outline mb-3 col-12">
                                    <label class="mx-2" for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="<?= $edit['username'] ?>">
                                        
                                    </div>
                                    <div class="form-outline mb-3 col-12">
                                    <label class="mx-2" for="nm">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nm" value="<?= $edit['nama'] ?>">
                                        
                                    </div>
                                    <div class="form-outline mb-3 col-12">
                                    <label class="mx-2" for="floatingPassword">Password</label>
                                    <input class="form-control" type="password" id="password1" name="password"/>
                                        
                                    </div>
                                    <div class="form-outline mb-3 col-12">
                                    <label class="mx-2" for="rfloatingPassword">Repeat Password</label>
                                    <input type="password" name="password2" class="form-control" id="rfloatingPassword">
                                        
                                    </div>
                                    <div class="form-outline mb-3 col-12">
                                    <label class="mx-2" for="floatingInput">Email address</label>
                                    <input type="email" name="email" class="form-control" id="floatingInput" value="<?= $edit['email'] ?>">
                                    </div>
                                    <div class="form-outline mb-3 col-12">
                                        <select name="hak_akses" class="form-select form-select mb-3 " aria-label=".form-select-lg example">
                                            <option value=""selected disabled>Hak Akses</option>
                                            <option value="admin" <?= ($edit['hak_akses'] == 'admin') ? 'selected' : '' ?>>admin</option>
                                            <option value="operator" <?= ($edit['hak_akses'] == 'operator') ? 'selected' : '' ?>>operator</option>
                                        </select>
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
