<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if(isset($_POST['dataidpegawai'])) {
	$id_pegawai = $_POST['dataidpegawai'];

    // fungsi query untuk menampilkan data dari tabel pegawai
    $query = mysqli_query($mysqli, "SELECT * FROM is_pegawai WHERE id_pegawai='$id_pegawai'")
                                    or die('Ada kesalahan pada query tampil data pegawai: '.mysqli_error($mysqli));

    // tampilkan data
    $data = mysqli_fetch_assoc($query);

    $id_pegawai = $data['id_pegawai'];

}
?> 