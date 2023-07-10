<?php
	$host="localhost";
	$user="root";
	$password="";
	$db="db_warga";

	$con=mysqli_connect($host,$user,$password,$db);
	if (!$con){
			die("Koneksi Gagal : ".mysqli_connect_error());
	}
?>
