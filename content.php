<!-- Aplikasi Steam Mobil dan Motor-->

<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih home, panggil file view home
	if ($_GET['module'] == 'home') {
		include "modules/beranda/view.php";
	}

	// jika halaman konten yang dipilih layanan, panggil file view layanan
	elseif ($_GET['module'] == 'layanan') {
		include "modules/layanan/view.php";
	}

	// jika halaman konten yang dipilih form layanan, panggil file form layanan
	elseif ($_GET['module'] == 'form_layanan') {
		include "modules/layanan/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih transaksi, panggil file view transaksi
	elseif ($_GET['module'] == 'transaksi') {
		include "modules/transaksi/view.php";
	}

	// jika halaman konten yang dipilih form transaksi, panggil file form transaksi
	elseif ($_GET['module'] == 'form_transaksi') {
		include "modules/transaksi/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih history transaksi, panggil file history transaksi
	elseif ($_GET['module'] == 'history') {
		include "modules/history/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih transaksi, panggil file view transaksi
	elseif ($_GET['module'] == 'pegawai') {
		include "modules/pegawai/view.php";
	}

	// jika halaman konten yang dipilih form transaksi, panggil file form transaksi
	elseif ($_GET['module'] == 'form_pegawai') {
		include "modules/pegawai/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan, panggil file view laporan
	elseif ($_GET['module'] == 'laporan_gaji') {
		include "modules/laporan_gaji/view.php";
	}
	// -----------------------------------------------------------------------------


	// jika halaman konten yang dipilih laporan, panggil file view laporan
	elseif ($_GET['module'] == 'laporan') {
		include "modules/laporan/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>