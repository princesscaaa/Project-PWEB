<?php session_start();
    if(empty($_SESSION['id'])):
        header('Location:login.php');
    endif;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pendataan Warga</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
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
                        $data = stripcslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    //cek apakah ada kiriman form dari metode post
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nik = input($_POST["nik"]);
                        $nama = input($_POST["nama"]);
                        $tempatLahir = input($_POST["tempatLahir"]);
                        $tanggalLahir = input($_POST["tanggalLahir"]);
                        $jenisKelamin = input($_POST["jenisKelamin"]);
                        $agama = input($_POST["agama"]);
                        $alamat = input($_POST["Alamat"]);

                        //query input menginput data kedalam tabel warga
                        $sql = "INSERT INTO warga (nik, nama, tempatLahir, tanggalLahir, jenisKelamin, agama, alamat) VALUES ('$nik', '$nama', '$tempatLahir', '$tanggalLahir', '$jenisKelamin', '$agama', '$alamat') ";

                        //mengeksekusi/menjalankan query diatas
                        $hasil = mysqli_query($con, $sql);

                        if ($hasil) {
                            header("location: formulir.php");
                            exit;
                        }
                        else {
                            echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
                        }
                    }
                    ?>
                    <h2>Input Data</h2>

                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                        <div class="form-group">
                            <label>NIK:</label>
                            <input type="number" name="nik" class="form-control" placeholder="Masukkan NIK" required/>  
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required/>  
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir:</label>
                            <input type="text" name="tempatLahir" class="form-control" placeholder="Masukkan Tempat Lahir" required/>   
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir:</label>
                            <input type="date" name="tanggalLahir" class="form-control" placeholder="Masukkan Tanggal Lahir" required/> 
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <select class="form-control" name="jenisKelamin">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                            </select>  
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <textarea name="Alamat" class="form-control" rows="5" placeholder="Masukkan Alamat"required></textarea>
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
        <p>Jl. Senopati, Senayan, Kec. Kebayoran Baru, Kota Jakarta Selatan, DKI Jakarta</p><br>
        <p>E-mail: p3djakartaselatan@gov.mail.com<br>Telp: 082-123-456-789<br>Fax: (021)123456</p>
    </footer>   
</body>
</html>