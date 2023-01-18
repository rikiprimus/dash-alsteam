<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Rekap Data Gaji Pegawai
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=home"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Laporan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <!-- Form Laporan -->
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="GET" action="modules/laporan_gaji/cetak.php" target="_blank">
          <div class="box-body">

            <div class="form-group">
              <label class="col-sm-1">Tanggal</label>
              <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" autocomplete="off" required>
              </div>

              <label class="col-sm-1">s.d.</label>
              <div class="col-sm-2">
                <input style="margin-left:-35px" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1">Nama Pegawai</label>
                <div class="col-sm-2">
                  <select class="form-control" id="pegawai" name="pegawai" onchange="tampil_pegawai(this)" required>
                    <option value=""></option>
                    <?php
                      $query_pegawai = mysqli_query($mysqli, "SELECT * FROM is_pegawai ORDER BY id_pegawai ASC")
                                                            or die('Ada kesalahan pada query tampil pegawai: '.mysqli_error($mysqli));
                      while ($data_pegawai = mysqli_fetch_assoc($query_pegawai)) {
                        echo"<option value=\"$data_pegawai[id_pegawai]\"> $data_pegawai[nama_pegawai] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
          </div>
      
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit">
                  <i class="fa fa-print"></i> Cetak
                </button>
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->