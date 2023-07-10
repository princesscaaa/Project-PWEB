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
