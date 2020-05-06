				<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Reservasi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body center" style="margin-top: 10px;">
                            <div class="row">

                                <div class="col-lg-10 col-lg-offset-1">
                                	<a href="<?php echo base_url('data_reservasi');?>" class="btn btn-info pull-right" style="margin-bottom: 25px;"><i class="fa fa-times"></i></a>
                                	<?php foreach ($data_rsv as $dt_rsv): ?>
						                <table class="table table-bordered" style="margin-bottom: 60px;">
						                  <tr>
						                    <th style="width: 170px;">ID Reservasi</th>
						                    <td><strong><?php echo $dt_rsv['id_rsv']; ?></strong></td>
						                  </tr>
						                  <tr>
						                    <th>Nama</th>
						                    <td><?php echo $dt_rsv['nama']; ?></td>
						                  </tr>
						                  <tr>
						                    <th>Alamat</th>
						                    <td><?php echo $dt_rsv['alamat']; ?></td>
						                  </tr>
						                  <tr>
						                    <th>No. Handphone</th>
						                    <td><?php echo $dt_rsv['no_hp']; ?></td>
						                  </tr>
						                  <tr>
						                    <th>Email</th>
						                    <td><?php echo $dt_rsv['email']; ?></td>
						                  </tr>
						                  <tr>
						                    <th>Tanggal Pesan</th>
						                    <td><?php echo shortdate_indo($dt_rsv['tgl_pesan']); ?></td>
						                  </tr>
						                  <tr>
						                    <th>Tipe Kamar</th>
						                    <td><?php echo $dt_rsv['nm_kmr']; ?></td>
						                  </tr>
						                  <tr>
						                    <th>Check In</th>
						                    <td><?php echo shortdate_indo($dt_rsv['tgl_dtg']); ?></td>
						                  </tr>
						                  <tr>
						                    <th>Check Out</th>
						                    <td><?php echo shortdate_indo($dt_rsv['tgl_plg']); ?></td>
						                  </tr>
						                  <tr>
						                    <th>Durasi</th>
						                    <td><?php echo $dt_rsv['lama_nginap']; ?> Hari</td>
						                  </tr>
						                  <tr>
						                    <th>Jumlah Kamar</th>
						                    <td><?php echo $dt_rsv['jml_kamar']; ?> Kamar</td>
						                  </tr>
						                  <tr>
						                    <th>Total Biaya</th>
						                    <td><strong><span style="font-size: 20px;"><?php echo rupiah($dt_rsv['total_biaya']); ?></span></strong></td>
						                  </tr>
						                </table>
						                <?php endforeach ?>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>