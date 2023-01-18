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
            $nama_layanan      = mysqli_real_escape_string($mysqli, trim($_POST['nama_layanan']));
            $jenis_kendaraan = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kendaraan']));
            $biaya_pegawai   = str_replace('.', '', trim($_POST['biaya_pegawai']));
            $harga           = str_replace('.', '', trim($_POST['harga']));
            
            // perintah query untuk menyimpan data ke tabel layanan
            $query = mysqli_query($mysqli, "INSERT INTO is_layanan(nama_layanan,jenis_kendaraan,biaya_pegawai,harga)
                                            VALUES('$nama_layanan','$jenis_kendaraan','$biaya_pegawai','$harga')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=layanan&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_layanan'])) {
                // ambil data hasil submit dari form
                $id_layanan        = mysqli_real_escape_string($mysqli, trim($_POST['id_layanan']));
                $nama_layanan      = mysqli_real_escape_string($mysqli, trim($_POST['nama_layanan']));
                $jenis_kendaraan = mysqli_real_escape_string($mysqli, trim($_POST['jenis_kendaraan']));
                $biaya_pegawai   = str_replace('.', '', trim($_POST['biaya_pegawai']));
                $harga           = str_replace('.', '', trim($_POST['harga']));

                // perintah query untuk mengubah data pada tabel layanan
                $query = mysqli_query($mysqli, "UPDATE is_layanan SET nama_layanan      = '$nama_layanan',
                                                                    jenis_kendaraan = '$jenis_kendaraan',
                                                                    biaya_pegawai   = '$biaya_pegawai',
                                                                    harga           = '$harga'
                                                              WHERE id_layanan        = '$id_layanan'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=layanan&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_layanan = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel layanan
            $query = mysqli_query($mysqli, "DELETE FROM is_layanan WHERE id_layanan='$id_layanan'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=layanan&alert=3");
            }
        }
    }       
}       
?>