<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = admin, tampilkan menu
if ($_SESSION['hak_akses']=='admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu home dipilih, menu home aktif
	if ($_GET["module"]=="home") { ?>
		<li class="active">
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	// jika menu layanan dipilih, menu layanan aktif
	if ($_GET["module"]=="layanan" || $_GET["module"]=="form_layanan") { ?>
		<li class="active">
			<a href="?module=layanan"><i class="fa fa-folder"></i> Data Layanan </a>
	  	</li>
	<?php
	}
	// jika tidak, menu layanan tidak aktif
	else { ?>
		<li>
			<a href="?module=layanan"><i class="fa fa-folder"></i> Data Layanan </a>
	  	</li>
	<?php
	}

	// jika menu transaksi dipilih, menu transaksi aktif
	if ($_GET["module"]=="transaksi" || $_GET["module"]=="form_transaksi") { ?>
		<li class="active">
			<a href="?module=transaksi"><i class="fa fa-check-square"></i> Transaksi </a>
	  	</li>
	<?php
	}
	// jika tidak, menu transaksi tidak aktif
	else { ?>
		<li>
			<a href="?module=transaksi"><i class="fa fa-check-square"></i> Transaksi </a>
	  	</li>
	<?php
	}

	// jika menu history transaksi dipilih, menu history transaksi aktif
	if ($_GET["module"]=="history") { ?>
		<li class="active">
			<a href="?module=history"><i class="fa fa-check-square"></i> History Transaksi </a>
	  	</li>
	<?php
	}
	// jika tidak, menu transaksi tidak aktif
	else { ?>
		<li>
			<a href="?module=history"><i class="fa fa-check-square"></i> History Transaksi </a>
	  	</li>
	<?php
	}

	// jika menu pegawai dipilih, menu pegawai aktif
	if ($_GET["module"]=="pegawai" || $_GET["module"]=="form_pegawai") { ?>
		<li class="active">
			<a href="?module=pegawai"><i class="fa fa-check-square"></i> Pegawai </a>
	  	</li>
	<?php
	}
	// jika tidak, menu pegawai tidak aktif
	else { ?>
		<li>
			<a href="?module=pegawai"><i class="fa fa-check-square"></i> Pegawai </a>
	  	</li>
	<?php
	}

	// jika menu laporan dipilih, menu laporan gaji aktif
	if ($_GET["module"]=="laporan_gaji") { ?>
		<li class="active">
			<a href="?module=laporan_gaji"><i class="fa fa-file-text"></i> Gaji Pegawai </a>
	  	</li>
	<?php
	}
	// jika tidak, menu laporan gaji tidak aktif
	else { ?>
		<li>
			<a href="?module=laporan_gaji"><i class="fa fa-file-text"></i> Gaji Pegawai </a>
	  	</li>
	<?php
	}

	// jika menu laporan dipilih, menu laporan aktif
	if ($_GET["module"]=="laporan") { ?>
		<li class="active">
			<a href="?module=laporan"><i class="fa fa-file-text"></i> Laporan</a>
	  	</li>
	<?php
	}
	// jika tidak, menu laporan tidak aktif
	else { ?>
		<li>
			<a href="?module=laporan"><i class="fa fa-file-text"></i> Laporan</a>
	  	</li>
	<?php
	}

	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = user, tampilkan menu
elseif ($_SESSION['hak_akses']=='user') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu home dipilih, menu home aktif
	if ($_GET["module"]=="home") { ?>
		<li class="active">
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	// jika menu layanan dipilih, menu layanan aktif
	if ($_GET["module"]=="layanan" || $_GET["module"]=="form_layanan") { ?>
		<li class="active">
			<a href="?module=layanan"><i class="fa fa-folder"></i> Data Layanan </a>
	  	</li>
	<?php
	}
	// jika tidak, menu layanan tidak aktif
	else { ?>
		<li>
			<a href="?module=layanan"><i class="fa fa-folder"></i> Data Layanan </a>
	  	</li>
	<?php
	}

	// jika menu transaksi dipilih, menu transaksi aktif
	if ($_GET["module"]=="transaksi" || $_GET["module"]=="form_transaksi") { ?>
		<li class="active">
			<a href="?module=transaksi"><i class="fa fa-check-square"></i> Transaksi </a>
	  	</li>
	<?php
	}
	// jika tidak, menu transaksi tidak aktif
	else { ?>
		<li>
			<a href="?module=transaksi"><i class="fa fa-check-square"></i> Transaksi </a>
	  	</li>
	<?php
	}

	// jika menu laporan dipilih, menu laporan aktif
	if ($_GET["module"]=="laporan") { ?>
		<li class="active">
			<a href="?module=laporan"><i class="fa fa-file-text"></i> Laporan</a>
	  	</li>
	<?php
	}
	// jika tidak, menu laporan tidak aktif
	else { ?>
		<li>
			<a href="?module=laporan"><i class="fa fa-file-text"></i> Laporan</a>
	  	</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
?>