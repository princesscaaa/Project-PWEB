<?php
session_start();
include "koneksi.php";

// Cek apakah ada kiriman form dari metode GET
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);

    $sql = "SELECT * FROM warga WHERE id = '$id'";
    $hasil = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($hasil);

    // Kondisi apakah data ditemukan
    if ($data) {
        // Cek apakah ada kiriman form dari metode POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nik = htmlspecialchars($_POST["nik"]);
            $nama = htmlspecialchars($_POST["nama"]);
            $tempatLahir = htmlspecialchars($_POST["tempatLahir"]);
            $tanggalLahir = htmlspecialchars($_POST["tanggalLahir"]);
            $jenisKelamin = htmlspecialchars($_POST["jenisKelamin"]);
            $agama = htmlspecialchars($_POST["agama"]);
            $alamat = htmlspecialchars($_POST["alamat"]);

            $sql = "UPDATE warga SET nik='$nik', nama='$nama', tempatLahir='$tempatLahir', tanggalLahir='$tanggalLahir', jenisKelamin='$jenisKelamin', agama='$agama', alamat='$alamat' WHERE id='$id'";
            $hasil = mysqli_query($con, $sql);

            // Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location: formulir.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'> Data tidak ditemukan.</div>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Pendataan Penduduk Desa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style>
        /* CSS untuk form */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }

        input,
        select,
        textarea {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
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
        <h2>Formulir Data Penduduk Desa</h2>
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
                    <?php
                    //include file koneksi untuk koneksikan ke database
                    include "koneksi.php";

                    //fungsi untuk mencegah inputan karakter yang tidak sesuai
                    function input($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    //cek apakah ada nilai yang dikirim menggunakan GET dengan id warga
                    if (isset($_GET['id'])){
                        $id=input($_GET['id']);

                        $sql="select * from warga where id=$id";
                        $hasil=mysqli_query($con,$sql);
                        $data=mysqli_fetch_assoc($hasil);
                    }

                    ?>
                    <h2>Update Data</h2>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="POST">
                        <div class="form-group">
                            <label>NIK:</label>
                            <input type="number" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" placeholder="Masukkan NIK" required/>   
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukkan Nama" required/>   
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir:</label>
                            <input type="text" name="tempatLahir" class="form-control" value="<?php echo $data['tempatLahir']; ?>" placeholder="Masukkan Tempat Lahir" required/>    
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir:</label>
                            <input type="date" name="tanggalLahir" class="form-control" value="<?php echo $data['tanggalLahir']; ?>"```php
                            placeholder="Masukkan Tanggal Lahir" required/>  
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <select class="form-control" name="jenisKelamin" required>
                                <option value="Pria" <?php if ($data['jenisKelamin'] == "Pria") echo 'selected="selected"'; ?>>Pria</option>
                                <option value="Wanita" <?php if ($data['jenisKelamin'] == "Wanita") echo 'selected="selected"'; ?>>Wanita</option>
                            </select>    
                        </div>
                        <div class="form-group">
                            <label>Agama:</label>
                            <select class="form-control" name="agama" required>
                                <option value="Islam" <?php if ($data['agama'] == "Islam") echo 'selected="selected"'; ?>>Islam</option>
                                <option value="Kristen" <?php if ($data['agama'] == "Kristen") echo 'selected="selected"'; ?>>Kristen</option>
                                <option value="Katholik" <?php if ($data['agama'] == "Katholik") echo 'selected="selected"'; ?>>Katholik</option>
                                <option value="Hindu" <?php if ($data['agama'] == "Hindu") echo 'selected="selected"'; ?>>Hindu</option>
                                <option value="Budha" <?php if ($data['agama'] == "Budha") echo 'selected="selected"'; ?>>Budha</option>
                                <option value="Konghucu" <?php if ($data['agama'] == "Konghucu") echo 'selected="selected"'; ?>>Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <?php
                            if (!empty($data['alamat'])) {
                                $alamat = $data['alamat'];
                            } else {
                                $alamat = "";
                            }
                            ?>
                            <textarea name="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat" required><?php echo $alamat; ?></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     </form>   
                </div>
            </div>
        </div>    
    </div>
    <footer>
        <p>&copy; 2023 Pusat Pendataan Penduduk Desa</p>
        <br>
        <p>Jl. Senopati, Senayan, Kec. Kebayoran Baru, Kota Jakarta Sel
    </footer>   
</body>
</html>
