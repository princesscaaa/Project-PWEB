<?php session_start();
	if(empty($_SESSION['id'])):
		header('Location:login.php');
	endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pusat Pendataan Penduduk Desa</title>
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
		<h2>Pusat Pendataan Penduduk Desa</h2>
		<div class="row">
			<div class="col">
				<div class="content">
					<h3>Selamat Datang di P3D!</h3>
					<br><br>
					<p>Ini adalah situs web resmi Pusat Pendataan Penduduk Desa (P3D). Silakan menggunakan layanan yang Anda butuhkan.</p>
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