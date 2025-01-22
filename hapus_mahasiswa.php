<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');

$NIM = $_GET['nim'];

$delete = $mysqli->query("DELETE FROM siswa WHERE NIM='$NIM'");

if($delete) {
    $_SESSION['success'] = true;
    $_SESSION['message'] = 'Data Berhasil Dihapus';
    header("Location: mahasiswa.php");
    exit();
}
?>
