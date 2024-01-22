<?php
include '../koneksi.php';
$waktu = date('d-m-y');
$nama = 'laporan-data-excel-agama'. $waktu . ".xls";
header("Content-Disposition: attachment; filename='$nama'");
header("Content-Type: application/vnd-ms-excel");
?>
<h5>Laporan Data Agama</h5>
<table id="datatable" border="1px" style="width:100%">
 <thead>
    <tr>
        <th>No</th>
        <th>Nama Agama</th>
        <th>User Input</th>
        <th>Tgl Update</th>
        <th>User Update</th>
        <th>Akses</th>
    </tr>
 </thead>
</table>
<tbody>
    <?php
    include '../koneksi.php';
    $no = 1;
    $query = "SELECT * FROM agama INNER JOIN user ON agama.id_user = user.id_user";
    $sql = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($sql) ) {
    ?>
    <tr></tr>
</tbody>