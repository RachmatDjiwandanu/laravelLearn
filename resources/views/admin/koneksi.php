<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_sekolah10";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Koneksi Gagal: " . $conn->connect_error);
}

?>