<?php
include 'koneksi.php';

if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
  
    ";
  }

$query = mysqli_query($conn, "DELETE FROM jurusan WHERE id_jurusan='" .$_GET['id_jurusan'] . "'");

if (mysqli_affected_rows($conn) > 0 ) {
    echo "
    <script>
        alert('Data Berhasil Dihapus');
        document,location.href='jurusan.php';
        </script>
        ";
} else {
    echo "
    <script>
    alert('Data Gagal Dihapus!!!');
    document.location.href='jurusan.php';
    </script>
    ";

}

?>