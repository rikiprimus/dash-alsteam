<!-- Aplikasi Steam Mobil dan Motor-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-check-square-o icon-title"></i> History Data Transaksi

  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel history transaksi -->
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
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel history transaksi
            $query= mysqli_query($mysqli, "SELECT * FROM is_history
                                            ORDER BY id_history DESC")
                                            or die('Ada kesalahan pada query tampil Transaksi: '.mysqli_error($mysqli));
            


            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $t_transaksi       = $data['tanggal'];
              $exp               = explode('-',$t_transaksi);
              $tanggal_transaksi = $exp[2]."-".$exp[1]."-".$exp[0];

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='40' class='center'>$no</td>
                      <td width='100' class='center'>$data[id_history]</td>
                      <td width='80' class='center'>$tanggal_transaksi</td>
                      <td width='140' class='center'>$data[nama_pelanggan]</td>
                      <td width='110' class='center'>$data[nama_pegawai]</td>
                      <td width='110' class='center'>$data[jenis_kendaraan]</td>
                      <td width='80' class='center'>$data[no_plat_kendaraan]</td>
                      <td width='80' align='right'>Rp. ".format_rupiah($data['biaya_pegawai'])."</td>
                      <td width='80' align='right'>Rp. ".format_rupiah($data['harga'])."</td>
                      
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