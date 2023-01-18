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
            $username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
            $password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
            $nama_user = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
            $hak_akses = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));
            
            // perintah query untuk menyimpan data ke tabel user
            $query = mysqli_query($mysqli, "INSERT INTO is_user(username,password,nama_user,hak_akses)
                                            VALUES('$username','$password','$nama_user','$hak_akses')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=user&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_user'])) {
                // ambil data hasil submit dari form
                $id_user   = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
                $username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
                $password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
                $nama_user = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
                $hak_akses = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));

                if (empty($_POST['password'])) {
                    // perintah query untuk mengubah data pada tabel user
                    $query = mysqli_query($mysqli, "UPDATE is_user SET  username    = '$username',
                                                                        nama_user   = '$nama_user',
                                                                        hak_akses   = '$hak_akses'
                                                                  WHERE id_user     = '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=user&alert=2");
                    } 
                } else {
                    // perintah query untuk mengubah data pada tabel user
                    $query = mysqli_query($mysqli, "UPDATE is_user SET  username    = '$username',
                                                                        password    = '$password',
                                                                        nama_user   = '$nama_user',
                                                                        hak_akses   = '$hak_akses'
                                                                  WHERE id_user     = '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=user&alert=2");
                    } 
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_user = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel user
            $query = mysqli_query($mysqli, "DELETE FROM is_user WHERE id_user='$id_user'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=user&alert=3");
            }
        }
    }       
}       
?>