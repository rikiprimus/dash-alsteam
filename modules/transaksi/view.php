<!-- Aplikasi Steam Mobil dan Motor-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-check-square-o icon-title"></i> Data Transaksi

    <a class="btn btn-primary btn-social pull-right" href="?module=form_transaksi&form=add">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data transaksi baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data transaksi baru berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data transaksi berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data transaksi berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data transaksi berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data transaksi berhasil dihapus.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel transaksi -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Transaksi</th>
                <th class="center">Tanggal</th>
                <th class="center">Nama Pelanggan</th>
                <th class="center">Nama Pegawai</th>
                <th class="center">Jenis Kendaraan</th>
                <th class="center">No. Plat</th>
                <th class="center">Biaya Pegawai</th>
                <th class="center">Biaya</th>
                <th></th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel transaksi
            $query= mysqli_query($mysqli, "SELECT * FROM is_transaksi as a 
                                            INNER JOIN is_layanan as b
                                            ON a.layanan=b.id_layanan
                                            INNER JOIN is_pegawai as c
                                            ON a.pegawai=c.id_pegawai
                                            ORDER BY a.id_transaksi DESC")
                                            or die('Ada kesalahan pada query tampil Transaksi: '.mysqli_error($mysqli));
            


            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $t_transaksi       = $data['tanggal'];
              $exp               = explode('-',$t_transaksi);
              $tanggal_transaksi = $exp[2]."-".$exp[1]."-".$exp[0];

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='40' class='center'>$no</td>
                      <td width='100' class='center'>$data[id_transaksi]</td>
                      <td width='80' class='center'>$tanggal_transaksi</td>
                      <td width='140' class='center'>$data[nama_pelanggan]</td>
                      <td width='110' class='center'>$data[nama_pegawai]</td>
                      <td width='110' class='center'>$data[jenis_kendaraan]</td>
                      <td width='80' class='center'>$data[no_plat_kendaraan]</td>
                      <td width='80' align='right'>Rp. ".format_rupiah($data['biaya_pegawai'])."</td>
                      <td width='80' align='right'>Rp. ".format_rupiah($data['harga'])."</td>
                      <td class='center' width='100'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' class='btn btn-primary btn-sm' href='?module=form_transaksi&form=edit&id=$data[id_transaksi]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/transaksi/proses.php?act=delete&id=<?php echo $data['id_transaksi'];?>" onclick="return confirm('Anda yakin ingin menghapus ID Transaksi <?php echo $data['id_transaksi']; ?> an. <?php echo $data['nama_pelanggan']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>

                          <a data-toggle="tooltip" data-placement="top" title="Cetak" class="btn btn-info btn-sm" href="modules/transaksi/cetak.php?id=<?php echo $data['id_transaksi'];?>" target="_blank">
                              <i style="color:#fff" class="glyphicon glyphicon-print"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content