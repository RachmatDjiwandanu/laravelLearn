<?php include "header.php "; 

include "koneksi.php";

if (isset($_POST['regis'])){
  $username = strtolower(stripslashes($_POST['username']));
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $akses = htmlspecialchars($_POST['akses']);

  //cek username
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  if(mysqli_fetch_assoc($result)){
      echo "
      <script>
          alert('Username sudah terdaftar, silahkan ganti!!');
          document.location.href='register.php';
          </script>";
      return false;
  }

  // cek password
  if($password !== $password2){
      echo "
      <script>
          alert('Konfirmasi Password Salah');
          document.location.href='register.php';
      </script>";
      
      return false;
  }

  //enkirpsi password
  $password = password_hash ($password, PASSWORD_DEFAULT);

  //simpan data ke database
  mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$nama', '$email', '$akses')");
  if (mysqli_affected_rows($conn)){
      echo"
      <script>
      alert('Akun Berhasil Di Buat Silahkan Login!! :)');
      document.location.href='register.php';
      </script>";
  } else{
      echo mysqli_error($conn);
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
                  <label class="form-label" for="username">Username</label>
                  <input type="text" name= "username" id="username" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="password2">Repeat password</label>
                  <input type="password" name="password2" id="password2" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="nama">Nama user</label>
                  <input type="text" name="nama" id="nama" class="form-control form-control-lg" placeholder="input nama kamu"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control form-control-lg"/>
                </div>

              <div class="mb-4">
                <select name= "akses" class="form-select form-control user" aria-label="Default select example">
		              <option value=""selected disabled>Hak Akses</option>
					        <option value="operator">operator</option>
					        <option value="admin">admin</option>
              </select>
              </div>

            <div class="row mb-3"> 
              <div class="col-6">
                <button type="submit" name="regis" class="btn btn-success btn-block w-100">Register</button>
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
