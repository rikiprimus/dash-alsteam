<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
/* panggil file fungsi tambahan */
require_once "../../config/fungsi_rupiah.php";

if(isset($_POST['dataidlayanan'])) {
	$id_layanan = $_POST['dataidlayanan'];

    // fungsi query untuk menampilkan data dari tabel layanan
    $query = mysqli_query($mysqli, "SELECT * FROM is_layanan WHERE id_layanan='$id_layanan'")
                                    or die('Ada kesalahan pada query tampil data layanan: '.mysqli_error($mysqli));
  
    // tampilkan data
    $data = mysqli_fetch_assoc($query);

    $id_layanan = $data['id_layanan'];
    $biaya    = format_rupiah($data['biaya_pegawai']+$data['harga']);

	if($biaya != '') {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Biaya</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <span class='input-group-addon'>Rp.</span>
                    <input type='text' class='form-control' id='biaya' name='biaya' value='$biaya' readonly>
                  </div>
                </div>
              </div>";
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Biaya</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <span class='input-group-addon'>Rp.</span>
                    <input type='text' class='form-control' id='biaya' name='biaya' value='Biaya tidak ditemukan' readonly>
                  </div>
                </div>
              </div>";
	}		
}
?> 