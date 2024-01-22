<?php
session_start();
include 'koneksi.php';

// Check if user is already logged in using session
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

// Check if cookie exists and try to log in with cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $stmt = mysqli_prepare($conn, "SELECT username FROM user WHERE id_user = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  if ($row && $key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
    header("Location: index.php");
    exit;
  }
}

// Attempt to log in with submitted form
if (isset($_POST['login'])) {
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ?");
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username'] = $username;
      $_SESSION['hak_akses'] = $row['hak_akses'];
      $_SESSION['login'] = true;

      if (isset($_POST['remember'])) {
        $secure_key = hash('sha256', $row['username']);
        setcookie('id', $row['id_user'], time() + 60, "/", null, true, true);
        setcookie('key', $secure_key, time() + 60, "/", null, true, true);
      }

      header("Location: index.php");
      exit;
    } else {
      echo "
      <script>
        alert('Password Salah!');
        window.location.href = 'login.php';
      </script>
      ";
    }
  } else {
    echo "
    <script>
      alert('Login Gagal! Username Tidak Ditemukan!');
      window.location.href = 'login.php';
    </script>
    ";
  }
}

?>
<center><h1>Silahkan Login Dahulu</h1>
<form action="" method="post">
<input type="username" name="username" placeholder="Username" alt="username" required="required"/><br/>
<input type="password" name="password" placeholder="Password" alt="password" required="required"/><br/><br/>
<input type="submit" name="login" value="Login" alt="submit" />
</form><br/>
<h4>Copyright &copy; <font color="red" alt="Danu">Danu</font></h4>
</center>

<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
		}
		
		h1 {
			text-align: center;
			margin-top: 50px;
			color: #333333;
		}
		
		form {
			background-color: #ffffff;
			border-radius: 5px;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			width: 400px;
			margin: 0 auto;
			margin-top: 50px;
		}
		
		label {
			display: block;
			margin-bottom: 10px;
			color: #666666;
		}
		
		input[type="username"],
		input[type="password"] {
			padding: 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
			width: 100%;
			margin-bottom: 20px;
		}
		
		input[type="submit"] {
			background-color: #fa0000;
			color: #ffffff;
			border: none;
			padding: 10px;
			border-radius: 5px;
			cursor: pointer;
		}
		
		input[type="submit"]:hover {
			background-color: #06e5f5;
		}
		
		.error {
			color: #ff0000;
			font-weight: bold;
			margin-bottom: 10px;
		}
	</style>