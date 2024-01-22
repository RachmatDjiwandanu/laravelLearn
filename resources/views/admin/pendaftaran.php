<?php
include 'header.php';
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nis = htmlspecialchars($_POST['nis']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jk = htmlspecialchars($_POST['jk']);
    $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $status = htmlspecialchars($_POST['status']);
    $negara = htmlspecialchars($_POST['negara']);
    $agama = htmlspecialchars($_POST['agama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);
    $id_user = htmlspecialchars($_POST['id_user']);

    // Check if ID is already registered
    $result = mysqli_query($conn, "SELECT nis FROM pendaftaran WHERE nis = '$nis'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('ID sudah terdaftar, silahkan ganti!');
            document.location.href='form_pendaftaran.php';
        </script>
        ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO pendaftaran VALUES('$nis','$nama_siswa','$alamat','$jk','$tmp_lahir','$tgl_lahir','$status','$negara','$agama','$kelas','$tgl_input','$user_input','','','$id_user')");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Pendaftaran Berhasil dibuat');
            document.location.href='form_pendaftaran.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Pendaftaran Gagal dibuat');
            document.location.href='form_pendaftaran.php';
        </script>
        ";
    }
}
?>

<!-- page content -->
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2 d-none d-lg-block "></div>
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Input Pendaftaran</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nis" placeholder="NIS" name="nis" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_siswa" placeholder="Nama Siswa" name="nama_siswa" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki" checked>
                                    <label class="custom-control-label" for="jk1">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan">
                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Pilih Status</option>
                                    <option value="Baru">Baru</option>
                                    <option value="Pindahan">Pindahan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                <select class="form-control" name="negara" id="negara">
                                    <option value="">Pilih Negara</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM kewarganegaraan");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_negara'] ?>"><?= $data['nama_negara'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option value="">Pilih Agama</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM agama");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_agama'] ?>"><?= $data['nama_agama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="">Pilih Kelas</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) AS kelas FROM jurusan INNER JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_jurusan'] ?>"><?= $data['kelas'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Tanggal Input</label>
                                <input type="date" class="form-control form-control-user" id="tgl_input" name="tgl_input" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="user_input" name="user_input" placeholder="User Input" required>
                            </div>
                            <div class="form-group">
                                <label>Akses User</label>
                                <select class="form-control" name="id_user" id="id_user">
                                    <option>Pilih Akses User</option>
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
                            <div class="form-group">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php
include 'footer.php';
?>