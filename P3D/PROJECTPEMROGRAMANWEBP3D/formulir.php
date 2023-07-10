<?php
session_start();
include "koneksi.php";

// Cek apakah ada kiriman form dari metode GET
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);

    $sql = "DELETE FROM warga WHERE id = '$id'";
    $hasil = mysqli_query($con, $sql);

    // Kondisi apakah berhasil atau tidak
    if ($hasil) {
        header("location: formulir.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>DATA GAGAL DIHAPUS.</div>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Pendataan Penduduk Desa</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <header>
        <h1>Pusat Pendataan Penduduk Desa<br>P3D</h1>
    </header>
    <nav>
        <ul>
            <!-- Menu lainnya -->
            <?php if (isset($_SESSION['id'])): ?>
                <li><a href="home.php">Halaman</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            <!-- Menu lainnya -->
            <?php if (isset($_SESSION['id'])): ?>
                <li><a href="service.php">Isi Form</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
        <ul>
            <!-- Menu lainnya -->
            <?php if (isset($_SESSION['id'])): ?>
                <li><a href="logout proses.php">Keluar</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="content">
                    <h3>Formulir Data Penduduk Desa</h3>
                    <br><br>
                    <p>Berikut ini adalah formulir data penduduk desa yang harus Anda isi. Silakan mengikuti panduan pengisian formulir data penduduk desa yang telah kami tentukan.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container">
                    <br>
                    <h4><center>DAFTAR PENDUDUK DESA</center></h4>
                    <table class="my-3 table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM warga ORDER BY id DESC";
                            $hasil = mysqli_query($con, $sql);
                            $no = 0;
                            while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data["nik"]; ?></td>
                                <td><?php echo $data["nama"]; ?></td>
                                <td><?php echo $data["tempatLahir"]; ?></td>
                                <td><?php echo $data["tanggalLahir"]; ?></td>
                                <td><?php echo $data["jenisKelamin"]; ?></td>
                                <td><?php echo $data["agama"]; ?></td>
                                <td><?php echo $data["Alamat"]; ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>">Update</a>
                                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn-delete">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br><br>
                    <a href="create.php" class="btn-tambah" role="button">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2023 Pusat Pendataan Penduduk Desa</p>
        <br>
        <p>Jl. Senopati, Senayan, Kec. Kebayoran Baru, Kota Jakarta Selatan, DKI Jakarta</p><br>
        <p>E-mail: p3djakartaselatan@gov.mail.com<br>Telp: 082-123-456-789<br>Fax: (021)123456</p>

    </footer>
</body>
</html>
