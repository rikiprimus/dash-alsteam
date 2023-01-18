<!-- Aplikasi Steam Mobil dan Motor-->

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $nama_pegawai      = mysqli_real_escape_string($mysqli, trim($_POST['nama_pegawai']));
            $alamat_pegawai = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pegawai']));
            $telp_pegawai = mysqli_real_escape_string($mysqli, trim($_POST['telp_pegawai']));
            // perintah query untuk menyimpan data ke tabel pegawai
            $query = mysqli_query($mysqli, "INSERT INTO is_pegawai(nama_pegawai,alamat_pegawai,telp_pegawai)
                                            VALUES('$nama_pegawai','$alamat_pegawai','$telp_pegawai')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pegawai&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_pegawai'])) {
                // ambil data hasil submit dari form
                $id_pegawai      = mysqli_real_escape_string($mysqli, trim($_POST['id_pegawai']));
                $nama_pegawai    = mysqli_real_escape_string($mysqli, trim($_POST['nama_pegawai']));
                $alamat_pegawai  = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pegawai']));
                $telp_pegawai    = mysqli_real_escape_string($mysqli, trim($_POST['telp_pegawai']));

                // perintah query untuk mengubah data pada tabel pegawai
                $query = mysqli_query($mysqli, "UPDATE is_pegawai SET nama_pegawai    = '$nama_pegawai',
                                                                    alamat_pegawai  = '$alamat_pegawai',
                                                                    telp_pegawai    = '$telp_pegawai'
                                                              WHERE id_pegawai        = '$id_pegawai'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pegawai&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_pegawai = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel pegawai
            $query = mysqli_query($mysqli, "DELETE FROM is_pegawai WHERE id_pegawai='$id_pegawai'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pegawai&alert=3");
            }
        }
    }       
}       
?>