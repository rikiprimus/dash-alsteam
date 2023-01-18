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
            $id_transaksi      = mysqli_real_escape_string($mysqli, trim($_POST['id_transaksi']));
            
            $t_transaksi       = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
            $exp               = explode('-',$t_transaksi);
            $tanggal_transaksi = $exp[2]."-".$exp[1]."-".$exp[0];
            //Variabel untuk data transaksi
            $nama_pelanggan    = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
            $pegawai            = mysqli_real_escape_string($mysqli, trim($_POST['pegawai']));

            $query_pegawai = mysqli_query($mysqli, "SELECT * FROM is_pegawai WHERE id_pegawai = $pegawai");
            $data_pegawai = mysqli_fetch_assoc($query_pegawai);
            $nama_pegawai = $data_pegawai['nama_pegawai'];

            $layanan             = mysqli_real_escape_string($mysqli, trim($_POST['layanan']));

            $query_layanan = mysqli_query($mysqli, "SELECT * FROM is_layanan WHERE id_layanan = $layanan");
            $data_layanan = mysqli_fetch_assoc($query_layanan);
            $nama_layanan = $data_layanan['nama_layanan'];
            $jenis_kendaraan= $data_layanan['jenis_kendaraan'];
            $biaya_pegawai = $data_layanan['biaya_pegawai'];
            $harga = $data_layanan['harga'];

            $no_plat_kendaraan = strtoupper(mysqli_real_escape_string($mysqli, trim($_POST['no_plat_kendaraan'])));

            // perintah query untuk menyimpan data ke tabel transaksi
            $query = mysqli_query($mysqli, "INSERT INTO is_transaksi(id_transaksi,tanggal,nama_pelanggan,pegawai,no_plat_kendaraan,layanan)
                                            VALUES('$id_transaksi','$tanggal_transaksi','$nama_pelanggan','$pegawai','$no_plat_kendaraan','$layanan')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli)); 

            // perintah query untuk menyimpan data ke tabel history transaksi
            $query_history = mysqli_query($mysqli, "INSERT INTO is_history(id_history,tanggal,nama_pelanggan,nama_pegawai,jenis_kendaraan,no_plat_kendaraan,nama_layanan,biaya_pegawai,harga)
                                                    VALUES('$id_transaksi','$tanggal_transaksi','$nama_pelanggan','$nama_pegawai','$jenis_kendaraan','$no_plat_kendaraan','$nama_layanan','$biaya_pegawai','$harga')")
                                                    or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));               

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=transaksi&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_transaksi'])) {
                // ambil data hasil submit dari form
                $id_transaksi      = mysqli_real_escape_string($mysqli, trim($_POST['id_transaksi']));
            
                $t_transaksi       = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
                $exp               = explode('-',$t_transaksi);
                $tanggal_transaksi = $exp[2]."-".$exp[1]."-".$exp[0];
                
                $nama_pelanggan    = mysqli_real_escape_string($mysqli, trim($_POST['nama_pelanggan']));
                $pegawai             = mysqli_real_escape_string($mysqli, trim($_POST['pegawai']));
                $no_plat_kendaraan = mysqli_real_escape_string($mysqli, trim($_POST['no_plat_kendaraan']));
                $layanan             = mysqli_real_escape_string($mysqli, trim($_POST['layanan']));

                // perintah query untuk mengubah data pada tabel transaksi
                $query = mysqli_query($mysqli, "UPDATE is_transaksi SET tanggal             = '$tanggal_transaksi',
                                                                        nama_pelanggan      = '$nama_pelanggan',
                                                                        pegawai             = '$pegawai',
                                                                        no_plat_kendaraan   = '$no_plat_kendaraan',
                                                                        layanan               = '$layanan'
                                                                  WHERE id_transaksi        = '$id_transaksi'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
                $query_history = mysqli_query($mysqli, "UPDATE is_history SET tanggal             = '$tanggal_transaksi',
                                                                              nama_pelanggan      = '$nama_pelanggan',
                                                                              no_plat_kendaraan   = '$no_plat_kendaraan'
                                                                          WHERE id_history        = '$id_transaksi'")
                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=transaksi&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_transaksi = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel transaksi
            $query = mysqli_query($mysqli, "DELETE FROM is_transaksi WHERE id_transaksi='$id_transaksi'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=transaksi&alert=3");
            }
        }
    }       
}       
?>